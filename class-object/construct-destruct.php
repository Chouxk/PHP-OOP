<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/6/2
 * Time: 9:14
 */
/*
 * __construct 构造函数
 * __destruct  析构函数
 * */
class Person{
    protected $name;
    protected $sex;
    protected $age;

    //如果子类中定义了构造函数则不会隐式调用其父类的构造函数。要执行父类的构造函数，需要在子类的构造函数中调用 parent::__construct()。
    //如果子类没有定义构造函数则会如同一个普通的类方法一样从父类继承（假如没有被定义为 private 的话）。
    //自 PHP 5.3.3 起，在命名空间中，与类名同名的方法不再作为构造函数。这一改变不影响不在命名空间中的类。
    function __construct($name,$sex,$age)
    {
        $this->age=$age;
        $this->sex=$sex;
        $this->name=$name;
    }
    function say(){
        echo "我的名子叫：" . $this->name . " 性别：" . $this->sex . " 我的年龄是：" . $this->age.'<br>';
    }

    //析构函数会在到某个对象的所有引用都被删除或者当对象被显式销毁时执行
    //此外也和构造函数一样，子类如果自己没有定义析构函数则会继承父类的。
    //析构函数即使在使用 exit() 终止脚本运行时也会被调用。在析构函数中调用 exit() 将会中止其余关闭操作的运行。
    function __destruct()
    {
        echo '再见，'.$this->name.'<br>';
    }
}
//由于类实例是以堆栈的形式放在内存中，所以最后调用 析构函数 的时候，输出顺序是按 后进先出 的原则！
$p1 = new Person('张三','男','20');
$p2 = new Person('李四','男','22');
$p3 = new Person('王五','男','25');
$p1->say();
$p2->say();
$p3->say();

class ITPerson extends Person{

    public $names;

    function __construct($names)
    {
        $this->names=$names;
    }

    function write(){
        echo "我的名子叫：" . $this->names . '，我是一名程序猿，我正在敲代码'.'<br>';
    }
    function __destruct()
    {
        echo '再见，程序员-'.$this->names.'<br>';
        //和构造函数一样，父类的析构函数不会被引擎暗中调用。要执行父类的析构函数，必须在子类的析构函数体中显式调用 parent::__destruct()。
        //初始化子类的构造函数，所有调用父类的析构函数，结果没有参数。
        parent::__destruct();
    }
}

$coder = new ITPerson('小六');
$coder->write();