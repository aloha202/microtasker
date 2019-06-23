<?php

/**
 * Profile form.
  sfDoctrineFormGenerator *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileForm extends BaseProfileForm {

    public function configure() {
        $this->widgetSchema->setFormFormatterName('Bootstrap2');

        $this->validatorSchema->setPostValidator(
                new sfValidatorDoctrineUnique(array('model' => 'Profile', 'column' => array('email')), array(
                    'invalid' => 'Такой email уже зарегистрирован в ситеме'
                ))
        );
        
        
        $this->embedCalendar('dob', array(
                    'changeYear' => true,
                    'changeMonth' => true
            ));

        
        unset($this['image'], $this['user_id'], 
                $this['gmaps']);
        
        $this->validatorSchema['email'] = new sfValidatorEmail(array(
        ));
        
        $this->widgetSchema->setLabels(array(
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'city' => 'Город',
            'phone' => "Телефон мобильный\n(для получения уведомлений)",
            'dob' => "Дата рождения\n(дд.мм.гггг)"
        ));
    }
    
    public function updateDefaultsFromObject() {
        parent::updateDefaultsFromObject();
      
        /*
        if($this->getObject()->getDob())
        {
            $this->setDefault('dob', date('d.m.Y', strtotime($this->getObject()->getDob())));
        }
         * 
         */
    }    

}
