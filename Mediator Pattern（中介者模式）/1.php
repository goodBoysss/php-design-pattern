<?php
/**
 * 中介者模式（Mediator Pattern）是一种行为型设计模式，它通过引入一个中介者对象来协调多个相关对象之间的交互，从而降低对象之间的直接耦合。
 */
// 中介者接口
interface Mediator
{
    public function notify(Component $sender, $event);
}

// 具体中介者类
class ConcreteMediator implements Mediator
{
    private $component1;
    private $component2;

    public function setComponent1(Component1 $component1)
    {
        $this->component1 = $component1;
    }

    public function setComponent2(Component2 $component2)
    {
        $this->component2 = $component2;
    }

    public function notify(Component $sender, $event)
    {
        if ($sender === $this->component1) {
            // 处理component1发出的事件
            if ($event === 'eventA') {
                // 执行相应的操作
                $this->component2->doSomething();
            }
        } elseif ($sender === $this->component2) {
            // 处理component2发出的事件
            if ($event === 'eventB') {
                // 执行相应的操作
                $this->component1->doSomething();
            }
        }
    }
}

// 抽象组件类
abstract class Component
{
    protected $mediator;

    public function setMediator(Mediator $mediator)
    {
        $this->mediator = $mediator;
    }

    public function notify($event)
    {
        $this->mediator->notify($this, $event);
    }
}

// 具体组件类
class Component1 extends Component
{
    public function doSomething()
    {
        // 执行自身的操作
        echo "Component1 do something.\n";
        // 发出事件
        $this->notify('eventA');
    }
}

class Component2 extends Component
{
    public function doSomething()
    {
        // 执行自身的操作
        echo "Component2 do something.\n";
        // 发出事件
        $this->notify('eventB');
    }
}

// 客户端代码
$mediator = new ConcreteMediator();

$component1 = new Component1();
$component2 = new Component2();

$component1->setMediator($mediator);
$component2->setMediator($mediator);

$mediator->setComponent1($component1);
$mediator->setComponent2($component2);

$component1->doSomething();
