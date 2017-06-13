<?php
/**
 * Created by PhpStorm.
 * User: M
 */

/*
 * 抽象工厂模式
 * */
require_once 'case9-3-2.php';
abstract class CommsManager{
    abstract function getHeaderText();
    abstract function getApptEncoder();
    abstract function getContactEncoder();
    abstract function getTtdEncoder();
    abstract function getFooterText();
}
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