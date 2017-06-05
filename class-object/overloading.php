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

//method_exists ( mixed $object , string $method_name ) — Checks if the class method exists
//确认$object类中是否存在$method_name的方法。如果存在返回TRUE;如果不存在返回FALSE.

//煎蛋示例1
class Person
{
    private $_name;
    private $_age;

    function __get($property)
    {
        $method = "get{$property}";//获得方法名
        //echo $method.'<br />';
        //判断person类中是否存在$method方法，存在则调用该方法
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    //获取name值
    function getName()
    {
        return 'bob';
    }

    //获取age值
    function getAge()
    {
        return 44;
    }

    function __set($property, $value)
    {
        $method = "set{$property}";
        if(method_exists($this,$method)){
            //设置方法值
            echo "__set()方法设置属性值，$value<br />";
            return $this->$method($value);
        }
    }

    //设置name的值
    function setName($name)
    {
        $this->_name = $name;
        if(!$name===null){
            $this->_name = strtoupper($this->_name);
        }
    }

    //设置
    function setAge($age)
    {
        $this->_age=strtoupper($age);
    }

    function get_name(){
        return $this->_name;
    }

    function __isset($property)
    {
        $method = "get{$property}";
        echo 'isset()或empty()测定私有成员时，自动调用<br />';
        return ( method_exists($this,$method) );
    }

    function __unset($property)
    {
        $method = "set{$property}";
        if( method_exists($this,$method)){
            return $this->$method(null);
        }
    }

}
$p = new Person();

//$t = method_exists($p,'__isset');
//var_dump($t);

//获取属性$name
print $p->name.'<br />';
print $p->age.'<br />';

//检测是否存在age私有成员
var_dump(isset($p->age));

//$_name属性的值变成tom
$p->name='tom';
print $p->get_name();

//unset
unset($p->name);
var_dump($p->get_name());

//--------------------------------------------华丽丽的分割线-------------------------------------------------------

/*
 * 作家类
 * */
class PersonWriter
{
    function writeName( Persons $p)
    {
        print $p->getName().'<br />';
    }

    function writeAge(Persons $p)
    {
        print $p->getAge().'<br />';
    }
}

/*
 *人类
 * */
class Persons
{
    private $writer;
    function __construct(PersonWriter $writer)
    {
        $this->writer=$writer;
    }

    function __call($method_name, $args)
    {
        if(method_exists($this->writer,$method_name)){
            return $this->writer->$method_name($this);
        }
    }

    function getName()
    {
        return 'David';
    }

    function getAge()
    {
        return 20;
    }

    function get_writer()
    {
        return $this->writer;
    }

    //__call()方法会被调用，然后会在PersonWriter对象中查找writeName（）方法，并调用之。不需要手动调用如下委托方法。
    /*function writeName()
    {
        $this->writer->writeName($this);
    }*/
}

$ps = new Persons(new PersonWriter());
$ps->writeName();
$ps->writeAge();
$ps->name();