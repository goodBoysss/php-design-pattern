<?php
/**
 * 适配器模式（Adapter Pattern）是一种结构型设计模式，它允许将一个类的接口转换成客户端所期望的另一个接口。
 * 适配器模式使得原本由于接口不兼容而无法工作的类能够一起工作
 */
// 目标接口
interface Target
{
    public function request();
}

// 需要适配的类
class Adaptee
{
    public function specificRequest()
    {
        echo "Adaptee's specific request.\n";
    }
}

// 适配器类
class Adapter implements Target
{
    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function request()
    {
        echo "Adapter's request.\n";
        $this->adaptee->specificRequest();
    }
}

// 客户端代码
$adaptee = new Adaptee();
$adapter = new Adapter($adaptee);

$adapter->request();
