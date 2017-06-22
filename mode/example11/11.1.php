<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/6/22
 * Time: 14:33
 * 探知 - 解析器模式（未完）
 */


/**
 * Class Expression
 */
abstract class Expression
{
    private static $keyCount = 0;
    private $key;

    abstract function interpret (InterpreterContext $context);

    /**
     * @return int
     */
    function getKey()
    {
        if ( ! isset ( $this->key ) )
        {
            self::$keyCount++;
            $this->key=self::$keyCount;
        }
        return $this->key;
    }
}

/**
 * Class LiteralExpression
 * 文字表达式
 */
class LiteralExpression extends Expression
{
    private $value;

    function __construct($value )
    {
        $this->value = $value;
    }

    /**
     * @param InterpreterContext $context
     */
    function interpret(InterpreterContext $context)
    {
        // TODO: Implement interpret() method.
        $context->replace( $this, $this->value);
    }
}

class  VariableExpression extends Expression
{
    private $name;
    private $value;

    function __construct($name,$value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    function interpret(InterpreterContext $context)
    {
        // TODO: Implement interpret() method.
        if( ! is_null($this->value))
        {
            $context->replace( $this, $this->value);
            $this->value = null;
        }
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     * 重写 getKey()
     */
    function getKey()
    {
        return $this->name;
    }
}

/**
 * Class InterpreterContext
 */
class InterpreterContext
{
    /**
     * @var array
     */
    private $expressionStore = array();

    /**
     * @param Expression $expression
     * @param $value
     */
    function replace (Expression $expression, $value)
    {
        $this->expressionStore[$expression->getKey()] = $value;
    }

    /**
     * @param Expression $expression
     * @return mixed
     */
    function lookup(Expression $expression )
    {
        return $this->expressionStore[$expression->getKey()];
    }
}


$context = new InterpreterContext();
$literal = new LiteralExpression('four');
$literal->interpret( $context );
print $context->lookup( $literal );


