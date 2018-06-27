<?php
    // phpinfo();
    //注意和警告都不会终止程序的运行，但是错误会终止程序的运行
    /*
    错误E_ERROR
    警告E_WARNING
    注意E_NOTICE
    */
    //所有的错误都输出除了注意
    error_reporting(E_ALL & ~E_NOTICE);
    error_reporting(E_ALL);
     
    //设置配置文件的值（临时）
    //ini_set("upload_max_filesize", 2000000000);
     
    //得到配置文件的值
    //ini_get("upload_max_filesize");
     
    //关闭错误报告的显示，一般在运行阶段使用
    ini_set("display_errors", "on");
    //将错误报告写入日志中
    ini_set("log_errors", "on");
    //日志的目录
    ini_set("error_log", "D:/error.log");
    gettype($var);  //注意
     
    gettype($var);    //警告
     
    //getype();    //错误，程序终止
     
    echo "############<br>";

    try{
        $file=@fopen("./hello.txt","r");
        if(!$file){
            throw new Exception("文件打开失败");
        }
        echo "2222222222<br>";
    }catch(Exception $e){
        echo "3333333<br>";
        echo $e->getMessage()."<br>";
        echo $e->getCode();
        touch("hello.txt");
        $file=@fopen("./hello.txt","r"); 
    }

    // 抛出异常未捕获报错
    /*$error = 'Always throw this error';  
    throw new Exception($error);  
    // 继续执行  
    echo 'Hello World'; */

    $num = 0;
    try{
        echo 1/$num;
    }catch(Exception $e){
        var_dump("expression");exit;
        echo $e->getMessage();
    }

    


