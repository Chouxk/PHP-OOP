<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/5/15
 * Time: 16:31
 */

/*组合模式*/
/*
 *单元
 * */
abstract class Unit{
    abstract function bombardStrength();
}

class Archer extends Unit{
    function bombardStrength()
    {
        // TODO: Implement bombardStrength() method.
        return 4;
    }
}

class laser extends Unit{
    function bombardStrength()
    {
        // TODO: Implement bombardStrength() method.
        return 40;
    }
}

/*
 * 军队
 * */
class Army{
    private $units = array();
//    private $armies = array();

    function addUnit(Unit $unit){
        array_push($this->units,$unit); //在第一个参数后，添加$unit;
    }

    public function getUnits()
    {
        return $this->units;
    }

    /*function addArmy(Army $army){
        array_push($this->armies,$army);
    }*/

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
$n->addUnit(new Archer(1));
$n->addUnit(new laser(1));
$n->addUnit(new laser(1));
var_dump($n->getUnits());
echo $n->bombardStrength();
