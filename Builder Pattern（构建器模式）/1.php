<?php
/**
 * 构建器模式（Builder Pattern）是一种创建型设计模式，用于通过一步一步的方式构建复杂对象。
 * 构建器模式将对象的构建过程与其表示分离，使得同样的构建过程可以创建不同的表示。
 */
class Product
{
    private $partA;
    private $partB;
    private $partC;

    public function setPartA($partA)
    {
        $this->partA = $partA;
    }

    public function setPartB($partB)
    {
        $this->partB = $partB;
    }

    public function setPartC($partC)
    {
        $this->partC = $partC;
    }

    public function getInfo()
    {
        return "Part A: {$this->partA}, Part B: {$this->partB}, Part C: {$this->partC}";
    }
}

// 构建器接口
interface Builder
{
    public function buildPartA();
    public function buildPartB();
    public function buildPartC();
    public function getProduct();
}

// 具体构建器类
class ConcreteBuilder implements Builder
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function buildPartA()
    {
        $this->product->setPartA("Build Part A");
    }

    public function buildPartB()
    {
        $this->product->setPartB("Build Part B");
    }

    public function buildPartC()
    {
        $this->product->setPartC("Build Part C");
    }

    public function getProduct()
    {
        return $this->product;
    }
}

// 导演类
class Director
{
    public function construct(Builder $builder)
    {
        $builder->buildPartA();
        $builder->buildPartB();
        $builder->buildPartC();
    }
}

// 客户端代码
$builder = new ConcreteBuilder();
$director = new Director();

$director->construct($builder);
$product = $builder->getProduct();

echo $product->getInfo() . "\n";
