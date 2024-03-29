<?php

/**
 * SocialBridge filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSocialBridgeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'email'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'          => new sfWidgetFormChoice(array('choices' => array('' => '', 'new' => 'new', 'processing' => 'processing', 'closed' => 'closed'))),
      'token'           => new sfWidgetFormFilterInput(),
      'network'         => new sfWidgetFormChoice(array('choices' => array('' => '', 'facebook' => 'facebook', 'vkontakte' => 'vkontakte', 'mailru' => 'mailru', 'google' => 'google', 'yandex' => 'yandex', 'twitter' => 'twitter'))),
      'network_user_id' => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'email'           => new sfValidatorPass(array('required' => false)),
      'status'          => new sfValidatorChoice(array('required' => false, 'choices' => array('new' => 'new', 'processing' => 'processing', 'closed' => 'closed'))),
      'token'           => new sfValidatorPass(array('required' => false)),
      'network'         => new sfValidatorChoice(array('required' => false, 'choices' => array('facebook' => 'facebook', 'vkontakte' => 'vkontakte', 'mailru' => 'mailru', 'google' => 'google', 'yandex' => 'yandex', 'twitter' => 'twitter'))),
      'network_user_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('social_bridge_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'SocialBridge';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'user_id'         => 'ForeignKey',
      'email'           => 'Text',
      'status'          => 'Enum',
      'token'           => 'Text',
      'network'         => 'Enum',
      'network_user_id' => 'Number',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
