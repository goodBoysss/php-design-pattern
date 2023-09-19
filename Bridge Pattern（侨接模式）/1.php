<?php
/**
 * 桥接模式（Bridge Pattern）是一种结构型设计模式，它将抽象部分和实现部分分离，使它们可以独立地变化。
 * 该模式通过将继承关系转化为组合关系，实现了抽象部分和实现部分的解耦，从而提供了更大的灵活性。
 */
// 实现部分接口
interface Implementor
{
    public function operationImp();
}

// 具体实现类A
class ConcreteImplementorA implements Implementor
{
    public function operationImp()
    {
        echo "ConcreteImplementorA operation implementation.\n";
    }
}

// 具体实现类B
class ConcreteImplementorB implements Implementor
{
    public function operationImp()
    {
        echo "ConcreteImplementorB operation implementation.\n";
    }
}

// 抽象部分类
abstract class Abstraction
{
    protected $implementor;

    public function __construct(Implementor $implementor)
    {
        $this->implementor = $implementor;
    }

    public function operation()
    {
        $this->implementor->operationImp();
    }
}

// 具体抽象类A
class ConcreteAbstractionA extends Abstraction
{
    public function operation()
    {
        echo "ConcreteAbstractionA operation.\n";
        parent::operation();
    }
}

// 具体抽象类B
class ConcreteAbstractionB extends Abstraction
{
    public function operation()
    {
        echo "ConcreteAbstractionB operation.\n";
        parent::operation();
    }
}

// 客户端代码
$implementorA = new ConcreteImplementorA();
$implementorB = new ConcreteImplementorB();

$abstractionA = new ConcreteAbstractionA($implementorA);
$abstractionA->operation();

$abstractionB = new ConcreteAbstractionB($implementorB);
$abstractionB->operation();
