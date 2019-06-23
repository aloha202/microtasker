<?php

/**
 * BlogPost form.
  sfDoctrineFormGenerator *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BlogPostForm extends BaseBlogPostForm {

    public function configure() {
        $this->embedCalendar('date', array(
            'changeMonth' => true,
            'changeYear' => true
        ));

        $this->widgetSchema['brief']->setAttribute('class', 'mceNoEditor');

        unset($this['tags_list']);


        $this->widgetSchema['tags'] = new sfWidgetFormInputText;
        $this->validatorSchema['tags'] = new sfValidatorString(array('required' => false));
        $this->widgetSchema->moveField('tags', sfWidgetFormSchema::AFTER, 'is_published');        
    }
    
    public function updateDefaultsFromObject()
    {
        parent::updateDefaultsFromObject();
        $tags = $this->getObject()->getTags();
        $a_tags =array();
        foreach($tags as $tag){
            $a_tags[] = $tag->getName();
        }
        $this->setDefault('tags', join(', ', $a_tags));
    }
    
    public function doSave($con = null)
    {
        parent::doSave($con);
        
        
        $new_tags = new Doctrine_Collection('BlogTag');
        $tags = explode(',', $this->values['tags']);
        foreach($tags as $tag){
            $tag = trim($tag);
            if($tag){
                $o_tag = Doctrine::getTable('BlogTag')->findOneByName($tag);
                if(!$o_tag){
                    $o_tag = new BlogTag;
                    $o_tag->setName($tag);
                    $o_tag->save();
                }
                $new_tags->add($o_tag);
            }
        }
        $old_tags = $this->getObject()->getTags()->getPrimaryKeys();
        $new_tags = $new_tags->getPrimaryKeys();
        
        $remove_tags = array_diff($old_tags, $new_tags);
        
        $add_tags = array_diff($new_tags, $old_tags);
        
        if(count($remove_tags)){
            $q = Q::c('BlogPost2BlogTag', 'b')
                    ->delete()
                    ->whereIn('b.blog_tag_id', $remove_tags)
                    ->addWhere('b.blog_post_id = ?', $this->getObject()->getId());
            $q->execute();
        }
        
        foreach($add_tags as $id){
            $bt = new BlogPost2BlogTag;
            $bt->fromArray(array(
                'blog_tag_id' => $id,
                'blog_post_id' => $this->getObject()->getId()
            ));
            $bt->save();
        }
        
    }

}
