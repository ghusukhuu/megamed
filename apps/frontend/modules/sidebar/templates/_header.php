<?php
$facebook = new Facebook(array(
    'appId' => sfConfig::get('app_facebook_id'),
    'secret' => sfConfig::get('app_secret_id')
        ));

if ($facebook) {
    $params = array('redirect_uri' => 'http://megamed.mn');
    $loginUrl = $facebook->getLoginUrl($params);
}
?>

<!-- header-top start (Add "dark" class to .header-top in order to enable dark header-top e.g <div class="header-top dark">) -->
<!-- ================ -->
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-2 col-sm-6">
            </div>
            <div class="col-xs-10 col-sm-6">

                <!-- header-top-second start -->
                <!-- ================ -->
                <div id="header-top-second"  class="clearfix">

                    <!-- header top dropdowns start -->
                    <!-- ================ -->
                    <div class="header-top-dropdown">
                        <div class="btn-group dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                <?php if ($sf_user->isAuthenticated()): ?>
                                    <img src="<?php echo $sf_user->getPhoto() ?>" width="16" class="img-circle" style="display: initial;"/>
                                    <?php echo $sf_user->getFirstname() ?>
                                <?php else: ?>
                                    <i class="fa fa-user"></i> Нэвтрэх
                                <?php endif; ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-animation">
                                <li>
                                    <?php if ($sf_user->isAuthenticated()): ?>
                                        <a href="<?php echo $sf_user->getAttribute('logout', '/logout') ?>">
                                            <i class="fa fa-sign-out"></i> Гарах
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo $loginUrl ?>">
                                            <i class="fa fa-facebook"></i> Нэвтрэх
                                        </a>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                        <div id="cartItems" class="btn-group dropdown">
                            <?php include_partial('cart/info') ?>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $.ajax({
                                        url: "<?php echo url_for('@cart_add') ?>",
                                        data: "id=" + $(this).attr('rel'),
                                        type: "POST",
                                        beforeSend: function () {
                                        },
                                        success: function (data, textStatus, jqXHR) {
                                            $('#cartItems').html(data);
                                        }
                                    });
                                });
                            </script>
                        </div>

                    </div>
                    <!--  header top dropdowns end -->

                </div>
                <!-- header-top-second end -->

            </div>
        </div>
    </div>
</div>
<!-- header-top end -->