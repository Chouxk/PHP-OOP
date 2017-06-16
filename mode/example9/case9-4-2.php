<?php
/**
 * Created by PhpStorm.
 * User: M
 */

/*
 * 探知 - 抽象工厂模式
 * */

abstract class ApptEncoder
{
    abstract function encoder();
}
abstract class TtdEncoder
{
    abstract function encoder();
}
abstract class ContactEncoder
{
    abstract function encoder();
}

/**
 * Class BloggsApptEncoder
 * Class BloggsTtdEncoder
 * Class BloggsContacEncoder
 * 产品1,2,3
 */
class BloggsApptEncoder extends ApptEncoder{
    function encoder(){
        return 'encode in BlogAppt'.'<br>';
    }
}

class BloggsTtdEncoder extends TtdEncoder{
    function encoder(){
        return 'encoder in BlogTtd';
    }
}

class BloggsContacEncoder extends ContactEncoder{
    function encoder(){
        return 'encoder in BloggsContac';
    }
}

abstract class CommsManager{
    abstract function getHeaderText();
    abstract function getApptEncoder();
    abstract function getContactEncoder();
    abstract function getTtdEncoder();
    abstract function getFooterText();
}

/**
 * Class BloggsCommsManager
 * BloogsCal风格创建者
 */
class BloggsCommsManager extends CommsManager{
    function getHeaderText(){
        return 'get HeaderText';
    }
    function getApptEncoder(){
        return new BloggsApptEncoder();
    }
    function getTtdEncoder(){
        return new BloggsTtdEncoder();
    }
    function getContactEncoder(){
        return new BloggsContacEncoder();
    }
    function getFooterText(){
        return 'get FooterText';
    }
}

$n = new BloggsCommsManager();
$t = $n->getApptEncoder();
echo $t->encoder();