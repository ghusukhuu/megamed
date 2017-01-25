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
                        <div class="btn-group dropdown">
                            <button type="button" class="btn dropdown-toggle cart_anchor" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> Сагс (2)</button>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-animation cart">
                                <li>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="quantity">Тоо</th>
                                                <th class="product">Бараа</th>
                                                <th class="amount">Нийт</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="quantity">2 x</td>
                                                <td class="product"><a href="/product">C - Cement Flow</a><span class="small">Нүүрэвч, циркон бүрээс</span></td>
                                                <td class="amount">₮160,000</td>
                                            </tr>
                                            <tr>
                                                <td class="quantity">3 x</td>
                                                <td class="product"><a href="shop-product.html">Megacem</a><span class="small">Зуурч хэрэглэдэг гласс иономерны цемент</span></td>
                                                <td class="amount">₮80,000</td>
                                            </tr>
                                            <tr>
                                                <td class="total-quantity" colspan="2">Нийт 5</td>
                                                <td class="total-amount">₮560,000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="panel-body text-right">	
                                        <a href="/product" class="btn btn-group btn-default btn-sm">Үзэх</a>
                                        <a href="/product" class="btn btn-group btn-default btn-sm">Шалгах</a>
                                    </div>
                                </li>
                            </ul>
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