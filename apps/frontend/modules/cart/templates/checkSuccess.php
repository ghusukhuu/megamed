<?php if (count($items)): ?>
    <!-- page-intro start-->
    <div class="page-intro">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home pr-10"></i><a href="/">Нүүр</a></li>
                        <li><i class="active"></i><a href="<?php echo url_for('@cart_check') ?>">Тооцоо хийх</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- page-intro end -->

    <div class="container">
        <div class="row">
            <form method="post" action="<?php echo url_for('@cart_check') ?>" role="form" class="form-horizontal">
                <!-- main start -->
                <div class="main col-md-12">
                    <div class="space"></div>
                    <table class="table cart table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Бүтээгдэхүүн</th>
                                <th>Үнэ</th>
                                <th>Тоо</th>
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
                                        <td class="product"><a href="#"><?php echo $product->getName() ?></a><span class="small"><?php echo $product->getIntro() ?></span></td>
                                        <td class="price">₮<?php echo AppEntity::numberFormat($product->getPrice()) ?></td>
                                        <td class="quantity">
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?php echo $count ?>" disabled>
                                            </div>											
                                        </td>
                                        <td class="amount">₮<?php echo AppEntity::numberFormat($count * $product->getPrice()) ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <tr>
                                <td class="total-quantity" colspan="3">Нийт: <?php echo $totalCount ?></td>
                                <td class="total-amount">₮<?php echo AppEntity::numberFormat($totalAmount) ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="space-bottom"></div>
                    <fieldset>
                        <legend>Хүргэлтийн мэдээлэл</legend>
                        <div role="form" class="form-horizontal">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h3 class="title">Хувийн мэдээлэл</h3>
                                </div>
                                <div class="col-lg-8 col-lg-offset-1">
                                    <div class="form-group">
                                        <label for="firstname" class="col-md-2 control-label">Нэр<small class="text-default">*</small></label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile" class="col-md-2 control-label">Утас<small class="text-default">*</small></label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $firstname ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="col-md-2 control-label">Хаяг<small class="text-default">*</small></label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" rows="4" name="address" value="<?php echo $firstname ?>"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Төлөх хэлбэр сонгох</legend>
                        <div role="form" class="form-horizontal">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="payment" value="1" checked="">
                                            Дансаар<i class="fa fa-cc-visa pl-10"></i><i class="fa fa-cc-amex pl-10"></i><i class="fa fa-cc-mastercard pl-10"></i>
                                        </label>
                                    </div>
                                    <div class="space-bottom"></div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Банк<small class="text-default">*</small></label>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="form-control">
                                                        <option value="golomt" selected="selected">Голомт банк</option>
                                                    </select>															
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Дансны дугаар<small class="text-default">*</small></label>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" value="1245101151">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-9">Дансны <b>гүйлгээний утга</b> дээр "Хувийн мэдээлэл" хэсэгт оруулсан <b>нэр</b> болон <b>утас</b>ны дугаараа оруулаарай</div>
                                    </div>
                                </div>
                            </div>
                            <div class="space"></div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="payment" value="2">
                                            Бэлнээр
                                        </label>
                                    </div>
                                    <div class="space-bottom"></div>
                                </div>
                                <div class="col-lg-9">
                                    <p>Захиалсан бараагаа хүлээн авахдаа бэлнээр төлөх</p>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="text-right">	
                        <a href="<?php echo url_for('@cart_view') ?>" class="btn btn-group btn-default btn-sm"><i class="icon-left-open-big"></i> Сагс руу буцах</a>
                        <button type="submit" class="btn btn-group btn-success btn-sm">Захиалах <i class="icon-right-open-big"></i></a>
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