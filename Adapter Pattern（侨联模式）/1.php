<?php
/**
 * 在PHP中，可以使用适配器模式（Adapter Pattern）来实现侨联模式（Facade Pattern）。
 * 适配器模式允许将多个不兼容的接口封装在一个适配器类中，以提供一个统一的接口给客户端使用。
 */
// 子系统类A
class SubsystemA
{
    public function operationA()
    {
        echo "Subsystem A operation\n";
    }
}

// 子系统类B
class SubsystemB
{
    public function operationB()
    {
        echo "Subsystem B operation\n";
    }
}

// 侨联类（适配器）
class Facade
{
    private $subsystemA;
    private $subsystemB;

    public function __construct()
    {
        $this->subsystemA = new SubsystemA();
        $this->subsystemB = new SubsystemB();
    }

    public function operation()
    {
        $this->subsystemA->operationA();
        $this->subsystemB->operationB();
    }
}

// 客户端使用侨联类
$facade = new Facade();
$facade->operation();
