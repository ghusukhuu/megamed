<form class="form-horizontal" action="<?php echo url_for('product/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id=' . $form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $form->renderHiddenFields(false) ?>
            <?php if (!$form->getObject()->isNew()): ?>
                &nbsp;<?php echo link_to('Delete', 'product/delete?id=' . $form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?', 'class' => 'btn btn-danger')) ?>
            <?php endif; ?>
            <input type="submit" value="Save" class="btn btn-default"/>
        </div>
    </div>
</form>

<script type="text/javascript">
    var editor = CKEDITOR.replace('product_intro');
    CKFinder.setupCKEditor(editor, '/js/ckfinder/');

    var editor2 = CKEDITOR.replace('product_descr');
    CKFinder.setupCKEditor(editor2, '/js/ckfinder/');
</script>