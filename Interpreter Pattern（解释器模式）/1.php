<?php
/**
 * 解释器模式（Interpreter Pattern）是一种行为型设计模式，它用于定义一种语言的文法规则，并且通过解释器来解释和执行语言中的表达式。
 * 该模式将一个语言表达式的解释过程分解为多个小的解释操作，每个操作对应语言规则中的一个终结符或非终结符。
 */
// 抽象表达式类
abstract class Expression
{
    abstract public function interpret(Context $context);
}

// 终结符表达式类
class TerminalExpression extends Expression
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function interpret(Context $context)
    {
        return $context->lookup($this->data);
    }
}

// 非终结符表达式类
class NonterminalExpression extends Expression
{
    private $expression1;
    private $expression2;

    public function __construct(Expression $expression1, Expression $expression2)
    {
        $this->expression1 = $expression1;
        $this->expression2 = $expression2;
    }

    public function interpret(Context $context)
    {
        return $this->expression1->interpret($context) + $this->expression2->interpret($context);
    }
}

// 上下文类
class Context
{
    private $data = [];

    public function lookup($key)
    {
        return $this->data[$key] ?? null;
    }

    public function assign($key, $value)
    {
        $this->data[$key] = $value;
    }
}

// 客户端代码
$context = new Context();
$expression1 = new TerminalExpression('foo');
$expression2 = new TerminalExpression('bar');
$expression3 = new NonterminalExpression($expression1, $expression2);

$context->assign('foo', 1);
$context->assign('bar', 2);

$result = $expression3->interpret($context);
echo $result; // Output: 3
