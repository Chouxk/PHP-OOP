<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/6/14
 * Time: 16:53
 */

/*
 * 探知 - 装饰模式3
 * 模拟web请求简单示例
 * */

class RequestHelper{}

/**
 * Class ProcessRequest
 * 抽象基类
 */
abstract class ProcessRequest
{
    abstract function process( RequestHelper $req );
}

/**
 * Class MainProcess
 * 具体的组件
 */
class MainProcess extends ProcessRequest
{
    function process(RequestHelper $req)
    {
        // TODO: Implement process() method.
        print __CLASS__." doing something useful with request; <br /> ";
    }
}


/**
 * Class DecorateProcess
 * 抽象装饰类
 * 子类保存一个ProcessRequest
 */
abstract class DecorateProcess extends ProcessRequest
{
    protected $processRequest;

    function __construct( ProcessRequest $pr )
    {
        $this->processRequest = $pr;
    }
}

/**
 * Class LogRequest
 * 煎蛋的具体装饰类
 */
class LogRequest extends DecorateProcess
{
    function process(RequestHelper $req)
    {
        // TODO: Implement process() method.
        print __CLASS__." logging request; <br />";
        $this->processRequest->process($req);
    }
}

class AuthenticateRequest extends DecorateProcess
{
    function process(RequestHelper $req)
    {
        // TODO: Implement process() method.
        print __CLASS__." authenticating request; <br />";
        $this->processRequest->process($req);
    }
}

class StructureRequest extends DecorateProcess
{
    function process(RequestHelper $req)
    {
        // TODO: Implement process() method.
        print __CLASS__." structuring request; <br />";
        $this->processRequest->process($req);
    }
}

$process = new AuthenticateRequest(new StructureRequest(new LogRequest(new MainProcess())));
$process->process(new RequestHelper());