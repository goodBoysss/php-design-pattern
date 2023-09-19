<?php
/**
 * 外观模式（Facade Pattern）的实现方式与其他编程语言相似。
 * 外观模式通过引入一个外观类，封装了复杂系统、子系统或类库的一组接口，为客户端提供了一个简化的接口
 */
// 子系统类A
class SubsystemA {
    public function operationA() {
        echo "SubsystemA operation\n";
    }
}

// 子系统类B
class SubsystemB {
    public function operationB() {
        echo "SubsystemB operation\n";
    }
}

// 外观类
class Facade {
    private $subsystemA;
    private $subsystemB;

    public function __construct() {
        $this->subsystemA = new SubsystemA();
        $this->subsystemB = new SubsystemB();
    }

    public function operation() {
        $this->subsystemA->operationA();
        $this->subsystemB->operationB();
    }
}

// 客户端代码
$facade = new Facade();
$facade->operation();
