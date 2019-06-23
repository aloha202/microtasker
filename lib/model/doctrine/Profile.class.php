<?php

/**
 * Profile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Profile extends BaseProfile
{
    
    public function getName()
    {
        $name = $this->getFirstName();
        if($this->getLastName()){
            $name .= ' ' . $this->getLastName();
        }
        return trim($name);
    }
    
    public function getFullName()
    {
        return $this->getName();
    }
    
    public function fromSocialNetworkData($network, $data)
    {
        switch ($network){
            case 'facebook':
                if(!$this->getImage()){
                    $url = "http://graph.facebook.com/{$data['id']}/picture?type=large";
                    $this->storeImage($url, $data['id']);
                }
                break;
            case 'vkontakte':
                if(!$this->getImage())
                {
                    if(!empty($data['photo_200'])){
                        $this->storeImage($data['photo_200'], $data['id']);
                    }
                }
                break;
            case 'google':
                if(!$this->getImage()){
                    $this->storeImage($data['picture'], $data['id'], true);
                }
                break;
            case 'yandex':
                break;
            case 'mailru':                
                if(!$this->getImage()){
                    if(!empty($data['pic_190'])){
                        $this->storeImage($data['pic_190'], $data['id']);
                    }
                }   
                break;
            case 'twitter':                
                if(!$this->getImage()){
                    if(!empty($data['profile_image_url'])){
                        $this->storeImage($data['profile_image_url'], $data['id']);
                    }
                }   
                break;                
            default: 
                break;
        }
    }
    
    protected function storeImage($url, $filename, $curl = false)
    {
       $types = array('1' => 'gif', '2' => 'jpg', '3' => 'png');
       $type = exif_imagetype($url);
        $ext = '.' . $types[$type];
        $image = $curl ? myCurl::request($url, null, 'GET') : file_get_contents($url);
        $name = $filename . $ext;
        file_put_contents(sfConfig::get('sf_web_dir') . '/uploads/profile/' . $name, $image);
        $this->setImage($name);        
    }
}