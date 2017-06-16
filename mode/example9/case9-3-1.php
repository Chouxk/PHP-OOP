<?php
/**
 * Created by PhpStorm.
 * User: M
 */

/*
 * 探知 - 工厂方法模式
 * */

/**
 * Class ApptEncoder
 * 产品
 */
abstract class ApptEncoder{
    abstract function encode();
}

class BloggsApptEncoder extends ApptEncoder{
    function encode()
    {
        return 'Appoinment data encoded in BloggsCal format'.'<br/>';
    }
}

class MegaApptEncoder extends ApptEncoder{
    function encode()
    {
        return 'Appoinment data encoded in MegaCal format'.'<br/>';
    }
}


/**
 * Class CommsManager
 * 创建者
 */
class CommsManager
{
    const BLOGGS = 1;
    const MAGA = 2;
    private $mode = 1;
    function __construct($mode){
        $this->mode = $mode;
    }

    function getApptEncoder(){
        switch ($this->mode){
            case (self::MAGA):
                return new MegaApptEncoder();
            default:
                return new BloggsApptEncoder();
        }
    }
    function getHeaderText(){
        switch ($this->mode){
            case (self::MAGA):
                return new MegaApptEncoder();
            default:
                return new BloggsApptEncoder();
        }
    }

    //当需求改变，需要添加getFooterText()，新方法，工作量就会更加大。
}

$comm = new CommsManager(CommsManager::BLOGGS);
$t=$comm->getApptEncoder();
print $t->encode();