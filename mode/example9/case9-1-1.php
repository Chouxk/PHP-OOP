<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/5/12
 * Time: 17:42
 */

/*
 * 抽象与员工基类
 * */
abstract class Employee{
    protected $name;

    private static $type = array('Minion','cluedUp','wellConnected');

    static function recruit ($name){        // 招聘
        $num = rand(1,count(self::$type)-1);
        $class = self::$type[$num];
        return new $class ($name);
    }

    function __construct($name)
    {
        $this->name=$name;
    }
    abstract function fire();
    abstract function work();
}

/*
 *员工类
 * */
class Minion extends Employee{
    public function fire(){
        print "{$this->name}:╭(╯^╰)╮,我马上打包走人";
    }
    public function work(){
        print "{$this->name}:\\(^o^)/~，还好不是我~";
    }
}
/**/
class  cluedUp extends Employee {
    public function fire(){
        print "{$this->name}:╭(╯^╰)╮,我马上打包走人";
    }
    public function work(){
        print "{$this->name}:\\(^o^)/~，还好不是我~";
    }
}

class wellConnected extends Employee {
    public function fire(){
        print "{$this->name}:╭(╯^╰)╮,我马上打包走人";
    }
    public function work(){
        print "{$this->name}:\\(^o^)/~，还好不是我~";
    }
}
/*
 * 老板类
 * */
class NastyBoss{
    private $employees = array();

    function  addEmployee (Employee $employee){
        $this->employees[] = $employee;
    }

    function getEmployee(){
        return $this->employees;
    }

    function projectFails(){
        if(count( $this->employees )){
            $emp = array_pop($this->employees);
            $emp->fire();
        }else{
            $emp = current($this->employees);
            $emp->work();
        }
    }
}

$boss = new NastyBoss();
//$boss->addEmployee( new Minion('harry'));
//$boss->addEmployee( new cluedUp('bob'));
//$boss->addEmployee( new Minion('Hi'));
//$boss->addEmployee( new Minion('ki'));
//$boss->projectFails();

$boss->addEmployee(Employee::recruit('harry'));
$boss->addEmployee(Employee::recruit('bob')); 
$boss->addEmployee(Employee::recruit('mary'));