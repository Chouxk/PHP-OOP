<?php
/**
 * Created by PhpStorm.
 * User: M
 */

abstract class ApptEncoder{
    abstract function encode();
}

class BloggsApptEncoder extends ApptEncoder{
    function encode()
    {
        // TODO: Implement encode() method.
        return 'in blog'.'<br/>';
    }
}
class MegaApptEncoder extends ApptEncoder{
    function encode()
    {
        // TODO: Implement encode() method.
        return 'in mega'.'<br/>';
    }
}



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
}

/*$comm = new CommsManager(CommsManager::BLOGGS);
$t=$comm->getApptEncoder();
print $t->encode();*/