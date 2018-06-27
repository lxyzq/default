<?php
/* 参考文档：https://github.com/phpredis/phpredis
 */
// redis的连接
$redis = new \Redis();
$redis->connect('127.0.0.1', 6379);
// Strings 缓存
$redis->delete('string1'); // 确保string1无值
$redis->set('string1', 'val1');
$val = $redis->get('string1'); // 获取string1的值
var_dump($val); // val1
$redis->set('string1', 4);
$redis->incr('string1',2);
$val = $redis->get('string1');
var_dump($val);
// Lists 异步 队列 先进先出 可重复 有序
$redis->delete('list1');
$redis->lPush('list1','A');
$redis->lPush('list1','B');
$redis->lPush('list1', 'C');
$redis->lPush('list1', 'C');
$val = $redis->rPop('list1');
var_dump($val);
// Sets 不可有相同元素 具体的数据存储，无序
$redis->delete('set1');
$redis->sAdd('set1', 'A');
$redis->sAdd('set1','B');
$redis->sAdd('set1', 'C');
$redis->sAdd('set1','C');
echo $redis->sCard('set1'); // 3
$val = $redis->sMembers('set1'); // 所有元素
var_dump($val);
// Hashs 汽车的各个属性 比较复杂的数据结构
$redis->delete('driver1');
$redis->hSet('driver1','name','lxy');
$redis->hSet('driver1', 'age', 25);
$redis->hSet('driver1', 'gender',1);
$val = $redis->hGet('driver1','name');
var_dump($val);
$val = $redis->hMGet('driver1', array('name','age'));
var_dump($val);
$val = $redis->hGetAll('driver1');
var_dump($val);
// Sorted sets 小朋友的排行榜 排序
$redis->delete('zset1');
$redis->zAdd('zset1',100,'zmc'); // rank2
$redis->zAdd('zset1',90, 'zq'); // rank 0
$redis->zAdd('zset1',98,'lxy'); // rank 1
$val = $redis->zRange('zset1',0,-1); // 由低到高
var_dump($val);
$val = $redis->zRevRange('zset1', 0, -1); // 由高到低
var_dump($val);
