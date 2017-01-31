<div style="min-width: 600px;">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Бараа</th>
                <th width="50">Тоо</th>
                <th width="80">Үнэ</th>
                <th width="80">Нийт</th>
                <th width="150">Нэмэлт</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['quantity'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td><?php echo $row['amount'] ?></td>
                    <td>
                        <?php echo OrderProductDetailsTable::getDetails($row['id']); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>