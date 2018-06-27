<?php
    // php数据类型有整型、浮点型、字符串、数组、布尔类型（true和TRUE含义一样）
    echo $m1 = memory_get_usage(); // 初始化消耗的内存
    echo "<br />";
    $var_string = "123"; // 字符串类型
    echo $m2 = memory_get_usage()-$m1; // 字符串消耗的内存
    echo "<br />";
    $n = 123; // 整型
    echo $m3 = memory_get_usage()-$m1-$m2; // 整型消耗的内存
    echo "<br />";
    $f = 123.00; // 浮点型
    echo $m4 = memory_get_usage()-$m1-$m2-$m3; // 浮点型消耗的内存
    echo "<br />";
    $var_array = array("123"); // 数组
    echo $m5 = memory_get_usage()-$m1-$m2-$m3-$m4; // 数组消耗的内存

    // 整型中的十进制、负数、八进制、十六进制
    $data_int1 = 123; // 十进制数
    $data_int2 =  -123; // 负数
    $data_int3 = 0123; // 八进制数，等于十进制数的83 1*8*8+2*8+3
    $data_int4 = 0x123; // 十六进制数，等于十进制数的291 1*16*16+2*16+3

    // 浮点数，大小写的e等价
    $num_float1 = 1.234;  // 小数点
    $num_float2 = 1.2e3; // 科学计数法，小写的e 1.2*10*10*10
    $num_float3 = 7.0E-3; // 科学计数法，大写的E 7.0/(10*10*10)

    // 字符串包含引号处理办法
    $str_string1 = '甲问："你在哪里学的PHP？"'; // 甲问："你在哪里学的PHP？"
    $str_string2 = "乙毫不犹豫地回答：'当然是慕课网咯！'"; // 乙毫不犹豫地回答：'当然是慕课网咯！'
    $str_string3 = '甲问:\'能告诉我网址吗？\''; // 甲问:'能告诉我网址吗？'
    $str_string4 = "乙答道:\"www.imooc.com\""; // 乙答道:"www.imooc.com"

    // 单双引号遇到美元
    $love = "I love you!";
    $string1 = "慕课网,$love"; // 慕课网,I love you!
    $string2 = '慕课网,$love'; // 慕课网,$love

    // 过长字符串,Heredoc结构形式,<<<定界符，GOD标志符结尾处的标识符也必须是一样的。
    //在结尾的一行，一定要另起一行，并且此行除了“GOD”，并以“；”号结束之外，不能有任何其他字符，前后都不能有，包括空格，否则会出现错误。
    $string1 = <<<GOD
    我有一只小毛驴，我从来也不骑。
    有一天我心血来潮，骑着去赶集。
    我手里拿着小皮鞭，我心里正得意。
    不知怎么哗啦啦啦啦，我摔了一身泥.
GOD;
    echo $string1;

    // 资源（resource）：资源是由专门的函数来建立和使用的，例如打开文件、数据连接、图形画布。
    //我们可以对资源进行操作（创建、使用和释放）。任何资源，在不需要的时候应该被及时释放。
    //如果我们忘记了释放资源，系统自动启用垃圾回收机制，在页面执行完毕后回收资源，以避免内存被消耗殆尽。
    $file=fopen("phpinfo.php","r");   //打开文件
    $con=mysqli_connect("localhost","root","root");  //连接数据库
    $img=imagecreate(100,100);//图形画布
    //首先采用“fopen”函数打开文件，得到返回值的就是资源类型。
    $file_handle = fopen("phpinfo.php","r");
    if ($file_handle){
        //接着采用while循环（后面语言结构语句中的循环结构会详细介绍）一行行地读取文件，然后输出每行的文字
        while (!feof($file_handle)) { //判断是否到最后一行
            $line = fgets($file_handle); //读取一行文本
            echo $line; //输出一行文本
            echo "<br />"; //换行
        }
    }
    fclose($file_handle);//关闭文件

    // 空类型 NULL 不区分大小写
    // null只有一个取值，表示一个变量没有值，当被赋值为null，或者尚未赋值，或者unset，变量被认为是null。
    error_reporting(0); //禁止显示PHP警告提示
    $var;
    var_dump($var);
    $var1 = null;
    var_dump($var1);
    $var2 = NULL;
    var_dump( $var2);
    $var3 = "节日快乐！";
    unset($var3); // 释放$var3
    var_dump($var3);

    // 数组和对象


?>