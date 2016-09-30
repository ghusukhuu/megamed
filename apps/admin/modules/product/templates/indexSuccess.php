<h1>Products List</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Category</th>
            <th>Name</th>
            <th>Intro</th>
            <th>Descr</th>
            <th>Price</th>
            <th>Photo</th>
            <th>Is active</th>
            <th>Created user</th>
            <th>Created at</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><a href="<?php echo url_for('product/edit?id=' . $product->getId()) ?>"><?php echo $product->getId() ?></a></td>
                <td><?php echo $product->getCategoryId() ?></td>
                <td><?php echo $product->getName() ?></td>
                <td><?php echo $product->getIntro() ?></td>
                <td><?php echo $product->getDescr() ?></td>
                <td><?php echo $product->getPrice() ?></td>
                <td><?php echo $product->getPhoto() ?></td>
                <td><?php echo $product->getIsActive() ?></td>
                <td><?php echo $product->getCreatedUserId() ?></td>
                <td><?php echo $product->getCreatedAt() ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?php echo url_for('product/new') ?>">New</a>
