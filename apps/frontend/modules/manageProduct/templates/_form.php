<form class="form-horizontal" action="<?php echo ($form->getObject()->isNew() ? url_for('@manage_product_create') : url_for('@manage_product_update?id=' . $form->getObject()->getId())) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form->renderGlobalErrors() ?>

    <div class="form-group">
        <label class="col-sm-2 control-label">Ангилал</label>
        <div class="col-sm-9">
            <?php echo $form['category_id']->renderError() ?>
            <?php echo $form['category_id'] ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Нэр</label>
        <div class="col-sm-9">
            <?php echo $form['name']->renderError() ?>
            <?php echo $form['name'] ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Товч</label>
        <div class="col-sm-9">
            <?php echo $form['intro']->renderError() ?>
            <?php echo $form['intro'] ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Дэлгэрэнгүй</label>
        <div class="col-sm-9">
            <?php echo $form['descr']->renderError() ?>
            <?php echo $form['descr'] ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Үнэ</label>
        <div class="col-sm-9">
            <?php echo $form['price']->renderError() ?>
            <?php echo $form['price'] ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Зураг</label>
        <div class="col-sm-9">
            <?php echo $form['photo']->renderError() ?>
            <?php echo $form['photo'] ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Төлөв</label>
        <div class="col-sm-9">
            <?php echo $form['is_active']->renderError() ?>
            <?php echo $form['is_active'] ?>
        </div>
    </div>

    <div class="space"></div>

    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-9">
            <button type="button" onclick="addDetail()" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Нэмэлт мэдээлэл</button>
        </div>
    </div>

    <div id="product-details-new">
    </div>

    <?php $types = ProductDetailTypeTable::getForSelect(); ?>
    <?php $rows = ProductDetailTypeTable::getList(); ?>
    <?php if (!$form->getObject()->isNew()): ?>
        <div id="product-details-old">
            <?php $productDetails = ProductDetailTable::getList($form->getObject()->getId()); ?>
            <?php foreach ($productDetails as $detail): ?>
                <div class="form-group" id="detail<?php echo $detail['id'] ?>">
                    <label class="col-sm-2 control-label">Нэмэлт</label>
                    <div class="col-sm-9">
                        <select class="form-control2" name="productDetailId[<?php echo $detail['id'] ?>]">
                            <?php foreach ($types as $key => $value): ?>
                                <option <?php if ($key == $detail['product_detail_type_id']) echo ' selected="selected" '; ?> value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input class="form-control2" type="text" name="productDetailVal[<?php echo $detail['id'] ?>]" value="<?php echo $detail['val'] ?>"/>
                        <button type="button" onclick="removeDetail(<?php echo $detail['id'] ?>)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $form->renderHiddenFields(false) ?>
            <?php if (!$form->getObject()->isNew()): ?>
                &nbsp;<?php echo link_to('Устгах', '@manage_product_delete?id=' . $form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?', 'class' => 'btn btn-danger')) ?>
            <?php endif; ?>
            <input type="submit" value="Хадгалах" class="btn btn-default"/>
        </div>
    </div>
</form>

<script type="text/javascript">
    var editor2 = CKEDITOR.replace('product_descr');
    CKFinder.setupCKEditor(editor2, '/js/ckfinder/');

    var types = <?php echo json_encode($rows) ?>;

    function addDetail() {
        id = guid();
        var options = '';
        for (var i = 0; i < types.length; i++) {
            options += '<option value="' + types[i].id + '">' + types[i].name + '</option>';
        }
        var template = '<div class="form-group" id="newDetail' + id + '">	<label class="col-sm-2 control-label">Нэмэлт</label>	<div class="col-sm-9">		<select class="form-control2" name="newProductDetailId[' + id + ']">			' + options + '		</select>		<input class="form-control2" type="text" name="newProductDetailVal[' + id + ']" value=""/>		<button type="button" onclick="removeDetailNew(\'' + id + '\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>	</div></div>';
        $('#product-details-new').append(template);
    }

    function guid() {
        function s4() {
            return Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
        }
        return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
                s4() + '-' + s4() + s4() + s4();
    }

    function removeDetail(id) {
        if (confirm('Устгах уу?')) {
            $.ajax({
                url: "<?php echo url_for('@product_detail_remove') ?>",
                data: "id=" + id,
                type: "GET",
                beforeSend: function () {
                },
                success: function (data) {
                    $('#detail' + id).remove();
                    console.log('removed');
                }
            });
        }
    }

    function removeDetailNew(id) {
        $('#newDetail' + id).remove();
    }
</script>