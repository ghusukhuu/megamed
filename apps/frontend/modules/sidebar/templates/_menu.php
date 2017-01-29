<!-- header start classes:
        fixed: fixed navigation mode (sticky menu) e.g. <header class="header fixed clearfix">
         dark: dark header version e.g. <header class="header dark clearfix">
================ -->
<header class="header fixed clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <!-- header-left start -->
                <!-- ================ -->
                <div class="header-left clearfix">

                    <!-- logo -->
                    <div class="logo-dis">
                        <a href="/"><img id="logo" src="/images/megamed.png" alt="MegaMed"></a>
                    </div>

                    <!-- name-and-slogan -->
                    <div class="site-slogan">
                        Medical & Dental, Equipment Sales
                    </div>

                </div>
                <!-- header-left end -->

            </div>
            <div class="col-md-9">

                <!-- header-right start -->
                <!-- ================ -->
                <div class="header-right clearfix">

                    <!-- main-navigation start -->
                    <!-- ================ -->
                    <div class="main-navigation animated">

                        <!-- navbar start -->
                        <!-- ================ -->
                        <nav class="navbar navbar-default" role="navigation">
                            <div class="container-fluid">

                                <!-- Toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="dropdown">
                                            <a href="/product?categoryId=1" class="dropdown-toggle" data-toggle="dropdown">Бүтээгдэхүүн</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="/product?categoryId=1">Шүд</a></li>
                                                <li><a href="/product?categoryId=2">Арьс гоо засал</a></li>												
                                                <li><a href="/product?categoryId=3">Лабортори</a></li>
                                                <li><a href="/product?categoryId=4">Эмэгтэйчүүд</a></li>
                                                <li><a href="/product?categoryId=5">Эмнэлэгийн нэг удаагийн хэрэгсэл</a></li>
                                                <li><a href="/product?categoryId=6">Эмч, эмнэлэгийн ажилчдын хувцас</a></li>
                                                <li><a href="/product?categoryId=7">Бусад</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/news">Мэдээ</a>
                                        </li>
                                        <li>
                                            <a href="/about">Бидний тухай</a>
                                        </li>
                                        <li>
                                            <a href="/contact">Холбоо барих</a>
                                        </li>
                                        <?php if ($sf_user->hasCredential('admin')): ?>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Удирдлага</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo url_for('@orders') ?>">Захиалгууд</a></li>
                                                    <li><a href="<?php echo url_for('@manage_product') ?>">Бүтээгдэхүүн</a></li>
                                                    <li><a href="<?php echo url_for('@manage_product_new') ?>">Бүтээгдэхүүн нэмэх</a></li>
                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>

                            </div>
                        </nav>
                        <!-- navbar end -->

                    </div>
                    <!-- main-navigation end -->

                </div>
                <!-- header-right end -->

            </div>
        </div>
    </div>
</header>
<!-- header end -->