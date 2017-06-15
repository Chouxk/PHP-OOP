<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/6/15
 * Time: 17:21
 */

/*
 * 探知 - 外观模式
 * 外观模式可以为一个分层或一个子类系统提供一个简洁的入口。
 * 也可以用于封装过程式代码的对象封装器。
 * */
require_once 'case10-4-1.php';

class ProductFacade
{
    private $Products = array();
    function __construct( $file )
    {
        $this->file = $file;
        $this->compile();
    }

    private function compile()
    {
        $lines = getProductFileLines( $this->file );
        foreach ($lines as $line) {
            $id = getIDFromLine($line);
            $name = getNameFromLine($line);
            $this->Products[$id] = getProductObjectFromId( $id,$name );
        }
    }

    function getProducts() {
        return $this->Products;
    }

    function getProduct( $id )
    {
        return $this->Products[$id];
    }

}

/*$facade = new ProductFacade( 'text.txt' );
$facade->getProduct( 234 );*/