<?php
//类是抽象的概念，对象是具体的实例。类可以使程序具有实用性。
//类通过关键字class开头，然后是类名与花括号，在花括号中定义类的属性与方法。
//类名必须是字母或下划线开头，后面紧跟若干个字母、数字或下划线，类名最好能够表意，可以采用名词或者英文单词。

//定义一个类
class Car {
//属性：在类中定义的变量，通常属性和数据库中的子段有关联，又称作子段。
//属性的声明：由访问控制的关键字public（公开的）、protected（受保护的）、private（私有的）开头+一个普通的变量。
//属性的变量可以初始化默认值，默认值必须为常量。
//属性默认为public，外部可以访问。一般通过对象操作符->来访问对象的属性和方法，静态属性使用::进行访问。在类成员方法内部调用的时候可以使用伪变量$this。
//protected、private不允许外部调用。protected只允许子类、父类和类本身内部调用。private只允许类本身内部调用。
//属性必须定义访问控制。
//    var $name = '汽车'; // 定义公有属性，兼容php5以前的版本
    public $name = '汽车'; // 定义公共属性
    protected $color = '白色'; // 定义受保护属性
    private $price = '100000'; // 定义私有属性

    //方法：类中的function。在面向对象中叫方法，在面向过程中叫函数。类的方法也有public、protedted、private的访问控制，不写默认问public。
    function getName() { // 获取对象名称方法
        return $this->name; // 方法内部可以使用伪变量$this调用对象的属性和方法
    }
    //静态方法static，不需要实例化对象，类名直接调用
    public static function getNameStatic(){
        return 'static';
    }

    public $speed = 0;
    //增加speedUp方法，使speed加10
    public function SpeedUp(){
        return $this->speed += 10;
    }

    //构造函数：具有构造函数的类，每次对象创建时，调用此函数，对对象进行一些初始化的工作。
    public function __construct()
    {
        print("父类构造函数被调用\n");
    }

    //析构函数：对象的所有引用被删除，或者对象被显式销毁时执行
    public function __destruct()
    {
        print("析构函数被调用\n");
    }

    //静态属性与方法：不实例化类的情况下调用。类名::属性名；类名::方法名；不允许对象使用->操作符来调用。
    public static $speed1 = 10;
    public static function getSpeed1(){
        return self::$speed1; //静态方法中$this伪变量不允许使用，可以使用self、static、parent在内部调用静态属性和方法。
    }
}

//实例化一个car对象，使用new关键字
$car = new Car();
$car->name = '奥迪A6'; //设置对象的属性值
echo $car->getName();  //调用对象的方法 输出对象的名字
unset($car); // 显式销毁对象调用析构函数。php执行完毕后会自动销毁回收对象，一般不需要显式的销毁对象。

// 通过变量来创建一个对象
$className = 'Car';
$car1 = new $className();
$car1->name = '奥迪A61';
echo $car1->getName();

// 静态方法的调用
echo Car::getNameStatic();
// 静态方法调用
echo Car::getSpeed1();
// 静态方法通过变量动态调用
$func = 'getSpeed1';
$className = 'Car';
echo $className::$func();
echo"Truck<br/>";
class Truck extends Car{
    //子类中定义了构造函数则不再会调用父类的构造函数，若想同时调用父类的，需要显示调用
    public function __construct()
    {
        print("调用子类的构造函数\n");
        parent::__construct(); // 父类的构造函数被显示调用
    }
    public function speedUp(){
        $this->speed = parent::speedUp() + 50;
        return $this->speed;
    }
}
$truck = new Truck();
echo "在父类的基础上加速50：".$truck->speedUp();

class Test{
    // 构造函数定义成了私有的方法，外部不能调用，不允许直接实例化对象了，只能通过类名调用，通过静态方法进行实例化。
    // 设计模式中经常使用这样的方法控制对象的创建，比如单例模式 ，只允许有一个全局的唯一的对象。
    private function __construct()
    {
        echo 'object create';
    }
    private static $_object = null;
    public static function getInstance(){
        if (empty($_object)){
            self::$_object = new Test(); // 内部方法可以调用私有方法，因此这里可以创建对象。
        }
        return self::$_object;
    }
}
Test::getInstance(); // 通过静态方法获取一个实例

// 继承:面向对象程序设计中的常用特性。子类和父类（基类）中具有好多共同的方法和属性，通过继承来共享这些属性和方法，实现代码的复用。

// 重载：动态的创建属性和方法，通过魔术方法来实现。属性的设置通过__set(赋值)、__get(读取)、__isset(判断属性是否存在)、__unset(销毁属性)
class Human{
    private $arr = array();
    public function __set($key, $val){
        $this->arr[$key] = $val;
    }
    public function __get($key){
        if(isset($this->arr[$key])){
            return $this->arr[$key];
        }
        return null;
    }
    public function __isset($key){
        if(isset($this->arr[$key])){
            return true;
        }
        return false;
    }
    public function __unset($key){
        unset($this->arr[$key]);
    }
    // 方法的重载通过__call来实现，当调用不存在的方法时，会转为参数调用__call方法，当调用不存在的静态方法时会使用__callStatic重载。
    public $age = 10;
    public function __call($name,$args){
        if($name == 'addAge'){
            $this->age += 20;
        }
    }
    public function __clone(){
        $obj = new Human();
        $obj->age = $this->age;
    }
}
$human = new Human();
$human->name = '人类'; // name属性动态创建并赋值
echo $human->name;
$human->addAge(); // 调用不存在的方法时会使用重载
echo $human->age;
// 对象的比较 当同一个类的两个实例的所有属性都相等时，可以使用比较运算符==进行判断，当需要判断两个变量是否为同一个对象的引用时，可以使用全等运算符===进行判断。
$human1 = new Human();
$human2 = new Human();
if($human1 == $human2) {echo '==';} // true
if($human1 === $human2){echo '===';} // false
// 对象的复制 在一些特殊的情况下，可以通过clone来复制一个对象，这时魔术方法__clone被调用，通过它来设置属性的值。
$obj1 = new Human();
$obj1->age = 20;
$obj = clone $obj1;
var_dump($obj);
// 对象的序列化 可以通过serialize方法将对象序列化为字符串，用于存储或者传递数据，需要的时候需要将字符串反序列化为对象进行使用。
$str = serialize($obj); // 对象序列化为字符串
echo $str;
$obj = unserialize($str); // 字符串反序列化为对象
var_dump($obj);

