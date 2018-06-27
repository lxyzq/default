<?php
/**
 * 数组，键值对，键相当于房间号，值相当于房间里存储的东西。
 * php数组分为索引数组和关联数组。
 *
 * 关联数组，键是字符串。
*/

// 索引数组，键是整数，并且从0开始。
$arr = array('苹果','香蕉','菠萝');
print_r($arr[0]);
for($i=0;$i<count($arr);$i++){
    print_r('<br/>'.$i.':'.$arr[$i]);
}
foreach ($arr as $k=>$v){
    print_r('<br/>'.$k.':'.$v);
}

// 关联数组，键是字符串。
$arr1 = [
    'apple' => '苹果',
    'banana' => '香蕉',
    'pineapple' => '菠萝'
];
print_r($arr1);
