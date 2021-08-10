<?php ob_start() ?>
  <?php if (!RASPI_MONITOR_ENABLED) : ?>
    <input type="submit" class="btn btn-outline btn-primary" name="SaveHostAPDSettings" value="<?php echo _("Save settings"); ?>" />
    <?php if ($hostapdstatus[0] == 0) : ?>
      <input type="submit" class="btn btn-success" name="StartHotspot" value="<?php echo  _("Start hotspot"); $msg=_("Starting hotspot"); ?>" data-toggle="modal" data-target="#hostapdModal"/>
    <?php else : ?>
      <input type="submit" class="btn btn-warning" name="StopHotspot" value="<?php echo _("Stop hotspot") ?>"/>
      <input type ="submit" class="btn btn-warning" name="RestartHotspot" value="<?php echo _("Restart hotspot"); $msg=_("Restarting hotspot"); ?>" data-toggle="modal" data-target="#hostapdModal"/>
    <?php endif ?>
    <!-- Modal -->
    <div class="modal fade" id="hostapdModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title" id="ModalLabel"><i class="fas fa-sync-alt mr-2"></i><?php echo $msg ?></div>
          </div>
          <div class="modal-body">
            <div class="col-md-12 mb-3 mt-1"><?php echo _("Executing RaspAP service start") ?>...</div>
            <div class="progress" style="height: 20px;">
              <div class="progress-bar bg-info" role="progressbar" id="progressBar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="9"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline btn-primary" data-dismiss="modal"><?php echo _("Close"); ?></button>
          </div>
        </div>
      </div>
    </div>
  <?php endif ?>
<?php $buttons = ob_get_clean(); ob_end_clean() ?>

<div class="row">
  <div class="col-lg-12">
    <div class="card">

      <div class="card-header">
        <div class="row">
          <div class="col">
            <i class="far fa-dot-circle mr-2"></i><?php echo _("Hotspot"); ?>
          </div>
          <div class="col">
            <button class="btn btn-light btn-icon-split btn-sm service-status float-right">
              <span class="icon text-gray-600"><i class="fas fa-circle service-status-<?php echo $serviceStatus ?>"></i></span>
              <span class="text service-status">hostapd <?php echo _($serviceStatus) ?></span>
            </button>
          </div>
        </div><!-- /.row -->
      </div><!-- /.card-header -->

      <div class="card-body">
        <?php $status->showMessages(); ?>
        <form role="form" action="hostapd_conf" method="POST">
          <?php echo CSRFTokenFieldTag() ?>


          <?php echo $buttons ?>
        </form>
      </div><!-- /.card-body -->

      <div class="card-footer"> <?php echo _("Information provided by hostapd"); ?></div>

    </div><!-- /.card -->
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

