<!-- main-container start -->
<!-- ================ -->
<section class="main-container light-translucent-bg">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-8 col-md-offset-2">

                <!-- logo -->
                <div class="logo">
                    <a href="index.html"><img id="logo" src="/images/megamed.png" alt="MegaMed"></a>
                </div>

                <!-- name-and-slogan -->
                <div class="site-slogan">
                    Medical & Dental, Equipment Sales
                </div>

                <div class="object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="300">
                    <div class="form-block center-block">
                        <?php if ($form['username']->hasError() || $form['password']->hasError() || $form->renderGlobalErrors() != ''): ?>
                            <div class="alert alert-error">
                                <?php echo $form['username']->renderError() ?>
                                <?php echo $form['password']->renderError() ?>
                                <?php echo $form->renderGlobalErrors() ?>
                            </div>
                        <?php endif; ?>

                        <h2 class="title">Нэвтрэх хэсэг</h2>
                        <hr>
                        <form class="form-horizontal" action="<?php echo url_for('@login') ?>" method="post">
                            <div class="form-group has-feedback">
                                <label for="inputUserName" class="col-sm-3 control-label">Хэрэглэгчийн нэр</label>
                                <div class="col-sm-8">
                                    <?php echo $form['username'] ?>
                                    <i class="fa fa-user form-control-feedback"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputPassword" class="col-sm-3 control-label">Нууц үг</label>
                                <div class="col-sm-8">
                                    <?php echo $form['password'] ?>
                                    <i class="fa fa-lock form-control-feedback"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <button type="submit" class="btn btn-group btn-default btn-sm">Нэвтрэх</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- main end -->

        </div>
    </div>

</section>
<!-- main-container end -->