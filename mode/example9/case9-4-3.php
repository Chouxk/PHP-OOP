<?php
/**
 * Created by PhpStorm.
 * User: M
 */

/*
 * 给每个工厂独立方法
 * */
require_once 'case9-3-2.php';
abstract class CommManager
{
    const APPT = 1;
    const TTD = 2;
    const CONTACT = 3;
    abstract function getHt();
    abstract function make($flag_int);
    abstract function getFooterText();
}

class BloggsCommsManager extends CommManager{
    function getHt(){
        return 'get ht';
    }
    function make($flag_int){
        switch ($flag_int){
            case ($flag_int):
                return new BloggsApptEncoder();
            case self::APPT:
                return new BloggsContacEncoder();
            case self::TTD:
                return new BloggsTtdEncoder();
        }

    }
    function getFooterText(){
        return 'footer';
    }
}

$n = new  BloggsCommsManager();
$n->make('1');
echo $n->getFooterText();