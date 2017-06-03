<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/6/3
 * Time: 16:54
 */

/*
PHP内置拦截器（interceptor）方法,也称为重载（overloading）
拦截器方法
__get($property)            访问未定义的属性时被调用
__set($property,$value)     给未定义的属性赋值时被调用
__isset($property)          对未定义的属性调用isset()时被调用
__unset($property)          对未定义的属性调用unset()时被调用
__call($property)           调用未定义的方法时被调用

__get()和__set()方法用于处理类(或其父类)中为定义的属性
*/

//煎蛋示例1
class Person
{
    function __get($property)
    {
        $method = "get{$property}";
        echo $method.'<br />';
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    function getName(){
        return 'bob';
    }

    function getAge(){
        return 44;
    }
}
$p = new Person();
print  $p->name;
