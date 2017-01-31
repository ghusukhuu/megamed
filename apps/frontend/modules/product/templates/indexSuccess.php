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

<?php if (count($products)): ?>
    <!-- main-container start -->
    <section class="main-container">

        <div class="container">

            <div class="row">
                <!-- main start -->
                <div class="main col-md-12">
                    <!-- shop items start -->
                    <div class="masonry-grid-fitrows row grid-space-20">
                        <?php foreach ($products as $product): ?>
                            <div class="col-lg-3 col-sm-6 masonry-grid-item">
                                <div class="listing-item">
                                    <div class="overlay-container">
                                        <img src="/images/products/megamed/<?php echo $product['photo'] ?>" alt="">
                                        <a href="<?php echo url_for('@product_detail?id=' . $product['id']) ?>" class="overlay small">
                                            <i class="fa fa-plus"></i>
                                            <span>Дэлгэрэнгүй үзэх</span>
                                        </a>
                                    </div>

                                    <div class="listing-item-body clearfix">
                                        <h3 class="title">
                                            <a href="<?php echo url_for('@product_detail?id=' . $product['id']) ?>"><?php echo $product['name'] ?></a>
                                        </h3>
                                        <p>
                                            <?php echo $product['intro'] ?>
                                        </p>
                                        <span class="price">
                                            ₮<?php echo AppEntity::numberFormat($product['price']); ?>
                                        </span>
                                        <div class="elements-list pull-right">
                                            <a href="javascript:void(0)" class="add-to-cart" rel="<?php echo $product['id'] ?>"><i class="fa fa-shopping-cart pr-10"></i>Нэмэх</a>
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
                        <li><a href="#">»</a></li>
                    </ul>
                    <!-- pagination end -->

                </div>
                <!-- main end -->
            </div>

        </div>

    </section>
    <!-- main-container end -->
<?php else: ?>
    <div class="container">
        <div class="alert alert-info">Бүтээгдэхүүн олдсонгүй</div>
    </div>
<?php endif; ?>

<script type="text/javascript" src="/js/codex-fly.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.add-to-cart').on('click', function () {
            //Select item image and pass to the function
            var itemImg = $(this).parent().parent().parent().find('img').eq(0);
            flyToElement($(itemImg), $('.cart_anchor'));

            $.ajax({
                url: "<?php echo url_for('@cart_add') ?>",
                data: "cnt=1&id=" + $(this).attr('rel'),
                type: "POST",
                beforeSend: function () {
                },
                success: function (data, textStatus, jqXHR) {
                    //Scroll to top if cart icon is hidden on top
                    $('html, body').animate({
                        'scrollTop': $(".cart_anchor").position().top
                    });

                    $('#cartItems').html(data);
                }
            });
        });
    });
</script>