<?php

/**
 * Product filter form base class.
 *
 * @package    megamed
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProductFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      'name'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'intro'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descr'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'price'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'photo'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_active'       => new sfWidgetFormFilterInput(),
      'created_user_id' => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'category_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Category'), 'column' => 'id')),
      'name'            => new sfValidatorPass(array('required' => false)),
      'intro'           => new sfValidatorPass(array('required' => false)),
      'descr'           => new sfValidatorPass(array('required' => false)),
      'price'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'photo'           => new sfValidatorPass(array('required' => false)),
      'is_active'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_user_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('product_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Product';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'category_id'     => 'ForeignKey',
      'name'            => 'Text',
      'intro'           => 'Text',
      'descr'           => 'Text',
      'price'           => 'Number',
      'photo'           => 'Text',
      'is_active'       => 'Number',
      'created_user_id' => 'Number',
      'created_at'      => 'Date',
    );
  }
}
