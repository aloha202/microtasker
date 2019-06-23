<?php

/**
 * ForgotPassword form.
 sfDoctrineFormGenerator *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ForgotPasswordForm extends BaseForgotPasswordForm
{
  protected $user = null;
  public function configure()
  {
      $this->useFields(array(
         'email' 
      ));
      $this->widgetSchema->setLabel('email', 'Ваш email'); 
      
      $this->validatorSchema['email'] = new sfValidatorEmail;
      
      $this->mergePostValidator(new sfValidatorCallback(array(
          'callback' => array($this, 'validateEmail')
      )));
      $this->widgetSchema->setFormFormatterName('bootstrap');
  }
  
  public function validateEmail($validator, $values)
  {
      if(!$values['email']){
          return $values;
      }
      $user = Doctrine::getTable('sfGuardUser')->findOneByEmailAddress($values['email']);
      if(!$user){
          throw new sfValidatorError($validator, 'Такой email не зарегистрирован в системе');
      }
      
      $this->user = $user;
      return $values;
  }
  
  public function updateObject($values = null)
  {
      $object = parent::updateObject($values);
      $object->setUserId($this->user->getId());
      $object->setHash(md5(time()));
      return $object;
  }
  
  public function doSave($conn = null)
  {
      parent::doSave($conn);
      
        $server = $_SERVER['SERVER_NAME'];
        $forgot = $this->getObject();
        $link = "<a href='http://$server/auth/recover?hash={$forgot->getHash()}'>" . T::__('ссылке') . "</a>";
        SiteEvent::fire('password_recovery', $forgot, array(
            'link' => $link,
            'LINK' => $link,
            'username' => $forgot->getUser(),
            'full_name' => $forgot->getUser()
        )); 
  }
}
