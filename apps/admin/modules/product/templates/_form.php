<form action="<?php echo url_for('product/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id=' . $form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>
        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $form->renderHiddenFields(false) ?>
                    &nbsp;<a href="<?php echo url_for('product/index') ?>">Back to list</a>
                    <?php if (!$form->getObject()->isNew()): ?>
                        &nbsp;<?php echo link_to('Delete', 'product/delete?id=' . $form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
                    <?php endif; ?>
                    <input type="submit" value="Save" />
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
            <tr>
                <th><?php echo $form['category_id']->renderLabel() ?></th>
                <td>
                    <?php echo $form['category_id']->renderError() ?>
                    <?php echo $form['category_id'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['name']->renderLabel() ?></th>
                <td>
                    <?php echo $form['name']->renderError() ?>
                    <?php echo $form['name'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['intro']->renderLabel() ?></th>
                <td>
                    <?php echo $form['intro']->renderError() ?>
                    <?php echo $form['intro'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['descr']->renderLabel() ?></th>
                <td>
                    <?php echo $form['descr']->renderError() ?>
                    <?php echo $form['descr'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['price']->renderLabel() ?></th>
                <td>
                    <?php echo $form['price']->renderError() ?>
                    <?php echo $form['price'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['photo']->renderLabel() ?></th>
                <td>
                    <?php echo $form['photo']->renderError() ?>
                    <?php echo $form['photo'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['is_active']->renderLabel() ?></th>
                <td>
                    <?php echo $form['is_active']->renderError() ?>
                    <?php echo $form['is_active'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['created_user_id']->renderLabel() ?></th>
                <td>
                    <?php echo $form['created_user_id']->renderError() ?>
                    <?php echo $form['created_user_id'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['created_at']->renderLabel() ?></th>
                <td>
                    <?php echo $form['created_at']->renderError() ?>
                    <?php echo $form['created_at'] ?>
                </td>
            </tr>
        </tbody>
    </table>
</form>
