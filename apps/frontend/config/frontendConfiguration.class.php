<?php

class frontendConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
      sfValidatorBase::setDefaultMessage('required', 'Заполните поле');
      sfValidatorBase::setDefaultMessage('invalid', 'Неверный формат');           
  }
}
