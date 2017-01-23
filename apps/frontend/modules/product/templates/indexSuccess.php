<!-- page-intro start-->
<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="/">Нүүр</a></li>
                    <li><i class="active"></i><a href="/product">Бүтээгдэхүүн</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- page-intro end -->

<!-- main-container start -->
<!-- ================ -->
<section class="main-container">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-9">

                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title">Бүтээгдэхүүн</h1>
                <div class="separator-2"></div>
                <p class="lead">Герман улсын "Megadenta" компанийн "Megafill" шүдний ломбоны материал</p>
                <!-- page-title end -->

                <!-- shop items start -->
                <div class="masonry-grid-fitrows row grid-space-20">
                    <?php foreach ($products as $product): ?>
                        <div class="col-lg-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="/images/products/megamed/thumbs/<?php echo $product['photo'] ?>" alt="" style="min-height: 300px;">
                                    <a href="<?php echo url_for('@product_detail?name=' . $product['name']) ?>" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>Дэлгэрэнгүй үзэх</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="<?php echo url_for('@product_detail?name=' . $product['name']) ?>"><?php echo $product['name'] ?></a></h3>
                                    <p><?php echo $product['intro'] ?></p>
                                    <span class="price">₮<?php echo $product['price'] ?></span>
                                    <div class="elements-list pull-right">
                                        <a href="#" class="wishlist" title="wishlist"><i class="fa fa-heart-o"></i></a>
                                        <a href="#"><i class="fa fa-shopping-cart pr-10"></i>Нэмэх</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- shop items end -->

                <div class="clearfix"></div>

                <!-- pagination start -->
                <ul class="pagination">
                    <li><a href="#">«</a></li>
                    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">»</a></li>
                </ul>
                <!-- pagination end -->

            </div>
            <!-- main end -->

            <aside class="col-md-3">
                <div class="sidebar">
                    <div class="block clearfix">
                        <h2>Хайлтын хэсэг</h2>
                        <div class="separator"></div>
                        <div class="sorting-filters">
                            <form>
                                <div class="form-group">
                                    <label>Эрэмбэл</label>
                                    <select class="form-control">
                                        <option>&nbsp;</option>
                                        <option>Үнэ</option>
                                        <option>Огноо</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Дараалал</label>
                                    <select class="form-control">
                                        <option>&nbsp;</option>
                                        <option>Буурах</option>
                                        <option>Өсөх</option>
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <label>Үнэ $ (min/max)</label>
                                    <div class="row grid-space-10">
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control col-xs-6">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Ангилал</label>
                                    <select class="form-control">
                                        <option>&nbsp;</option>
                                        <option>Smartphones</option>
                                        <option>Tablets</option>
                                        <option>Smart Watches</option>
                                        <option>Desktops</option>
                                        <option>Software</option>
                                        <option>Accessories</option>
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <a href="#" class="btn btn-default">Хайх</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</section>
<!-- main-container end -->