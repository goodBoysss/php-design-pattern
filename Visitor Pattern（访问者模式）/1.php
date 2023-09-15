<?php
/**
 * 访问者模式（Visitor Pattern）是一种行为型设计模式，它允许在不修改被访问对象的类的情况下，定义新的操作并应用于这些对象。
 * 访问者模式通过将操作封装在访问者对象中，并将其传递给被访问对象进行处理。以下是一个简单的PHP访问者模式示例：
 */
// 元素接口
interface Element
{
    public function accept(Visitor $visitor);
}

// 具体元素A
class ConcreteElementA implements Element
{
    public function accept(Visitor $visitor)
    {
        $visitor->visitElementA($this);
    }

    public function operationA()
    {
        echo "Operation A performed.\n";
    }
}

// 具体元素B
class ConcreteElementB implements Element
{
    public function accept(Visitor $visitor)
    {
        $visitor->visitElementB($this);
    }

    public function operationB()
    {
        echo "Operation B performed.\n";
    }
}

// 访问者接口
interface Visitor
{
    public function visitElementA(ConcreteElementA $elementA);
    public function visitElementB(ConcreteElementB $elementB);
}

// 具体访问者
class ConcreteVisitor implements Visitor
{
    public function visitElementA(ConcreteElementA $elementA)
    {
        echo "Visitor visits ConcreteElementA.\n";
        $elementA->operationA();
    }

    public function visitElementB(ConcreteElementB $elementB)
    {
        echo "Visitor visits ConcreteElementB.\n";
        $elementB->operationB();
    }
}

// 对象结构
class ObjectStructure
{
    private $elements = [];

    public function attach(Element $element)
    {
        $this->elements[] = $element;
    }

    public function detach(Element $element)
    {
        $index = array_search($element, $this->elements, true);
        if ($index !== false) {
            unset($this->elements[$index]);
        }
    }

    public function accept(Visitor $visitor)
    {
        foreach ($this->elements as $element) {
            $element->accept($visitor);
        }
    }
}

// 客户端代码
$objectStructure = new ObjectStructure();

$elementA = new ConcreteElementA();
$elementB = new ConcreteElementB();

$objectStructure->attach($elementA);
$objectStructure->attach($elementB);

$visitor = new ConcreteVisitor();

$objectStructure->accept($visitor);