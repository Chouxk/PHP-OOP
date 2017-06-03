<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/5/9
 * Time: 18:01
 */

//可以把在类中始终保持不变的值定义为常量。在定义和使用常量的时候不需要使用 $ 符号。
//常量的值必须是一个定值，不能是变量，类属性，数学运算的结果或函数调用。
class MyClass
{
    const constant = 'constant_value';

    function showConstant() {
        return  self::constant . "\n";
    }
}
echo MyClass::constant . "\n";

$classname = "MyClass";
echo $classname::constant . "\n"; // 自 5.3.0 起

$class = new MyClass();
$class->showConstant();
echo $class::constant."\n"; // 自 PHP 5.3.0 起

class foo {
    // 自 PHP 5.3.0 起
    const bar = <<<'EOT'
bar 123456
EOT;
}
echo foo::bar;


