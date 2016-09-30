<?php

/**
 * ProductDetail form base class.
 *
 * @method ProductDetail getObject() Returns the current form's model object
 *
 * @package    megamed
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProductDetailForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'product_id'             => new sfWidgetFormInputText(),
      'product_detail_type_id' => new sfWidgetFormInputText(),
      'val'                    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'product_id'             => new sfValidatorInteger(),
      'product_detail_type_id' => new sfValidatorInteger(),
      'val'                    => new sfValidatorString(array('max_length' => 155)),
    ));

    $this->widgetSchema->setNameFormat('product_detail[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductDetail';
  }

}
