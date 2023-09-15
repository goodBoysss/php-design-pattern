<?php
/**
 * 当谈到原型模式（Prototype Pattern）时，它允许通过克隆（复制）现有对象来创建新对象，而无需依赖于显式的实例化过程。在PHP中，可以使用魔术方法__clone()来实现对象的克隆。
 * 以下是一个简单的PHP原型模式案例：
 */
// 抽象原型类
abstract class Prototype
{
    protected $name;

    abstract public function __clone();

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}

// 具体原型类
class ConcretePrototype extends Prototype
{
    public function __clone()
    {
        // 对象克隆时进行的操作
    }
}

// 客户端代码
$prototype = new ConcretePrototype();
$prototype->setName("Prototype 1");

// 克隆对象
$clone = clone $prototype;

echo $prototype->getName() . "\n";  // Output: Prototype 1
echo $clone->getName() . "\n";      // Output: Prototype 1