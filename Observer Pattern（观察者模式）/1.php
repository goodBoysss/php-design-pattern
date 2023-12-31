<?php
/**
 * 观察者模式（Observer Pattern）是一种行为型设计模式，用于建立对象之间的一对多依赖关系，使得一个对象的状态变化可以通知并自动更新依赖于它的其他对象。
 */

// 主题接口
interface Subject {
    public function registerObserver(Observer $observer);
    public function removeObserver(Observer $observer);
    public function notifyObservers();
}

// 观察者接口
interface Observer {
    public function update($data);
}

// 具体主题
class ConcreteSubject implements Subject {
    private $observers = array();
    private $data;

    public function registerObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function removeObserver(Observer $observer) {
        $index = array_search($observer, $this->observers);
        if ($index !== false) {
            unset($this->observers[$index]);
        }
    }

    public function notifyObservers() {
        foreach ($this->observers as $observer) {
            $observer->update($this->data);
        }
    }

    public function setData($data) {
        $this->data = $data;
        $this->notifyObservers();
    }
}

// 具体观察者
class ConcreteObserver implements Observer {
    public function update($data) {
        echo "Received data: " . $data . "\n";
    }
}

// 使用示例
$subject = new ConcreteSubject();

$observer1 = new ConcreteObserver();
$subject->registerObserver($observer1);

$observer2 = new ConcreteObserver();
$subject->registerObserver($observer2);

$subject->setData("Hello, observers!");

$subject->removeObserver($observer2);

$subject->setData("Data updated!");