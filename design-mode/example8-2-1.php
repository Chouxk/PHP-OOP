<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/5/12
 * Time: 14:32
 */

/**
 * Class Lesson 大学课程类
 */

abstract class Lesson{
    protected $duration;
    private  $cost_type;
    const FIXED = 1;
    const TIMED = 2;

    function __construct($d,$c=1)
    {
        $this->duration = $d;
        $this->cost_type = $c;
    }

    function cost(){
        switch ($this->cost_type){
            case self::TIMED :
                return(5 * $this->duration);
            break;
            case self::FIXED :
                return 30;
            break;
            default:
                $this->cost_type = self::FIXED;
                return 30;
        }
    }

    function chargeType(){
        switch ($this->cost_type){
            case self::TIMED :
                return 'hourly rate';
            break;
            case self::FIXED :
                return 'Fixed rate';
            break;
            default:
                $this->cost_type = self::FIXED;
                return 'Fixed rate';
        }
    }
}

class lecture extends Lesson {

}
class seminar extends Lesson {

}

$l = new  lecture(5,Lesson::FIXED);
$s = new  seminar(3,Lesson::TIMED);

print "{$l->cost()} ({$l->chargeType()})<br />";

print "{$s->cost()} ({$s->chargeType()})<br />";
