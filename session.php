<?php
//cookie存储在客户端，相对不安全，容易被盗用，导致cookie欺骗。单个cookie的值最大只能存储4k。每次请求都要进行网络传输，占用带宽。
//session将用户的会话数据存储在服务端，没有大小限制，通过session_id进行用户识别。php默认情况下session_id通过cookie来保存，某种程度上讲，session依赖于cookie。但不是绝对的，seesion_id也可以通过参数来实现，只要能将session_id传递到服务端进行识别的机制都可以使用session。
//开始使用session
session_start();
//设置一个session
$_SESSION['test'] = time();
$_SESSION['name'] = 'jobs';
session_destroy(); // 删除所有session数据，session_id仍然存在。不会立即销魂全局变量$_SESSION中的值，只有当下次访问时，$_SESSION才为空
//显示当前的session_id
echo "session_id:".session_id();
echo "<br>";
//读取session值
echo $_SESSION['test'];
//销毁一个session
unset($_SESSION['test']);
echo "<br>";
var_dump($_SESSION);
//session会自动的对要设置的值进行encode与decode，因此session可以支持任意数据类型，包括数组与对象等。
$_SESSION['ary'] = array('name' => 'jobs');
$_SESSION['obj'] = new stdClass();
// 默认情况下，session是以文件形式，存储在服务器上，当一个页面开启了session，会独占这个session文件，导致当前用户的其他并发访问无法执行而等待。
//可以采用缓存或者数据库的形式存储来解决这个问题。

// 如果需要同时销毁cookie中的session_id,用户退出的时候可能会用到，需要显示地调用setcookie方法删除session_id的cookie值。

//session可以用来存储多种类型的数据，常用来存储用户的登录信息，购物车数据，或者一些临时使用的暂存数据等。
//用户登录成功之后，通常可以将用户信息存储在session中，一般会单独地将一些重要的子段单独存储，然后将所有的用户信息独立存储。
//登录信息既可以存在session中也可以存在cookie中。session可以方便的存取多种数据类型，而cookie只支持字符串类型，同时对于一些安全性比较高的数据，cookie需要进行格式化与加密存储，而session存储在服务端则安全性较高。
//假设用户登录成功获得了以下用户数据
$userinfo = array(
    'uid'  => 10000,
    'name' => 'spark',
    'email' => 'spark@imooc.com',
    'sex'  => 'man',
    'age'  => '18'
);
header("content-type:text/html; charset=utf-8");

/* 将用户信息保存到session中 */
$_SESSION['uid'] = $userinfo['uid'];
$_SESSION['name'] = $userinfo['name'];
$_SESSION['userinfo'] = $userinfo;

//* 将用户数据保存到cookie中的一个简单方法 */
$secureKey = 'imooc'; //加密密钥
$str = serialize($userinfo); //将用户信息序列化
//用户信息加密前
$str = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($secureKey), $str, MCRYPT_MODE_ECB));
var_dump($str);exit;
//用户信息加密后
//将加密后的用户数据存储到cookie中
setcookie('userinfo', $str);

//当需要使用时进行解密
$str = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($secureKey), base64_decode($str), MCRYPT_MODE_ECB);
$uinfo = unserialize($str);
echo "解密后的用户信息：<br>";
print_r($uinfo);