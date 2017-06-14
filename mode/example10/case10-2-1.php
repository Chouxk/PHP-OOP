<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/5/15
 * Time: 16:31
 */

/*
 * 探知 - 组合模式1
 * 实例-煎蛋“文明”游戏集成基础设计
 * */

/**
 * Class Unit
 * 抽象基类 单元
 */
abstract class Unit{
    abstract function bombardStrength();
}

/**
 * Class Archer
 * 弓箭手类
 * bombardStrength 攻击强度
 * return 4
 */
class Archer extends Unit{
    function bombardStrength()
    {
        // TODO: Implement bombardStrength() method.
        return 4;
    }
}

/**
 * Class LaserCannonUnit
 * 激光炮
 * bombardStrength 40
 */
class LaserCannonUnit extends Unit{
    function bombardStrength()
    {
        // TODO: Implement bombardStrength() method.
        return 40;
    }
}

/**
 * Class Army
 * 陆军
 */

class Army{
    private $units = array();

    function addUnit(Unit $army){
        //在$units数组尾部插入$army;
        array_push($this->units,$army);
    }

    public function getUnits()
    {
        return $this->units;
    }

    /*function addArmy(Army $army){
        array_push($this->armies,$army);
    }*/

    /**
     * @return int
     * 计算军队攻击强度
     */
    function bombardStrength(){
        $ret = 0;
        foreach ($this->units as $unit){
            $ret += $unit->bombardStrength();
        }

        /*foreach ($this->armies as $army){
            $ret += $army->bombardStrength();
        }*/

        return $ret;
    }
}

$n = new Army();
//添加单位
$n->addUnit(new Archer());
$n->addUnit(new LaserCannonUnit());
$n->addUnit(new LaserCannonUnit());

//var_dump($n->getUnits());
echo $n->bombardStrength();
