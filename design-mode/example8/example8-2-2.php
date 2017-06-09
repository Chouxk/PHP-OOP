<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/5/12
 * Time: 16:32
 */

/*
 * 
 * */
abstract class Lesson{
    private  $costStrategy;//费用策略
    private $duration; //时间

    //初始化
    function __construct( $duration,CostStrategy $strategy){
        $this->duration=$duration;
        $this->costStrategy = $strategy;
    }

    function cost(){
        return $this->costStrategy->cost($this);
    }
    function chargeType(){
        return $this->costStrategy->chargeType();
    }
    function getDuration(){
        return $this->duration;
    }

}

/*
 * CostStrategy 抽象类
 * */
abstract class CostStrategy{
    abstract function cost(Lesson $lesson);
    abstract function chargeType();
}

/*
 * Timed 费用计算类
 * */
class TimedCostStrategy extends CostStrategy{
    function cost(Lesson $lesson)
    {
        // TODO: Implement cost() method.
        return (30);
    }
    function chargeType()
    {
        // TODO: Implement chargeType() method.
        return "Hourly rate";
    }
}

/*
 * Fixed 费用计算类
 * */
class FixedCostStrategy extends CostStrategy{
    function cost(Lesson $lesson)
    {
        // TODO: Implement cost() method.
        return ($lesson->getDuration() * 5);
    }

    function  chargeType()
    {
        // TODO: Implement chargeType() method.
        return "Fixed rate";
    }
}

class Lecture extends Lesson{
    //lecture 特定的实现
}

class Seminar extends Lesson{
    //seminar 特定的实现
}
$lesson[] = new Seminar(4,new TimedCostStrategy());
$lesson[] = new Lecture(4,new FixedCostStrategy());

foreach ($lesson as $v){
    print "lesson charge {$v->cost()}<br />";
    print "Charge type: {$v->chargeType()}<br />";
}

