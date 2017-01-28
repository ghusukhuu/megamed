<?php if ($sf_user->hasFlash("success")): ?>
    <div class="alert alert-success">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <?php echo $sf_user->getFlash("success") ?>
    </div>
<?php elseif ($sf_user->hasFlash("warning")): ?>
    <div class="alert alert-warning">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <?php echo $sf_user->getFlash("warning") ?>
    </div>
<?php elseif ($sf_user->hasFlash("error")): ?>
    <div class="alert alert-danger">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <?php echo $sf_user->getFlash("error") ?>
    </div>
<?php elseif ($sf_user->hasFlash("info")): ?>
    <div class="alert alert-info">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <?php echo $sf_user->getFlash("info") ?>
    </div>
<?php endif; ?>