<?php
/**
 * Created by PhpStorm.
 * User: M
 */

/*
 * 抽象工厂模
 * */

abstract class ApptEncoder
{
    abstract function encoder();
}
abstract class TtdEncoder
{
    abstract function encoder();
}
abstract class ContactEncoder
{
    abstract function encoder();
}

class BloggsApptEncoder extends ApptEncoder{
    function encoder(){
        return 'encode in BlogAppt'.'<br>';
    }
}

class BloggsTtdEncoder extends TtdEncoder{
    function encoder(){
        return 'encoder in BlogTtd';
    }
}

class BloggsContacEncoder extends ContactEncoder{
    function encoder(){
        return 'encoder in BloggsContac';
    }
}

/*abstract class CommsManager
{
    abstract function getHeaderText();
    abstract function getApptEncoder();
    abstract function getFooterText();
}

class BloggCommsMAnager extends CommsManager
{
    function getHeaderText(){
        return 'BloggsCal header';
    }
    function getApptEncoder(){
        return new BloggsApptEncoder();
    }
    function getFooterText(){
        return 'BloggsCal footer';
    }
}*/
