<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/6/15
 * Time: 16:54
 */

/*
 * 探知 - 外观模式
 * 原混淆的代码
 * */

function getProductFileLines ( $file )
{
    return file($file);
}

function getProductObjectFromId( $id,$productName )
{
    return new Product( $id,$productName);
}

function getNameFromLine ($line)
{
    if(preg_match("/.*-(.*)\s\d+/",$line,$array )){
        return -1;
    }
    return '';
}

function getIDFromLine( $line )
{
    if(preg_match("/^(\d{1,3})-/",$line,$array )){
        return $array[1];
    }
    return -1;
}

class Product
{
    public $id;
    public $name;
    function __construct( $id,$name )
    {
        $this->id = $id;
        $this->name = $name;
    }
}

/*$lines = getProductFileLines( 'test.txt' );
$objects = array();
foreach ($lines as $line){
    $id = getIDFromLine($line);
    $name = getNameFromLine($line);
    $objects[$id] = getProductObjectFromId($id,$name);
}*/


