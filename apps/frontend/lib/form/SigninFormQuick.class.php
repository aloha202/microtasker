<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SigninFormQuick
 *
 * @author Алекс
 */
class SigninFormQuick extends BaseForm{
    
    protected $message = '';
    public function setup()
    {
        $this->widgetSchema['email'] = new sfWidgetFormInputText;
        $this->widgetSchema['password'] = new sfWidgetFormInputPassword;
        
        $this->validatorSchema['email'] = new sfValidatorEmail;
        $this->validatorSchema['password'] = new sfValidatorString;        
        
        $this->widgetSchema->setNameFormat('signin[%s]');
    }
    
    public function save($type = 'enter')
    {
        $result = true;
        $user = Q::c('sfGuardUser', 'u')
            ->where('u.is_active = ?', true)
            ->andWhere('u.username = ?', $this->values['email'])
                    ->fetchOne()
            ;        
        switch($type){
            case 'enter':

                if($user){
                    $test_user = new sfGuardUser;
                    $test_user->setSalt($user->getSalt());
                    $test_user->setPassword($this->values['password']);
                    if($user->getPassword() == $test_user->getPassword()){
                        sfContext::getInstance()->getUser()->signin($user);
                        return true;
                    }
                }
                $this->message = 'Неверные логин/пароль';
                return false;
                break;
            case 'register':
                if($user){
                    $this->message = 'Пользователь с такие email уже существует';
                    return false;
                }
                $user = new sfGuardUser;
                $user->fromArray(array(
                   'username' => $this->values['email'],
                    'email_address' => $this->values['email'],
                    'salt' => md5(time()),
                    'is_active' => false
                ));
                $user->setPassword($this->values['password']);
                $user->save();
                sfContext::getInstance()->getUser()->signin($user);
                $this->sendRegistrationEmail($user);
                $this->message = 'Регистрация пройдена. Пожалуйста, активируйте свой аккаунт';
                return true;
                break;
        }
        return false;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
    
    protected function sendRegistrationEmail($user)
    {
        $from = MyConfig::get('administrator_email');
        $to = $user->getEmailAddress();
        $subject = MyConfig::get('registration_email_subject');
        $message = MyConfig::get('registration_email_body');
        $link = 'http://' . sfContext::getInstance()->getRequest()->getHost() . '/auth/activate?code=' . $user->getSalt();
        $message = strtr($message, array(
           '%LINK%' => $link,
            '%link%' => $link
        ));
        $headers = 'From: ' . $from . "\r\n" .
            'Reply-To: ' .$from . "\r\n" .
            'Content-Type: text/html; charset=UTF-8' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();        

        @mail($to, $subject, $message, $headers);        
    }    
    
}
