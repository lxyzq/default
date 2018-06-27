<?php
// 异常处理通过throw抛出，抛出后，异常会中断程序执行，后面的代码将不会再被执行
// try使用异常号车应位于try代码块内，如果没有触发异常，则代码将照常执行。如果异常被触发，会抛出一个异常。每一个throw必须对应至少一个catch，也可以对一个多个catch
try{
   // 可能出现错误或异常的代码
}catch(Exception $e){ // catch表示捕获，Exception是php已定义好的异常类，catch代码会捕获异常，并创建一个异常信息的对象。
    // 对异常处理 1、自己处理 2、不处理，将其再次抛出
}
// 创建一个可抛出异常的函数
function checkNum($number){
    if($number > 1){
        throw new Exception('异常提示-数字必须小于或等于1');
    }
    return true;
}
// 在try代码中触发异常
try{
    checkNum(2);
    // 如果异常被抛出，则下面一行代码将不会被输出
    echo '如果能看到这个提示，说明你的数字小于或等于1';
}catch(Exception $e){
    // 捕获异常
    echo '捕获异常:'.$e->getMessage();
}
// php具有很多异常处理类，其中exception是所有异常处理的基类。
// Exception具有几个基本的属性和方法，其中包括：message 异常消息内容 code 异常代码 file 抛出异常的文件名 line 抛出异常在该文件中的行数
// 常用的方法：getTrace 获取异常追踪信息 getTraceAsString获取异常追踪信息的的字符串 getMessage 获取出错信息
// 如果有必要可以通过继承Exception类来建立自定的异常处理类
class MyException extends Exception{
    function getInfo(){
        return '自定义错误信息';
    }
}
try{
    throw new MyException('error');
}catch (Exception $e){
    echo $e->getInfo(); // 获取自定义的异常信息
    echo $e->getMessage(); // 获取继承自基类的getMessage信息
}
// 在实际应用中，不会轻易抛出异常，只会在极端情况或者非常重要的情况下，才会抛出异常，可以保障程序的正确性与安全，避免不可预知的bug
try {
    throw new Exception('wrong');
} catch(Exception $ex) {
    echo 'Error:'.$ex->getMessage().'<br>';
    echo $ex->getTraceAsString().'<br>';
}
echo '异常处理后，继续执行其他代码';
echo '<br/>';
try {
    throw new Exception('wrong');
} catch(Exception $ex) {
    $msg = 'Code:'.$ex->getCode()."\n";
    $msg.= 'Error:'.$ex->getMessage()."\n";
    $msg.= $ex->getTraceAsString()."\n";
    $msg.= '异常行号：'.$ex->getLine()."\n";
    $msg.= '所在文件：'.$ex->getFile()."\n";
    //将异常信息记录到日志中PHP异常处理之
    file_put_contents('error.log', $msg);
}