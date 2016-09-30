<?php

/**
 * ProductDetail filter form base class.
 *
 * @package    megamed
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProductDetailFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'product_id'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'product_detail_type_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'val'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'product_id'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'product_detail_type_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'val'                    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('product_detail_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductDetail';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'product_id'             => 'Number',
      'product_detail_type_id' => 'Number',
      'val'                    => 'Text',
    );
  }
}
