<?php if (count($items)): ?>
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

            <?php foreach ($items as $id => $cart): ?>
                <?php $product = ProductTable::getBy($id); ?>

                <?php if ($product): ?>
                    <?php $totalCount += $cart->cnt; ?>
                    <?php $totalAmount += $cart->cnt * $product->getPrice(); ?>

                    <tr>
                        <td class="quantity"><?php echo $cart->cnt ?> x</td>
                        <td class="product"><a href="<?php echo url_for('@product_detail?id=' . $id) ?>"><?php echo $product->getName() ?></a><span class="small"><?php echo $product->getIntro() ?></span></td>
                        <td class="amount">₮<?php echo AppEntity::numberFormat($cart->cnt * $product->getPrice()) ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>

            <tr>
                <td class="total-quantity" colspan="2">Нийт: <?php echo $totalCount ?></td>
                <td class="total-amount">₮<?php echo AppEntity::numberFormat($totalAmount) ?></td>
            </tr>
        </tbody>
    </table>
<?php else: ?>
    <?php include_partial('cart/info') ?>
<?php endif; ?>