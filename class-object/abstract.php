<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/5/10
 * Time: 8:51
 */

/*abstract 抽象类
可以使用abstract来修饰一个类。
用abstract修饰的类表示这个类是一个抽象类。
抽象类不能被实例化。
这是一个简单抽象的方法，如果它被直接实例化，系统会报错。*/

//定义一个抽象类
abstract class User
{
    public function __toString() {
        //返回对象实例 obj 所属类的名字。如果 obj 不是一个对象则返回 FALSE。
        return get_class($this);
    }
}
//实例化这个类会出现错误
//echo new User();

class womanUser extends User{

}
//继承自 User类，就可以被实例化了。
//$a = new womanUser();
//echo '这个类'.$a.'的实例化';


/*abstract 抽象方法
用abstract修饰的类表示这个方法是一个抽象方法。
抽象方法，只有方法的声明部分，没有方法体。
抽象方法没有 {} ，而采用 ; 结束。
一个类中，只要有一个抽象方法，这个类必须被声明为抽象类。
抽象方法在子类中必须被重写。*/

abstract class person
{
    static protected $foot;
    //抽象方法
    abstract function get_foot();
    abstract function set_foot();
    //非抽象方法
    public function __toString()
    {
        return get_class($this);
    }
}

//person类中有2个抽象方法，子类中要重写这个2个方法,否则报错.
class man extends person
{
     public function get_foot(){}
     public function  set_foot(){}
}

/*抽象类继承抽象类
可以理解为对抽象类的扩展
抽象类继承另外一个抽象类时，不用且不能重写父类的抽象方法。*/
abstract class hero extends person{
    //扩展方法
    abstract function power();
    abstract function strong();
}

//示例
abstract class AbstractClass
{
    // 我们的抽象方法仅需要定义需要的参数
    abstract protected function prefixName($name);
}

class ConcreteClass extends AbstractClass
{
    // 我们的子类可以定义父类签名中不存在的可选参数
    public function prefixName($name, $separator = ".") {
        if ($name == "Pacman") {
            $prefix = "Mr";
        } elseif ($name == "Pacwoman") {
            $prefix = "Mrs";
        } else {
            $prefix = "";
        }
        return "{$prefix}{$separator} {$name}";
    }
}

$class = new ConcreteClass;
echo $class->prefixName("Pacman"), "\n";
echo $class->prefixName("Pacwoman"), "\n";

