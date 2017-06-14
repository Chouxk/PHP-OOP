<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/5/16
 * Time: 10:08
 */

/*
 * 探知 - 组合模式2
 * */

/**
 * Class Unit
 * 单元 抽象基类
 * 公共方法
 */
abstract class Unit{
     function addUnit(Unit $unit){
        throw new UnitException(get_class($this).'is a leaf');
    }
     function removeUnit(Unit $unit){
        throw new UnitException(get_class($this).'is a leaf');
    }
    abstract function bombardStrength();
}

class UnitException extends Exception {}

/**
 * Class Archer
 * 弓箭手
 */
class Archer extends Unit{
    function bombardStrength(){
        return 4;
    }
}

/**
 * Class laser
 * 激光炮
 */
class laser extends Unit{
    function bombardStrength(){
        return 40;
    }
}

/**
 * Class Army
 * 陆军
 */
class Army extends Unit{
    private $units = array();

    function addUnit(Unit $unit){
        //in_array(search,array,type) 函数搜索数组中是否存在指定的值
        // 如果设置该参数为 true，则检查搜索的数据与数组的值的类型是否相同。
        if (in_array($unit,$this->units,true)){
            return;
        }
        //不存在则添加
        $this->units[] = $unit;
    }
    function removeUnit(Unit $unit){
        //array_udiff(array1,array2,array3...,myfunction)
        //比较两个数组的键值（使用用户自定义函数比较键值），并返回差集;
        $this->units = array_udiff
        (
            $this->units,array($unit),
            function($a,$b){ return ($a === $b)?0:1;}
        );
    }

    /*
     * 总攻击力度
     * */
    function bombardStrength(){
        $ret = 0;
        foreach ($this->units as $unit){
//            var_dump($this->units);die;
            $ret += $unit->bombardStrength();
        }
        return $ret;
    }

}
$t = new Army();
$t->addUnit(new Archer());
$t->addUnit(new laser());

$s = new Army();
$s->addUnit(new Archer());
$s->addUnit(new Archer());
$s->addUnit(new Archer());

$t->addUnit($s);

//所有攻击强度计算
print "{$t->bombardStrength()}\n";

/**
 * Class test
 * 匿名回调函数
 */
class test {
    public $v;
    function __construct($a,$b)
    {
        $this->v = (
        function($a,$b)
            {
                return ($a === $b)?0:1;
            }
        );
    }

    public function getV()
    {
        return $this->v;
    }
}

//array get_object_vars ( object $obj )
//返回由 obj 指定的对象中定义的属性组成的关联数组。

//$n = new test(1,2);
//var_dump(get_object_vars($n->getV()));
//