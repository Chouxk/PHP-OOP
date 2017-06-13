<?php
/**
 * Created by PhpStorm.
 * User: M
 */

require_once 'case9-3-2.php';
class settings{
    static $COMMSTYPE = 'blog';
}

class config{
    private static $in;
    private $commsManager;
    private function __construct(){
        $this->init();
    }

    private function init(){
        switch (settings::$COMMSTYPE){
            case 'Mega':
                $this->commsManager = new MegaApptEncoder();
                break;
            case 'blog':
                $this->commsManager = new BloggsApptEncoder();
                break;
        }
    }

    public static function getIn(){
        if(empty(self::$in)){
             return self::$in = new self();
        }
    }

    public function getCommsManager()
    {
        return $this->commsManager;
    }
}

$n = config::getIn();
var_dump($n);



