<?php
/**
 * define MyClass
 */
class MyClass {
    public $public = 'public';  // 公有类属性
    protected $protected = 'protected'; // 受保护类属性
    private $private = 'private'; // 私有类属性
    public function printHello() {
        echo $this->public;
        echo $this->protected;
        echo $this->private;
    }
}
$obj = new MyClass();
echo $obj->public;
// echo $obj->protected; // fatal error 只能被自身、父类、子类访问
// echo $obj->private; // fatal error 只能被自身访问
echo  $obj->printHello();
echo "\n";

/**
 * define MyClass2
 */
class MyClass2  extends MyClass{
    //可以对public、protected进行重定义，private不可以
    public $public = 'public2'; // 在MyClass子类中对$public属性进行重定义
    protected $protected = 'protected2'; // 在MyClass子类中对$protected属性进行重定义
    public function printHello() {
        echo $this->public;
        echo $this->protected;
        echo $this->private;
    }

}
$obj2 = new MyClass2();
echo $obj2->public;
//echo $obj2->protected; // fatal error 只能被自身、父类、子类访问
//echo $obj2->private; // fatal error 只能被自身访问
echo $obj2->printHello();
//echo $obj2->printHello2();