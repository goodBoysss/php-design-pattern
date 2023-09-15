<?php
/**
 * 单例模式（Singleton Pattern）是一种创建型设计模式，用于确保一个类只有一个实例，并提供一个全局访问点来访问该实例
 */
class Singleton
{
    private static $instance;

    private function __construct()
    {
        // 私有化构造函数，防止外部实例化
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // 其他方法...
}