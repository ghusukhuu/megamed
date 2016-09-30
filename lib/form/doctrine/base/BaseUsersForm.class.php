<?php

/**
 * Users form base class.
 *
 * @method Users getObject() Returns the current form's model object
 *
 * @package    megamed
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsersForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'username'   => new sfWidgetFormInputText(),
      'password'   => new sfWidgetFormInputText(),
      'lastname'   => new sfWidgetFormInputText(),
      'firstname'  => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'type'       => new sfWidgetFormInputText(),
      'last_login' => new sfWidgetFormDateTime(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'username'   => new sfValidatorString(array('max_length' => 155)),
      'password'   => new sfValidatorString(array('max_length' => 255)),
      'lastname'   => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'firstname'  => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'type'       => new sfValidatorInteger(array('required' => false)),
      'last_login' => new sfValidatorDateTime(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('users[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Users';
  }

}
