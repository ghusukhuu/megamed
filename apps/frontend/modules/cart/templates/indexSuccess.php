<?php if (count($items)): ?>
    <button type="button" class="btn dropdown-toggle cart_anchor" data-toggle="dropdown">
        <i class="fa fa-shopping-cart"></i> 
        Сагс (<?php echo count($items) ?>)
    </button>
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
                    <?php
                    $totalCount = 0;
                    $totalAmount = 0;
                    ?>

                    <?php foreach ($items as $id => $count): ?>
                        <?php $product = ProductTable::getBy($id); ?>

                        <?php if ($product): ?>
                            <?php $totalCount += $count; ?>
                            <?php $totalAmount += $count * $product->getPrice(); ?>

                            <tr>
                                <td class="quantity"><?php echo $count ?> x</td>
                                <td class="product"><a href="/product/<?php $id ?>"><?php echo $product->getName() ?></a><span class="small"><?php echo $product->getIntro() ?></span></td>
                                <td class="amount">₮<?php echo AppEntity::numberFormat($count * $product->getPrice()) ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <tr>
                        <td class="total-quantity" colspan="2">Нийт: <?php echo $totalCount ?></td>
                        <td class="total-amount">₮<?php echo AppEntity::numberFormat($totalAmount) ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="panel-body text-right">	
                <a href="/product" class="btn btn-group btn-default btn-sm">Шалгах</a>
                <a href="/product" class="btn btn-group btn-default btn-sm">Тооцоо хийх</a>
            </div>
        </li>
    </ul>
<?php else: ?>
    <?php include_partial('cart/info') ?>
<?php endif; ?>