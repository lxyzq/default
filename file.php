<?php
$content = file_get_contents('./file.php'); // 将整个文件读取到一个字符串中
echo $content;
$content = file_get_contents('./file.php',null,null,10,50);
echo $content;
//php也提供了类似C语言操作文件的方法，使用fopen,fgets,fread等方法,fgets可以从文件指针中读取一行，freads可以读取指定长度的字符串。
$fp = fopen('./file.php','rb'); // 打开文件
while(!feof($fp)){
    echo fgets($fp); // 读取一行
}
fclose($fp); // 关闭文件指针，避免文件句柄被占用
$fp = fopen('./file.php','rb');
$contents = '';
while(!feof($fp)){
    $contents .= fread($fp,4096); // 一次读取4096个字符
}
fclose($fp);

$filename = './404.html';
if(file_exists($filename)){ // 判断文件是否存在，不仅可以判断文件是否存在还可以判断目录是否存在
    echo file_get_contents($filename); // 获取文件内容
}
if(is_file($filename)){ // 判断给定的路径是否是一个文件
    echo file_get_contents($filename);
}
if(is_writable($filename)){ // 在文件是否存在的基础上判断文件是否可写
    file_put_contents($filename,'test'); // 写入内容到文件，当$data是数组的时候，会自动的将数组连接起来，相当于$data=implode('', $data);
}
if(is_readable($filename)){ // 在文件是否存在的基础上判断文件是否可读
    echo file_get_contents($filename);
}
$filename = './404.html';
echo '所有者：'.fileowner($filename).'<br>';
echo '创建时间：'.filectime($filename).'<br>';
echo '修改时间：'.filemtime($filename).'<br>';
echo '最后访问时间：'.fileatime($filename).'<br>';

//给$mtime赋值为文件的修改时间
$mtime = filemtime($filename);
echo '修改时间：'.date('Y-m-d H:i:s', $mtime);
//通过计算时间差 来判断文件内容是否有效
if (time() - $mtime > 3600) { // 60*60 一个小时的有效期
    echo '<br>缓存已过期';
} else {
    echo file_get_contents($filename);
}
echo "<br/>";
$filename = 'file.php';
//取得文件的大小并输出
$size = filesize($filename); // 获取文件的大小，字节数表示
echo $size;
function getsize($size,$format = 'kb'){
    $p = 0;
    if($format == 'kb'){
        $p = 1;
    } elseif($format == 'mb'){
        $p = 2;
    } elseif($format == 'gb'){
        $p = 3;
    }
    $size /= pow(1024, $p);
    return number_format($size, 3);
}
echo '<br/>';
$size = getsize($size,'kb'); // 进行单位转换
echo $size.'kb';
// 没法通过简单的函数来取得目录的大小，目录的大小是该目录下所有子目录以及文件大小的总和，因此需要通过递归的方法来循环计算目录的大小。

// php也支持类似C语言的文件写入方式
$fp = fopen('404.html','w');
fwrite($fp,'hello');
fwrite($fp,'world');
fclose($fp);
$delfile = 'hello.txt';
//unlink($delfile); // 文件的删除
//rmdir($dir); // 文件夹的删除，文件夹必须为空，如果不为空或者没有权限则会提示失败。
// 若文件夹中存在文件，可以先循环删除目录中的所有文件，然后再删除该目录，循环删除可以使用glob函数遍历所有的文件。
foreach (glob("*") as $filename) {
    unlink($filename);
}