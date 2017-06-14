<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/5/16
 * Time: 11:21
 */

abstract class Unit{
    function getComposite(){
        return null;
    }
    abstract function bombardStrength();
}

class Archer extends Unit{
    function bombardStrength(){
        return 5;
    }
}

class Laser extends Unit{
    function bombardStrength(){
        return 40;
    }
}

abstract class Composite extends Unit{
    private $units = array();

    function getComposite(){
        return $this;
    }

    protected function get_units(){
        return $this->units;
    }

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

}

class Army extends Composite{

    function bombardStrength(){
        $ret = 0;
        foreach ($this->get_units() as $unit){
//            var_dump($this->units);die;
            $ret += $unit->bombardStrength();
        }
        return $ret;
    }
}

