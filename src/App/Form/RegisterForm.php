<?php
namespace App\Form;

use Aura\Input\Form;

class RegisterForm extends Form
{
    public function init()
    {
        $this->setField('email')->setAttribs([
            'maxlength' => 150, 'required' => 'required', 'class' => 'form-control'
        ]);
        $this->setField('password', 'password')->setAttribs([
            'maxlength' => 20, 'required' => 'required', 'class' => 'form-control'
        ]);
        $this->setField('password_confirm', 'password')->setAttribs([
            'maxlength' => 20, 'required' => 'required', 'class' => 'form-control'
        ]);
        
        $this->setField('submit', 'submit')->setAttribs([
            'value' => 'Zarejestruj się', 'class' => 'btn btn-primary'
        ]);
        
        $filter = $this->getFilter();
        
        $filter->setRule(
            'email', 
            'Wprowadź poprawny adres email.', 
            function ($value) {
                return filter_var($value, FILTER_VALIDATE_EMAIL);
            }
        );
        
        $filter->setRule(
            'password', 
            'Hasło musi posiadać minimum 6 znaków.', 
            function ($value) {
                if (strlen($value) >= 6) {
                    return true;
                }
                return false;
            }
        );
        
        $filter->setRule(
            'password_confirm',
            'Hasła muszą być zgodne.',
            function ($value, $fields) {
                return $value == $fields->password;
            }
        );
    }
}