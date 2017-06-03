<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/6/3
 * Time: 11:43
 */

/*在给不可访问属性赋值时，__set() 会被调用。

读取不可访问属性的值时，__get() 会被调用。

当对不可访问属性调用 isset() 或 empty() 时，__isset() 会被调用。

当对不可访问属性调用 unset() 时，__unset() 会被调用。
*/

class person
{
    private $name;
    private $sex;
    private $age;
    protected  $weight;
    public $height;

    //__get(),__set(),__isset(),__unset() 提倡是 public 类型的，并且不是 static 方法或者private方法，否则会给出警告信息！
    //Warning: The magic method __get() must have public visibility and cannot be static
    function __get($property_name) {
        echo "在直接获取私有属性值的时候，自动调用了这个__get()方法<br />";
        if (isset($this->$property_name)) {
            return ($this->$property_name).'<br />';
        } else {
            return NULL;
        }
    }

    function __set($property_name, $value) {
        $this->$property_name = $value;
        echo "在直接设置私有属性值的时候，自动调用了这个__set()方法,设置'$property_name' 为'$value'<br />";
    }

    function __isset($is)
    {
        echo "isset()或empty()测定私有成员时，自动调用<br />";
        return isset($this->$is);
    }

    function  __unset($name)
    {
        echo '类外部使用unset()函数删除私有成员时，自动调用'.'<br \>';
        unset($this->$name);
    }
}

$p = new person();
$p->name='123';
echo 'private属性值：'.$p->name;
isset($p->sex);
unset($p->age);
$p->weight='111';
echo 'protected属性值：'.$p->name;
unset($p->height); //测试结果，只有是私有属性（private、protected），才能触发这个4中方法。
