<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/5/16
 * Time: 10:08
 */

/*
 * 单元基类
 * */
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

/*
 * 射手
 * */
class Archer extends Unit{
    function bombardStrength(){
        return 4;
    }
}
/*
 * 激光炮
 * */
class laser extends Unit{
    function bombardStrength(){
        return 40;
    }
}

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
//$t->removeUnit(new laser());
//$t->removeUnit(new Archer());
print  $t->bombardStrength();

/*
 * 匿名回调函数
 * */
class test {
    public $v;
    function __construct($a,$b)
    {
        $this->v=(function($a,$b){ return ($a === $b)?0:1;});
    }

    public function getV()
    {
        return $this->v;
    }
}

//$n = new test(1,2);
//print_r(get_object_vars($n->getV()))    ;
