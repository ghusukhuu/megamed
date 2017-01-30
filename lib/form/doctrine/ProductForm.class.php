<?php

/**
 * Product form.
 *
 * @package    megamed
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductForm extends BaseProductForm
{

    public function configure()
    {
        $options = array(1 => 'Идэвхитэй', 2 => 'Идэвхигүй');

        $this->setWidgets(array(
            'id' => new sfWidgetFormInputHidden(),
            'category_id' => new sfWidgetFormDoctrineChoice(array('label' => 'Ангилал:', 'model' => $this->getRelatedModelName('Category'), 'add_empty' => false), array('class' => 'form-control')),
            'name' => new sfWidgetFormInputText(array('label' => 'Нэр:'), array('class' => 'form-control')),
            'intro' => new sfWidgetFormTextarea(array('label' => 'Товч:'), array('class' => 'form-control')),
            'descr' => new sfWidgetFormTextarea(array('label' => 'Тайлбар:'), array('class' => 'form-control')),
            'price' => new sfWidgetFormInputText(array('label' => 'Үнэ:'), array('class' => 'form-control')),
            'photo' => new sfWidgetFormInputFile(array('label' => 'Зураг')),
            'is_active' => new sfWidgetFormSelect(array('choices' => $options, 'label' => 'Төлөв:'), array('class' => 'form-control')),
        ));

        $this->setValidators(array(
            'id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
            'category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'))),
            'name' => new sfValidatorString(array('max_length' => 150)),
            'intro' => new sfValidatorString(array('max_length' => 455)),
            'descr' => new sfValidatorString(),
            'price' => new sfValidatorNumber(),
            'photo' => new sfValidatorFile(
                    array(
                'required' => false,
                'max_size' => 5242880,
                'path' => sfConfig::get('sf_root_dir') . '/' . AppConstant::DIR_PRODUCT . '/images/products/megamed/',
                'mime_types' => array(
                    'image/jpeg',
                    'image/pjpeg',
                    'image/png',
                    'image/x-png',
                    'image/gif',
                )), array(
                'required' => 'Та зураг оруулна уу',
                'max_size' => 'Таны оруулсан зурагны хэмжээ иx байна. Хамгийн иxдээ 5MB.',
                'mime_types' => 'Та зөвxөн зурган файл оруулаx боломжтой')),
            'is_active' => new sfValidatorInteger(array('required' => false)),
        ));

        $this->widgetSchema['photo'] = new sfWidgetFormInputFileEditable(array(
            'label' => 'Зураг',
            'file_src' => '/images/products/megamed/' . $this->getObject()->getPhoto(),
            'is_image' => true,
            'edit_mode' => !$this->isNew(),
                ), array('width' => 500));

        $this->widgetSchema->setNameFormat('product[%s]');
    }

}
