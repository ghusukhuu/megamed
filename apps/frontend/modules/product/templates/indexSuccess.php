<!-- page-intro start-->
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
<section class="main-container">

    <div class="container">

        <div class="row">
            <!-- main start -->
            <div class="main col-md-12">
                <!-- shop items start -->
                <div class="masonry-grid-fitrows row grid-space-20">
                    <?php foreach ($products as $product): ?>
                        <div class="col-sm-3 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="/images/products/megamed/thumbs/<?php echo $product['photo'] ?>" alt="">
                                    <a href="<?php echo url_for('@product_detail?name=' . $product['name']) ?>" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>Дэлгэрэнгүй үзэх</span>
                                    </a>
                                </div>

                                <div class="listing-item-body clearfix">
                                    <h3 class="title">
                                        <a href="<?php echo url_for('@product_detail?name=' . $product['name']) ?>"><?php echo $product['name'] ?></a>
                                    </h3>
                                    <p>
                                        <?php echo $product['intro'] ?>
                                    </p>
                                    <span class="price">
                                        ₮<?php echo number_format($product['price'], 0, '.', ','); ?>
                                    </span>
                                    <div class="elements-list pull-right">
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
                    <li><a href="#">»</a></li>
                </ul>
                <!-- pagination end -->

            </div>
            <!-- main end -->
        </div>

    </div>

</section>
<!-- main-container end -->