<?php
// 顺序结构
$shoesPrice = 49; //鞋子单价
$shoesNum = 1; //鞋子数量
$shoesMoney = $shoesPrice * $shoesNum;
$shirtPrice = 99; //衬衣单价
$shirtNum = 2; //衬衣数量
$shirtMoney = $shirtPrice * $shirtNum;
$orderMoney = $shoesMoney +$shirtMoney;
echo $orderMoney ;

// 条件结构 if...else
date_default_timezone_set('Asia/ShangHai');
$today = date('m-d',time());//获取当天日期
$birthday = "02-14";//生日
$money = 238;//消费金额
$discount = 0.8;//八折优惠
if($today == $birthday){
    $money = $money * $discount;
}else{
    $money = $money * 1;
}
echo $money;

// 条件结构 if...else if
$totalMoney = 0;//总工资
$basicMoney =  2000;//基本工资
$sex = "男";
if($sex == "男"){
    $totalMoney = $basicMoney  + 0;// 男的没奖金
}else if($sex == "女"){
    $totalMoney = $basicMoney  + 300;// 女的有奖金300元
}
echo $totalMoney;

// 条件结构之if...elseif...else
date_default_timezone_set('asia/shanghai');
$week = date("w");//获取当天星期几
$info = "";//提示信息
if($week == 1){
    $info = "上午有课";
}elseif($week == 3){
    $info = "下午有课";
}else{
    $info = "今天没课";
}
echo $info; //输出提示信息

// 条件嵌套
$totalMoney = 0;//总工资
$basicMoney =  300;//基本工资
$sex = "男";
$noHouse = TRUE; //是否有房
$houseMoney =  150;//住房补贴
$isPregnancy = TRUE; //是否怀孕
$pregnancyMoney =  100;//怀孕补贴
if($sex=="男")
{
    $totalMoney = $basicMoney  + 0;// 男的没奖金
    if($noHouse)
    {
        $totalMoney = $totalMoney  + $houseMoney;
    }
}
elseif($sex=="女")
{
    $totalMoney = $basicMoney  + 300;// 女的有奖金300元
    if($isPregnancy)
    {
        $totalMoney = $totalMoney  + $pregnancyMoney;
    }
}
echo $totalMoney;

// 条件结构之switch...case
$num = rand(1,50);//获取1至50的随机数
$info = "";//提示信息
switch($num){
    case 1:
        $info = "恭喜你！中了一等奖！";
        break;
    case 2:
        $info = "恭喜你！中了二等奖！";
        break;
    case 3:
        $info = "恭喜你！中了三等奖！";
        break;
    default:
        $info = "很遗憾！你没有中奖！";
}
echo $info; //输出是否中奖

// break的重要性
//A例子
$num = 2;
$sum  = 10;
switch($num){
    case 1:
        $sum = $sum  + 10;
        break;
    case 2:
        $sum = $sum  + 10;
        break;
    case 3:
        $sum = $sum  + 10;
        break;
    default:
        $sum = $sum  + 10;
}
echo "A例子的值是：".$sum."<br />"; // 20
//B例子
$num = 2;
$sum  = 10;
switch($num){
    case 1:
        $sum = $sum  + 10;
    case 2:
        $sum = $sum  + 10;
    case 3:
        $sum = $sum  + 10;
    default:
        $sum = $sum  + 10;
}
echo "B例子的值是：".$sum."<br />"; // 40

// 循环结构之while循环
//首先判断某个条件是否符合（条件返回值是否为TRUE），若符合则执行任务，执行完毕任务，再判断条件是否满足要求，符合则重复执行此任务，否则结束任务。
$sum = 12;//小宠物当前的饥饿程度
echo "我饿啦:-(";
echo "<br />";
while($sum<100){//小宠物的饥饿程度到100，表示小宠物吃饱啦,不用继续喂了，没吃饱继续喂食
    $num = rand(1,20);//随机数，模拟喂食小宠物的小面包
    $sum = $sum + $num; //小宠物吃小面包
    echo "我还没吃饱呢！";
    echo "<br />";
}
echo "终于吃饱啦^_^";

// 循环结构之do...while
// 首先执行任务（上一节的while语句是先判断条件是否成立，再执行任务），执行任务完毕，判断某个条件是否符合（条件返回值是否为TRUE），若符合则再次执行任务，执行完毕任务，继续判定条件。
$i =  1 ; //从第1圈开始跑
do{  //跑10圈
    echo "在跑第".$i."圈。";
    $i++;
}while($i<=10);

// while与do…while循环语句的区别是，while先判断条件是否成立，后执行循环，do...while先执行一次任务，再判断是否继续执行循环，也就是说do...while至少会执行一次任务。当条件为FALSE时，while中的任务会一次也不执行，do...while中的任务会执行1次。
//A例子
$num = 2;
$sum  = 10;
while($num>3){
    $sum = $sum  + 10;
}
echo "A例子的结果：".$sum."<br />"; // 10
//B例子
$num = 2;
$sum  = 10;
do{
    $sum = $sum  + 10;
}while($num>3);
echo "B例子的结果：".$sum."<br />"; // 20

//while和do...while可以根据具体情况选用。假设有一种棋类游戏，首先掷骰子，若不为6，前进骰子的点数的步长；若为6，前进骰子的点数的步长，并可以再掷一次。
//while例子
$sum  = 0;
$num = rand(1,6); //获取1至6的随机数，模拟掷骰子
$sum = $sum  + $num;//前进步长
while($sum==6){
    $num = rand(1,6);//获取1至6的随机数，模拟掷骰子
    $sum = $sum  + $num;//前进步长
};
echo "while例子执行完毕，前进：".$sum ."<br />";
//do...while例子
$sum  = 0;
do{
    $num = rand(1,6);//获取1至6的随机数，模拟掷骰子
    $sum = $sum  + $num;//前进步长
}while($num==6);
echo "do...while例子执行完毕，前进：".$sum ."<br />";

//for循环计算1到100之和
//for语句写法
for($i=1,$sum=0;$i<=100;$i++){
    $sum = $sum + $i; //	累加求和
}
echo "for语句的运行结果：".$sum."<br />" ;
//while语句写法
$i =  1 ; // 从1开始累加
$sum = 0; //初始化和为0
while($i<=100){  //判断是否小于100
    $sum = $sum + $i; //	累加求和
    $i++; //递增1
}
echo "while语句的运行结果：".$sum."<br />" ;

// foreach循环
$students = array(
    '2010'=>'令狐冲',
    '2011'=>'林平之',
    '2012'=>'曲洋',
    '2013'=>'任盈盈',
    '2014'=>'向问天',
    '2015'=>'任我行',
    '2016'=>'冲虚',
    '2017'=>'方正',
    '2018'=>'岳不群',
    '2019'=>'宁中则',
);//10个学生的学号和姓名，用数组存储
//使用循环结构遍历数组,获取学号和姓名
foreach($students as $v){
    echo $v;//输出（打印）姓名
    echo "<br />";
}
foreach($students as $k=>$v){
    echo $k.' '.$v;
}

//循环嵌套
$students = array(
    '2010'=>array('令狐冲',"59"),
    '2011'=>array('林平之',"44"),
    '2012'=>array('曲洋',"89"),
    '2013'=>array('任盈盈',"92"),
    '2014'=>array('向问天',"93"),
    '2015'=>array('任我行',"87"),
    '2016'=>array('冲虚',"58"),
    '2017'=>array('方正',"74"),
    '2018'=>array('岳不群',"91"),
    '2019'=>array('宁中则',"90"),
);//10个学生的学号、姓名、分数，用数组存储

foreach($students as $key=>$val)
{ //使用循环结构遍历数组,获取学号
    echo $key; //输出学号
    echo ":";
    //循环输出姓名和分数
    foreach($val as $v)
    {
        echo $v;
    }
    echo "<br />";
}