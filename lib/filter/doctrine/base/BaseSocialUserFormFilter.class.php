<?php

/**
 * SocialUser filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSocialUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'facebook_user_id'    => new sfWidgetFormFilterInput(),
      'facebook_user_info'  => new sfWidgetFormFilterInput(),
      'vkontakte_user_id'   => new sfWidgetFormFilterInput(),
      'vkontakte_user_info' => new sfWidgetFormFilterInput(),
      'google_user_id'      => new sfWidgetFormFilterInput(),
      'google_user_info'    => new sfWidgetFormFilterInput(),
      'mailru_user_id'      => new sfWidgetFormFilterInput(),
      'mailru_user_info'    => new sfWidgetFormFilterInput(),
      'yandex_user_id'      => new sfWidgetFormFilterInput(),
      'yandex_user_info'    => new sfWidgetFormFilterInput(),
      'twitter_user_id'     => new sfWidgetFormFilterInput(),
      'twitter_user_info'   => new sfWidgetFormFilterInput(),
      'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'email'               => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'facebook_user_id'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'facebook_user_info'  => new sfValidatorPass(array('required' => false)),
      'vkontakte_user_id'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'vkontakte_user_info' => new sfValidatorPass(array('required' => false)),
      'google_user_id'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'google_user_info'    => new sfValidatorPass(array('required' => false)),
      'mailru_user_id'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'mailru_user_info'    => new sfValidatorPass(array('required' => false)),
      'yandex_user_id'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'yandex_user_info'    => new sfValidatorPass(array('required' => false)),
      'twitter_user_id'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'twitter_user_info'   => new sfValidatorPass(array('required' => false)),
      'user_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'email'               => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('social_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'SocialUser';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'facebook_user_id'    => 'Number',
      'facebook_user_info'  => 'Text',
      'vkontakte_user_id'   => 'Number',
      'vkontakte_user_info' => 'Text',
      'google_user_id'      => 'Number',
      'google_user_info'    => 'Text',
      'mailru_user_id'      => 'Number',
      'mailru_user_info'    => 'Text',
      'yandex_user_id'      => 'Number',
      'yandex_user_info'    => 'Text',
      'twitter_user_id'     => 'Number',
      'twitter_user_info'   => 'Text',
      'user_id'             => 'ForeignKey',
      'email'               => 'Text',
    );
  }
}
