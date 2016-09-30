<?php

/**
 * Product form base class.
 *
 * @method Product getObject() Returns the current form's model object
 *
 * @package    megamed
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProductForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'category_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => false)),
      'name'            => new sfWidgetFormInputText(),
      'intro'           => new sfWidgetFormTextarea(),
      'descr'           => new sfWidgetFormTextarea(),
      'price'           => new sfWidgetFormInputText(),
      'photo'           => new sfWidgetFormInputText(),
      'is_active'       => new sfWidgetFormInputText(),
      'created_user_id' => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'category_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'))),
      'name'            => new sfValidatorString(array('max_length' => 150)),
      'intro'           => new sfValidatorString(array('max_length' => 455)),
      'descr'           => new sfValidatorString(),
      'price'           => new sfValidatorNumber(),
      'photo'           => new sfValidatorString(array('max_length' => 150)),
      'is_active'       => new sfValidatorInteger(array('required' => false)),
      'created_user_id' => new sfValidatorInteger(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('product[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Product';
  }

}
