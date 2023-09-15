<?php
/**
 * 模板方法模式（Template Method Pattern）是一种行为型设计模式，它定义了一个算法的骨架，将一些步骤的具体实现延迟到子类中。
 * 模板方法模式通过将通用的算法逻辑放在抽象类中，并将特定步骤的实现留给具体子类来完成，从而实现代码的复用和灵活性。以下是一个简单的PHP模板方法模式示例：
 */
// 抽象模板类
abstract class AbstractClass
{
    // 模板方法
    public function templateMethod()
    {
        $this->stepOne();
        $this->stepTwo();
        $this->stepThree();
    }

    // 抽象方法，需要子类实现
    abstract protected function stepOne();

    // 钩子方法，子类可以选择性实现
    protected function stepTwo()
    {
        // 默认实现
    }

    // 抽象方法，需要子类实现
    abstract protected function stepThree();
}

// 具体子类A
class ConcreteClassA extends AbstractClass
{
    protected function stepOne()
    {
        echo "ConcreteClassA: Step One\n";
    }

    protected function stepThree()
    {
        echo "ConcreteClassA: Step Three\n";
    }
}

// 具体子类B
class ConcreteClassB extends AbstractClass
{
    protected function stepOne()
    {
        echo "ConcreteClassB: Step One\n";
    }

    protected function stepTwo()
    {
        echo "ConcreteClassB: Custom Step Two\n";
    }

    protected function stepThree()
    {
        echo "ConcreteClassB: Step Three\n";
    }
}

// 客户端代码
$objectA = new ConcreteClassA();
$objectA->templateMethod();

$objectB = new ConcreteClassB();
$objectB->templateMethod();