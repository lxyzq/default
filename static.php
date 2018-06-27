<?php
class Foo {
    public static $my_static = 'foo'; // 静态属性
    public function staticValue() { // 返回静态属性的值
        return self::$my_static;
    }
    public static function aStaticMethod() { // 静态方法
        return "我是静态方法";
    }
}

class Bar extends Foo { // 继承
    public function fooStatic() {
        return parent::$my_static;
    }
}

//print Foo::$my_static .  '\n'; // ?
print Foo::$my_static . "\n"; // 静态属性只能通过类名直接访问
$foo = new Foo();
//print $foo->my_static; // Notice：不能通过对象访问静态属性
print $foo->staticValue() . "\n"; // 通过类中的方法访问静态属性
print $foo::$my_static  . "\n"; // 静态属性不能通过对象->操作符来访问，但可以通过对象::静态属性来访问
$classname = "Foo";
print $classname::$my_static . "\n"; // php5.3.0起，可以用变量动态调用一个类，但是该变量不能为关键字self、parent、static

print Bar::$my_static . "\n";
$bar = new Bar();
print $bar->fooStatic() . "\n";
print $bar->staticValue() . "\n";

print Foo::aStaticMethod() . "\n"; // 通过类名直接调用静态方法
print $foo->aStaticMethod() . "\n"; // 通过对象调用静态方法
print $classname::aStaticMethod() . "\n"; // 从php5.3.0起，可以用变量动态调用一个类，但是该变量不能为关键字self、parent、static

print Bar::aStaticMethod() . "\n";
print $bar->aStaticMethod() . "\n";



