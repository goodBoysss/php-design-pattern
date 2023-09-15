<?php

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
