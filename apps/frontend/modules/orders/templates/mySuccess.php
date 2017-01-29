<!-- page-intro start-->
<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="/">Удирдлага</a></li>
                    <li><i class="active"></i><a href="<?php echo url_for('@order_my') ?>">Миний захиалгууд</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- page-intro end -->

<?php if (count($rows)): ?>
    <section class="main-container">
        <div class="container">
            <div class="row">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Нэр</th>
                            <th>Утас</th>
                            <th>Хаяг</th>
                            <th>Дүн</th>
                            <th>Төлөх хэлбэр</th>
                            <th>Төлөв</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row): ?>
                            <tr>
                                <td><?php echo $row['firstname'] ?></td>
                                <td><?php echo $row['mobile'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td>₮<?php echo AppEntity::numberFormat($row['amount']) ?></td>
                                <td>
                                    <?php
                                    if ($row['payment_type'] == 1) {
                                        echo '<span class="label label-warning">банк</span>';
                                    } else {
                                        echo '<span class="label label-success">бэлэн</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($row['status'] == 1) {
                                        echo '<span class="label label-warning">new</span>';
                                    } elseif ($row['status'] == 2) {
                                        echo '<span class="label label-success">cancelled</span>';
                                    } elseif ($row['status'] == 3) {
                                        echo '<span class="label label-success">delivered</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo url_for('@order_products?id=' . $row['id']) ?>" rel="facebox">дэлгэрэнгүй</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </section>
<?php else: ?>
    <div class="container">
        <div class="alert alert-info">Захиалга олдсонгүй</div>
    </div>
<?php endif; ?>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('a[rel*=facebox]').facebox();
    });
</script>