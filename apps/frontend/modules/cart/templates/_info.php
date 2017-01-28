<button type="button" class="btn dropdown-toggle cart_anchor" data-toggle="dropdown">
    <i class="fa fa-shopping-cart"></i> 
    Сагс
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
                <tr>
                    <td class="total-quantity" colspan="2">Нийт: 0</td>
                    <td class="total-amount">₮0</td>
                </tr>
            </tbody>
        </table>

        <div class="panel-body text-right">	
            <a href="<?php echo url_for('@cart_view') ?>" class="btn btn-group btn-default btn-sm">Шалгах</a>
            <a href="<?php echo url_for('@cart_check') ?>" class="btn btn-group btn-default btn-sm">Тооцоо хийх</a>
        </div>
    </li>
</ul>