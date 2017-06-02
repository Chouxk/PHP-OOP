<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/6/2
 * Time: 15:00
 */

class testclass
{
    public $str_data;
    public $obj_data;

    //解决方法
    public function __clone()
    {
        $this->obj_data=clone $this->obj_data;
    }
}
$dateTimeObj = new DateTime("2014-07-05", new DateTimeZone("UTC"));

$obj1 = new testclass();
$obj1->str_data='aaa';
$obj1->obj_data=$dateTimeObj;

$obj2=clone $obj1;

//var_dump($obj1);
//var_dump($obj2);

$obj2->str_data='bbb';
$obj2->obj_data->add(new DateInterval('P10D'));//给$obj2->obj_date 的时间增加了10天

//结束obj1的时间也增加了10天。
var_dump($obj1);
var_dump($obj2);
var_dump($dateTimeObj);

//当对象被复制后，PHP 5 会对对象的所有属性执行一个浅复制（shallow copy）。所有的引用属性 仍然会是一个指向原来的变量的引用。

//解决方法：
//使用__clone方法,复制对象，把浅复制转换为深复制

/*
 * 测试2
 * */
class person
{
    private $name;
    private $age;
    private $id;
    public $account;

    function __construct($name,$age,Account $account)
    {
        $this->age=$age;
        $this->name=$name;
        $this->account=$account;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function __clone()
    {
        $this->id = 0;
        $this->account=clone $this->account;//解决方法
    }
}

class Account
{
    public $balance;
    function __construct($balance)
    {
        $this->balance = $balance;
    }
}

$person = new person('joc','20',new Account('200'));
$person->setId(333);
$person2=clone $person;

//给person充一些钱
$person->account->balance +=10;
//结果$person2也得到了这些钱，这不合理
print $person2->account->balance.'<br>';
print $person->account->balance;

/*
 * $person 对象保存了一个指向Account对象的引用。
 * 当创建$person2新对象时，新对象的所保存的引用指向$person所应用的同一个Account对象.
 * so,$person对象属性加钱，$person2也属性也加钱。
 * */

//解决方法：__clone方法中复制指向的对象
// $this->account=clone $this->account;


