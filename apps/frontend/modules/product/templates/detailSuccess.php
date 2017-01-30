<!-- page-intro start-->
<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="/">Нүүр</a></li>
                    <li><i class="fa fa-gg pr-10"></i><a href="/product?categoryId=<?php echo $product->getCategoryId() ?>">Бүтээгдэхүүн</a></li>
                    <li class="active"><?php echo $product->getName() ?></li>
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
            <div class="main col-md-12">

                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title margin-top-clear"><?php echo $product->getName() ?></h1>
                <!-- page-title end -->

                <div class="row">
                    <div class="col-md-4">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills white space-top" role="tablist">
                            <li class="active"><a href="#product-images" role="tab" data-toggle="tab" title="images"><i class="fa fa-camera pr-5"></i> Зураг</a></li>
                        </ul>

                        <!-- Tab panes start-->
                        <div class="tab-content clear-style">
                            <div class="tab-pane active" id="product-images">
                                <div class="owl-carousel content-slider-with-controls-bottom">
                                    <div class="overlay-container">
                                        <img src="/images/products/megamed/<?php echo $product->getPhoto() ?>" alt="">
                                        <a href="/images/products/megamed/<?php echo $product->getPhoto() ?>" class="popup-img overlay" title="<?php echo $product->getIntro() ?>"><i class="fa fa-search-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tab panes end-->
                        <hr>
                        <div class="elements-list pull-right clearfix">
                            <span class="price">₮<?php echo AppEntity::numberFormat($product->getPrice()) ?></span>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="row">
                            <form role="form">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Тоо</label>
                                        <input type="text" class="form-control" value="1" id="cnt">
                                    </div>
                                </div>

                                <?php $rows = ProductDetailTable::getDetails($product->getId()); ?>
                                <?php foreach ($rows as $typeId => $details): ?>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><?php echo $details[0]['name'] ?></label>
                                            <select class="form-control">
                                                <?php foreach ($details as $detail): ?>
                                                    <option value="<?php echo $detail['type_id'] ?>"><?php echo $detail['val'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="col-md-12">
                                    <a href="javascript:void(0)" class="btn btn-info add-to-cart" rel="<?php echo $product['id'] ?>"><i class="fa fa-shopping-cart pr-10"></i>Сагсанд нэмэх</a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- product side start -->
                    <aside class="col-md-8">
                        <div class="sidebar">
                            <div class="side product-item vertical-divider-left">
                                <div class="tabs-style-2">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="active"><a href="#h2tab1" role="tab" data-toggle="tab"><i class="fa fa-file-text-o pr-5"></i>Тайлбар</a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content padding-top-clear padding-bottom-clear">
                                        <div class="tab-pane fade in active" id="h2tab1">
                                            <h4 class="title"><?php echo $product->getIntro() ?></h4>
                                            <p>
                                                <?php echo $product->getDescr() ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- product side end -->
                </div>

            </div>
            <!-- main end -->

        </div>
    </div>
</section>
<!-- main-container end -->

<script type="text/javascript" src="/js/codex-fly.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.add-to-cart').on('click', function () {
            //Select item image and pass to the function
            var itemImg = $(this).parent().parent().parent().parent().find('img').eq(0);
            flyToElement($(itemImg), $('.cart_anchor'));

            $.ajax({
                url: "<?php echo url_for('@cart_add') ?>",
                data: "id=" + $(this).attr('rel'),
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