<?php
/**
 * 在PHP中，工厂模式（Factory Pattern）是一种创建对象的设计模式，它提供了一种封装对象实例化过程的方式。
 * 工厂模式通过定义一个公共接口来创建对象，而不暴露具体的实例化逻辑给客户端代码。以下是一个简单的PHP工厂模式示例：
 */
// 商品接口
interface Product
{
    public function getName();
}

// 具体商品类A
class ConcreteProductA implements Product
{
    public function getName()
    {
        return "Product A";
    }
}

// 具体商品类B
class ConcreteProductB implements Product
{
    public function getName()
    {
        return "Product B";
    }
}

// 商品工厂类
class ProductFactory
{
    public static function createProduct($type)
    {
        switch ($type) {
            case 'A':
                return new ConcreteProductA();
            case 'B':
                return new ConcreteProductB();
            default:
                throw new Exception("Invalid product type.");
        }
    }
}

// 客户端代码
$productA = ProductFactory::createProduct('A');
$productB = ProductFactory::createProduct('B');

echo $productA->getName() . "\n";  // Output: Product A
echo $productB->getName() . "\n";  // Output: Product B