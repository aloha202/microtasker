<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ForgotPasswordFormActivate
 *
 * @author Алекс
 */
class ForgotPasswordFormActivate extends BasesfGuardUserForm{
    
    public function configure()
    {
        $this->useFields(array('password'));
        
        $this->widgetSchema['password'] = new sfWidgetFormInputPassword;
        $this->widgetSchema['password_again'] = new sfWidgetFormInputPassword;
        $this->validatorSchema['password_again'] = new sfValidatorString;
        $this->validatorSchema['password']->setOption('min_length', 4);
        $this->validatorSchema['password']->setMessage('min_length', 'Пароль слишком короткий');        
        $this->widgetSchema->setHelp('password', 'Пароль должен быть не короче 4 символов');
        
        $this->widgetSchema->setLabels(array(
           'password' => 'Новый пароль',
            'password_again' => 'Еще раз пароль'
        ));
        
        $this->widgetSchema->setHelp('password', 'Пароль должен быть не короче 4 символов');
        
        $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'Пароли не совпадают')));
        $this->setPlaceholdersFromLabels();
        $this->widgetSchema->setFormFormatterName('bootstrap');  
    }
    
    
    
}
