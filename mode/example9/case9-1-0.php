<?php
/**
 * Created by PhpStorm.
 * User: M
 */

/*
 * 抽象与员工基类
 * */
abstract class Employee{
    protected $name;
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
        if(count( $this->employees ) > 3){
            $emp = array_pop($this->employees);
            $emp->fire();
        }else{
            $emp = current($this->employees);
            $emp->work();
        }
    }
}

/*$boss = new NastyBoss();
$boss->addEmployee( new Minion('harry'));
$boss->addEmployee( new cluedUp('bob'));
$boss->addEmployee( new Minion('Hi'));
$boss->addEmployee( new Minion('ki'));
$boss->projectFails();*/
