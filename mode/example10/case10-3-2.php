<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/6/14
 * Time: 15:47
 */

/*
 * 探知 - 装饰模式2
 * */

//抽象基类
abstract class Tile
{
    abstract function getWealthFactor();
}

//具体组件
class Plains extends Tile
{
    private $wealthFactor = 2;

    public function getWealthFactor()
    {
        return $this->wealthFactor;
    }
}

//定义Tile对象为参数的构造方法，传入的对象保存在$tile属性中
abstract class TileDecorator extends Tile
{
    protected $tile;
    //初始化，Plains对象，获得财富系数2
    function __construct(Tile $tile)
    {
        $this->tile = $tile;
    }
}

/**
 * Class DiamondDecorator
 * Class PollutionDecorator
 * 装饰类
 * 重新定义Pollution和Diamond类
 */
class DiamondDecorator extends TileDecorator
{
    function getWealthFactor()
    {
        // TODO: Implement getWealthFactor() method.
        return $this->tile->getWealthFactor()+2;
    }
}

class PollutionDecorator extends TileDecorator
{
    function getWealthFactor()
    {
        // TODO: Implement getWealthFactor() method.
        return $this->tile->getWealthFactor()-4;
    }
}

//这2个类继承与TilDecorator,指向Tile对象的引用.当getWealthFactor方法被调用，
//这些类会先调用引用的Tile对象的geWealthFactor方法，然后执行自己特有的操作。

$tile = new Plains();
echo $tile->getWealthFactor()."<br />";//2
$Plains = new DiamondDecorator( new Plains());
//var_dump($Plains);
print $Plains->getWealthFactor()."<br />";//4

$t = new PollutionDecorator( new DiamondDecorator( new Plains()));
print $t->getWealthFactor();// 0
//PollutionDecorator引用DiamondDecorator对象，而DiamondDecorator对象又拥有对Plains对象的引用。

/*
 总结：优点
 1、扩展性，轻松添加新的装饰或者新的组件
 * */


