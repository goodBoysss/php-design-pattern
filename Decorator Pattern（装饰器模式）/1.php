<?php
/**
 * 装饰器模式（Decorator Pattern）用于动态地为对象添加额外的功能，而无需修改其原始类。它允许通过将对象包装在装饰器类中来透明地添加、修改或删除对象的行为。
 * 以下是一个简单的PHP装饰器模式示例：
 */
// 组件接口
interface Component
{
    public function operation();
}

// 具体组件
class ConcreteComponent implements Component
{
    public function operation()
    {
        echo "Executing operation in ConcreteComponent.\n";
    }
}

// 装饰器抽象类
abstract class Decorator implements Component
{
    protected $component;

    public function __construct(Component $component)
    {
        $this->component = $component;
    }

    public function operation()
    {
        $this->component->operation();
    }
}

// 具体装饰器A
class ConcreteDecoratorA extends Decorator
{
    public function operation()
    {
        parent::operation();
        $this->addedBehavior();
    }

    public function addedBehavior()
    {
        echo "Executing additional behavior in ConcreteDecoratorA.\n";
    }
}

// 具体装饰器B
class ConcreteDecoratorB extends Decorator
{
    public function operation()
    {
        parent::operation();
        $this->addedBehavior();
    }

    public function addedBehavior()
    {
        echo "Executing additional behavior in ConcreteDecoratorB.\n";
    }
}

// 客户端代码
$component = new ConcreteComponent();
$decoratorA = new ConcreteDecoratorA($component);
$decoratorB = new ConcreteDecoratorB($decoratorA);

$decoratorB->operation();
