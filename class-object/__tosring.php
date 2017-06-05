<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/6/5
 * Time: 15:00
 */

/**
 * Class Person
 * 当对象传递给print或者echo时，自动调用__toString()方法
 *此方法必须返回一个字符串，否则将发出一条 E_RECOVERABLE_ERROR 级别的致命错误。
 */
class Person
{
    function getName(){ return 'github'; }
    function getAge(){ return '2008/04'; }
    function __toString()
    {
        // TODO: Implement __toString() method.
        $desc = $this->getName();
        $desc .="(age ".$this->getAge().")";
        return $desc;
    }
}

$person = new Person();
print $person;