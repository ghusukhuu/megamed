<!-- page-intro start-->
<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="/">Удирдлага</a></li>
                    <li><i class="active"></i><a href="<?php echo url_for('@manage_product') ?>">Бүтээгдэхүүн</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- page-intro end -->

<section class="main-container">
    <div class="container">
        <div class="row">
            <?php include_partial('form', array('form' => $form)) ?>
        </div>
    </div>
</section>