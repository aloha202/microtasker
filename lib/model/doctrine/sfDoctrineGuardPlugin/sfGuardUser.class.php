<?php

/**
 * sfGuardUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class sfGuardUser extends PluginsfGuardUser
{
    protected $generated_password = '';
    public function setGeneratedPassword($password)
    {
        $this->generated_password = $password;
    }
    
    public function getGeneratedPassword()
    {
        return $this->generated_password;
    }
    
    public function getReplacements()
    {
        return array("%password%" => $this->getGeneratedPassword(), "%name%" => $this->getName());
    }
    
    public function getName()
    {
        return $this->getProfile()->getName();
    }
    
    public function getFullName()
    {
        return $this->getName();
    }
    
    public function __toString()
    {
        if($this->getName())
        {
            return $this->getName();
        }
        return parent::__toString();
    }
}