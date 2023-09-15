<?php
// 抽象产品接口
interface Product
{
    public function getName();
}

// 具体产品类A
class ConcreteProductA implements Product
{
    public function getName()
    {
        return "Product A";
    }
}

// 具体产品类B
class ConcreteProductB implements Product
{
    public function getName()
    {
        return "Product B";
    }
}

// 抽象工厂接口
interface AbstractFactory
{
    public function createProduct();
}

// 具体工厂类A，用于创建产品A
class ConcreteFactoryA implements AbstractFactory
{
    public function createProduct()
    {
        return new ConcreteProductA();
    }
}

// 具体工厂类B，用于创建产品B
class ConcreteFactoryB implements AbstractFactory
{
    public function createProduct()
    {
        return new ConcreteProductB();
    }
}

// 客户端代码
$factoryA = new ConcreteFactoryA();
$productA = $factoryA->createProduct();
echo $productA->getName() . "\n";  // Output: Product A

$factoryB = new ConcreteFactoryB();
$productB = $factoryB->createProduct();
echo $productB->getName() . "\n";  // Output: Product B
