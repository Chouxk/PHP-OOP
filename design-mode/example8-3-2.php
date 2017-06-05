<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/5/12
 * Time: 16:53
 */

require_once "example8-2-2.php";

abstract class Notifier {
    static function getNotifier(){
        //根据配置或其他逻辑获得具体的类

        if (rand(1,2) == 1){
            return new MailNotifier();
        }
        else{
            return new TextNotifier();
        }
    }
    abstract  function  inform($message);
}

class MailNotifier extends Notifier{
    function inform ($message){
        print  "Mall notification: {$message}\n";
    }
}

class TextNotifier extends  Notifier{
    function inform ($message) {
        print "TEXT notification : {$message} ";
    }
}

/*
 *
 * */
class RegistrationMg{

    function  register (Lesson $lesson){
        //处理通知

        //通知某人
        $notifier = Notifier::getNotifier();

        $notifier->inform("new lesson:cost ({$lesson->cost()})");
    }
}

$le1 = new Seminar(4,new TimedCostStrategy());
$le2 = new Lecture(4,new FixedCostStrategy());

$mgr = new RegistrationMg();
$mgr->register($le1);
echo '<br />';
$mgr->register($le2);