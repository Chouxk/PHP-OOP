<?php
/**
 * Created by PhpStorm.
 * User: M
 */

/*
 * 探知-原型模式
 * */

//海洋
class sea{
    private $nt = 1;
    function __construct($nt)
    {
        echo 'sea nt:'.$this->nt=$nt;
    }
}
class earthSea extends sea{}
class marsSea extends sea{}

//平原
class plains{}
class earthPlains extends plains{}
class marsPlains extends plains{}

//森林
class forest{}
class earthForest extends forest{}
class marsForest extends forest{}

class WM{
    private $sea;
    private $forest;
    private $plains;
    function __construct(sea $sea,plains $plains,forest $forest)
    {
        $this->sea = $sea;
        $this->plains = $plains;
        $this->forest = $forest;
    }
    function getSea(){
        return clone $this->sea;
    }
    function getForest(){
        return clone $this->forest;
    }
    function getPlains(){
        return clone $this->plains;
    }
}
$factory = new WM(
    new earthSea('1'),
    new earthPlains(),
    new earthForest()
);
$factory->getSea();