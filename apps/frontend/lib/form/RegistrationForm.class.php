<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistrationForm
 *
 * @author Алекс
 */
class RegistrationForm extends ProfileForm {

	public function configure() {
		parent::configure();

		$this->widgetSchema['password'] = new sfWidgetFormInputPassword();
		$this->validatorSchema['password'] = new sfValidatorString();
		$this->widgetSchema['password_again'] = new sfWidgetFormInputPassword();
		$this->validatorSchema['password_again'] = clone $this->validatorSchema['password'];

		$this->widgetSchema->setLabel('password_again', 'Повторите пароль');

		$this->widgetSchema['agree'] = new sfWidgetFormInputCheckbox(array(), array(
				));
		$this->validatorSchema['agree'] = new sfValidatorBoolean(array(), array(
					'required' => _cnf::__('Вы должны принять условия пользовательского соглашения')
				));
		$this->widgetSchema->setLabel('agree', 'Я принимаю условия');

		$this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'Пароли не совпадают')));
		$this->embedCaptcha('Введите код с картинки');		
		
		$fields = array('email', 'password', 'password_again', 'captcha', 'agree');
		
		$this->useFields($fields);
		foreach ($fields as $field) {
			$this->setRequired($field);
		}
		$this->widgetSchema->setFormFormatterName('Bootstrap2');
	}

	public function updateDefaultsFromObject() {
		parent::updateDefaultsFromObject();
		$this->setDefault('agree', true);
	}

	public function doSave($conn = null) {


		$user = new sfGuardUser();
		$user->fromArray(array(
			'email_address' => $this->values['email'],
			'username' => $this->values['email'],
			'salt' => md5(time()),
			'is_active' => false
		));
		$user->setPassword($this->values['password']);
		if(!sfConfig::get('app_auth_activation_required', true)){
			$user->is_active = true;
		}
		$user->save();

		$this->getObject()->setUserId($user->getId());
		parent::doSave($conn);

		SiteEvent::fire('registration', $this->getObject(), array(
			'link' => '<a href="http://' . sfContext::getInstance()->getRequest()->getHost() . '/auth/activate?code=' . $user->getSalt() . '">' . T::__('ссылке') . '</a>'
		));

		if (sfConfig::get('app_auth_registration_signin', false)){
			$this->getUser()->signIn($user);
		}
	}

}
