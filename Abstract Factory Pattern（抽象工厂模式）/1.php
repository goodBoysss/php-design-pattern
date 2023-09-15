<?php
/*
 * 抽象工厂模式（Abstract Factory Pattern）是一种创建型设计模式，它提供了一种方式来创建一组相关或相互依赖的对象，而无需指定其具体类。
 * 抽象工厂模式通过定义一个抽象工厂接口和多个具体工厂实现类来实现这一目的。
 */
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
