<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/6/15
 * Time: 17:48
 */

/*
 * 探知 - 单例模式
 * */
class preferences
{
    //私有
    private $props = array();
    private static $instance;

    private function __construct(){}

    public static function getInstance()
    {
        if( empty(self::$instance)){
            self::$instance = new preferences();
        }
        return self::$instance;
    }

    public function setProps($key,$val)
    {
        $this->props[$key] = $val;
    }

    public function getProps($key)
    {
        return $this->props[$key];
    }
}
$pref = preferences::getInstance();
$pref->setProps('name','张三');

unset($pref);//删除引用

$pref2 = preferences::getInstance();
print $pref2->getProps('name').'<br />'; //属性值并没有丢失



/*
 * 简单单例设计模式
 * */
class A{
    private static $link = null;

    private function __construct() {
    }
    static function getClassA() {
        if (null == self::$link) {
            self::$link = new A();
        }
        return self::$link;
    }
}

class B{
    //handle、、处理、操作
    private static $handle;
    private  function __construct(){
    }
    public function Instance(){ //instance 实例、情况
        if(empty(self::$handle)){
            self::$handle = new B();
        }
        return self::$handle;
    }
}
