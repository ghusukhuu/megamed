<?php if (count($items)): ?>
    <!-- page-intro start-->
    <!-- ================ -->
    <div class="page-intro">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home pr-10"></i><a href="/">Нүүр</a></li>
                        <li><i class="active"></i><a href="<?php echo url_for('@cart_view') ?>">Сагс шалгах/засах</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- page-intro end -->

    <div class="container">
        <div class="row">
            <form method="post">
                <!-- main start -->
                <!-- ================ -->
                <div class="main col-md-12">
                    <table class="table cart table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Бүтээгдэхүүн</th>
                                <th>Үнэ</th>
                                <th>Тоо</th>
                                <th>Үйлдэл</th>
                                <th class="amount">Нийт</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $totalCount = 0;
                            $totalAmount = 0;
                            ?>

                            <?php foreach ($items as $id => $count): ?>
                                <?php $product = ProductTable::getBy($id); ?>

                                <?php if ($product): ?>
                                    <?php $totalCount += $count; ?>
                                    <?php $totalAmount += $count * $product->getPrice(); ?>

                                    <tr class="remove-data">
                                        <td class="product"><a href="<?php echo url_for('@product_detail?id=' . $id) ?>"><?php echo $product->getName() ?></a><span class="small"><?php echo $product->getIntro() ?></span></td>
                                        <td class="price">₮<?php echo AppEntity::numberFormat($product->getPrice()) ?></td>
                                        <td class="quantity">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="product[<?php echo $id ?>]" value="<?php echo $count ?>">
                                            </div>											
                                        </td>
                                        <td class="remove"><a class="btn btn-remove btn-default">устгах</a></td>
                                        <td class="amount">₮<?php echo AppEntity::numberFormat($count * $product->getPrice()) ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <tr>
                                <td class="total-quantity" colspan="3">Нийт: <?php echo $totalCount ?></td>
                                <td><span class="small"><u>бараа устгасан бол хадгалах дарна уу</u></span></td>
                                <td class="total-amount">₮<?php echo AppEntity::numberFormat($totalAmount) ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-right">	
                        <button type="submit" class="btn btn-group btn-success btn-sm">Хадгалах</button>
                        <a href="<?php echo url_for('@cart_check') ?>" class="btn btn-group btn-primary btn-sm">Тооцоо хийх</a>
                    </div>
                </div>
                <!-- main end -->
            </form>
        </div>
    </div>
<?php else: ?>
    <div class="container">
        <div class="alert alert-info">Сагсанд бараа алга</div>
    </div>
<?php endif; ?>