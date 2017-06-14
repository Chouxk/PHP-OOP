<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/6/14
 * Time: 15:13
 */

/*
 * 探知 - 装饰模式1
 * */

//定义Tile(区域)类及子类
abstract class Tile
{
    abstract function getWealthFactor();
}

class Plains extends Tile
{
    //财富系数2
    private $WealthFactor = 2;

    public function getWealthFactor()
    {
        return $this->WealthFactor;
    }
}

//钻石分布
class DiamondPlains extends  Plains
{
    function getWealthFactor()
    {
        return parent::getWealthFactor()+2;
    }
}

//污染造成
class PollutePlains extends Plains
{
    function getWealthFactor()
    {
        return parent::getWealthFactor()-4;
    }
}

/*
 * 如上：
1、结构不够灵活，我们能获得钻石类，但是不能获得钻石和污染类，除非再创建一个类。
2、功能定义完全依赖于继承体系，导致类的数量过多，代码重复。
*/


