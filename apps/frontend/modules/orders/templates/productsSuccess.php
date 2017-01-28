<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>Бараа</th>
            <th>Тоо</th>
            <th>Үнэ</th>
            <th>Нийт</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['quantity'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['amount'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>