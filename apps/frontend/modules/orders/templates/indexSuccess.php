<link href="/js/facebox/facebox.css" media="screen" rel="stylesheet"/>
<script type="text/javascript" src="/js/facebox/facebox.js"></script>

<!-- page-intro start-->
<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="/">Удирдлага</a></li>
                    <li><i class="active"></i><a href="<?php echo url_for('@orders') ?>">Захиалгууд</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- page-intro end -->

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
                                <select rel="<?php echo $row['id'] ?>">
                                    <option <?php if ($row['status'] == 1) echo ' selected="selected" ' ?> value="1">new</option>
                                    <option <?php if ($row['status'] == 2) echo ' selected="selected" ' ?> value="2">cancelled</option>
                                    <option <?php if ($row['status'] == 3) echo ' selected="selected" ' ?> value="3">delivered</option>
                                </select>
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

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('a[rel*=facebox]').facebox();
    });

    $('select').change(function () {
        $.ajax({
            url: "<?php echo url_for('@order_update') ?>",
            data: "id=" + $(this).attr('rel') + '&status=' + $(this).val(),
            type: "POST",
            beforeSend: function () {
            },
            success: function (data) {
                console.log('updated');
            }
        });
    });
</script>