<?php
/**
 * 责任链模式（Chain of Responsibility Pattern）是一种行为型设计模式，它允许将请求沿着处理链进行传递，直到有一个处理者能够处理该请求为止。
 * 责任链模式将请求发送者和接收者解耦，使得多个对象都有机会处理请求，而不需要显式指定接收者。以下是一个简单的PHP责任链模式示例：
 */
// 请求类
class Request
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}

// 抽象处理者
abstract class Handler
{
    private $nextHandler;

    public function setNext(Handler $handler)
    {
        $this->nextHandler = $handler;
    }

    public function handle(Request $request)
    {
        if ($this->canHandle($request)) {
            $this->process($request);
        } elseif ($this->nextHandler !== null) {
            $this->nextHandler->handle($request);
        } else {
            // 如果没有处理者能够处理该请求，进行默认处理
            $this->defaultProcess($request);
        }
    }

    // 判断是否能够处理请求的抽象方法，由子类实现
    abstract protected function canHandle(Request $request);

    // 处理请求的抽象方法，由子类实现
    abstract protected function process(Request $request);

    // 默认处理方法
    protected function defaultProcess(Request $request)
    {
        echo "No handler can process the request.\n";
    }
}

// 具体处理者A
class ConcreteHandlerA extends Handler
{
    protected function canHandle(Request $request)
    {
        // 判断是否能够处理请求的逻辑
        return $request->getData() < 10;
    }

    protected function process(Request $request)
    {
        // 处理请求的逻辑
        echo "ConcreteHandlerA handles the request.\n";
    }
}

// 具体处理者B
class ConcreteHandlerB extends Handler
{
    protected function canHandle(Request $request)
    {
        // 判断是否能够处理请求的逻辑
        return $request->getData() >= 10 && $request->getData() < 20;
    }

    protected function process(Request $request)
    {
        // 处理请求的逻辑
        echo "ConcreteHandlerB handles the request.\n";
    }
}

// 具体处理者C
class ConcreteHandlerC extends Handler
{
    protected function canHandle(Request $request)
    {
        // 判断是否能够处理请求的逻辑
        return $request->getData() >= 20;
    }

    protected function process(Request $request)
    {
        // 处理请求的逻辑
        echo "ConcreteHandlerC handles the request.\n";
    }
}

// 客户端代码
$request1 = new Request(5);
$request2 = new Request(15);
$request3 = new Request(25);

$handlerA = new ConcreteHandlerA();
$handlerB = new ConcreteHandlerB();
$handlerC = new ConcreteHandlerC();

$handlerA->setNext($handlerB);
$handlerB->setNext($handlerC);

$handlerA->handle($request1); // ConcreteHandlerA handles the request.
$handlerA->handle($request2); // ConcreteHandlerB handles the request.
$handlerA->handle($request3); // ConcreteHandlerC handles the request.
