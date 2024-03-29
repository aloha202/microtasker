<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TextHelper
 *
 * @author Alaxa
 */
class TextHelper {

    protected static $data = null;

    protected static function getData() {
        if (!self::$data) {
            self::$data = array();
            $q = Doctrine::getTable('TextBlock')
                    ->createQuery('b')
                    ->where('b.application = ?', sfContext::getInstance()->getConfiguration()->getApplication())
                    ->select('b.name, b.text')
                    ->setHydrationMode(Doctrine::HYDRATE_ARRAY)
            ;
            $blocks = $q->execute();
            foreach ($blocks as $name => $block) {
                self::$data[$block['name']] = $block['text'];
            }
        }
        return self::$data;
    }

    protected static function get($key) {
        return isset(self::$data[$key]) ? self::$data[$key] : null;
    }

    public static function getByKey($text, $replacements = array()) {
        self::getData();
        $key = mb_substr($text, 0, 255);
        if (!isset(self::$data[$key])) {
            self::addByKey($key, $text);
        }
        return strtr(self::get($key), $replacements ? : array());
    }

    public static function __($text, $replacements = array(), $compat = null) {
        return self::getByKey($text, $replacements);
    }

    public static function ____($text, $replacements = array()) {
        return self::__(sfInflector::humanize($text), $replacements);
    }

    protected static function addByKey($key, $text) {

        $block = new TextBlock;
        $block->fromArray(array(
            'name' => $key,
            'text' => $text,
            'application' => sfContext::getInstance()->getConfiguration()->getApplication()
        ));
        $block->save();
        self::$data[$key] = $text;
    }

    public static function normalize($value) {
        $value = self::mb_ucfirst($value);
        $value = str_replace('& NBSP;', '&nbsp;', $value);
        $value = str_replace('% ', '%', $value);
        $value = str_replace(' %', '%', $value);
        return $value;
    }

    public static function mb_ucfirst($text) {
        return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1, mb_strlen($text) - 1);
    }

}