<?php

/**
 * sfGuardUserTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class sfGuardUserTable extends PluginsfGuardUserTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object sfGuardUserTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfGuardUser');
    }
    
    
    public static function createUserFromObject($object)
    {
        
        $email = ProjectHelper::getEmailFromObject($object);
        if(!$email){
            $message = "Could not retrieve email address from object #{$object->getId()} of class " . get_class($object);
            AppError::fire($message);
            throw new Exception($message);
        }
        
        $user = Q::c('sfGuardUser', 'u')
                ->where('u.email_address = ?', $email)
                ->fetchOne()
                ;
        if($user){
            throw new Exception("User with email address $email already exists");
        }
        $user = new sfGuardUser;
        $password = self::generatePassword();
        $salt = sha1(time());
        $user->fromArray(array(
           'email_address' => $email,
            'username' => $email,
            'salt' => $salt,
            'password' => $password,
            'is_active' => true,
            'is_super_admin' => false
        ));
        $user->save();
        try{
            $name = $object->getName();
            $user->getProfile()->setName($name);
            $user->getProfile()->setEmail($email);
        }catch(Exception $e){}
        $user->getProfile()->save();
        $user->setGeneratedPassword($password);
        return $user;
    }
    
    public static function generatePassword($len = 5)
    {
        return substr(str_shuffle(strtolower(sha1(rand() . time() . "my salt string"))),0, $len);
    }
}