<h1>Бүтээгдэхүүн</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Ангилал</th>
            <th>Нэр</th>
            <th>Товч</th>
            <th>Тайлбар</th>
            <th>Үнэ</th>
            <th>Зураг</th>
            <th>Идэвхитэй эсэх</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><a href="<?php echo url_for('product/edit?id=' . $product['id']) ?>"><?php echo $product['id'] ?></a></td>
                <td><?php echo $product['category_name'] ?></td>
                <td><?php echo $product['name'] ?></td>
                <td><?php echo $product['intro'] ?></td>
                <td><?php echo $product['descr'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td>
                    <img src="/images/products/megamed/<?php echo $product['photo'] ?>"/>
                </td>
                <td><?php echo AppEntity::yesOrNo($product['is_active']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>