<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/26
 * Time: 8:37
 */
function sheng($n,$m){
    $arr=range(1,$n);
    $array=[];
    $i=0;
    $k=0;
    while(count($arr)>1){
        if (!isset($arr[$i])){
            $arr=$array;
            $array=[];
            $i=0;
        }
        $k++;
        if ($k==$m){
            unset($arr[$i]);
            $k=0;
        }else{
            $array[]=$arr[$i];
        }
        $i++;
    }
    return $array;
}
print_r(sheng(6,3));
echo "<br>";
function he($arr){
    rsort($arr);
    $array=[
      [array_shift($arr)],
      [array_shift($arr)],
      [array_shift($arr)],
    ];
    $count=count($arr);
    $sum=0;
    for ($i=0;$i<$count;$i++){
        $array[2][]=$arr[$i];
        $sum=array_sum($array[2]);
        if ($sum>array_sum($array[0])){
            $array=[
              $array[2],
              $array[0],
              $array[1]
            ];
        }else if ($sum>array_sum($array[0])){
            $array=[
                $array[0],
                $array[2],
                $array[1]
            ];
        }
    }
    return $array;
}
echo "<pre>";
print_r(he([53,25,12,35,17,6,8]));
echo "<br>";
function da($arr,$pow=0){
    $t=[];
    $tt=[];
    static $return=[];
    for ($i=0;$i<10;$i++){
        $t[]=[];
        $tt=[];
    }
    $count=count($arr);
    for ($i=0;$i<$count;$i++){
        $str=(string)$arr[$i];
        if (isset($str[$pow])){
            $t[$str[$pow]][]=$arr[$i];
        }else{
            $tt[$str[$pow-1]][]=$arr[$i];
        }
    }
    for ($j=0;$j<10;$j++){
        if (count($t[$j])==1){
            $return[]=array_pop($t[$j]);
        }else if (count($t[$j])>1){
            da($t[$j],$pow+1);
        }
        if (isset($tt[$j])){
            $return[]=$tt[$j];
        }
    }
    return $return;
}
print_r(da([32,321,3]));
echo "<br>";

//$active_time =  [9.01, 9.10, 9.20, 9.21, 9.22];
//	$process_time = [0.30, 0.18, 0.22, 0.47, 0.11];

function bank($active_time,$process_time){
    $count=count($active_time);
    $window=[];
    for ($i=0;$i<$count;$i++){
        if (count($window)<4){
            $window[]=$active_time[$i]+$process_time[$i];
            continue;
        }
        sort($window);
        $now_time=array_shift($window);
        if ($now_time>$active_time[$i]){
            $wait_time=$now_time-$active_time[$i];
            $window[]=$now_time+$process_time[$i];
        }else{
            $window[]=$active_time[$i]+$process_time[$i];
        }
    }
    return $wait_time/$count;
}
echo bank([9.01, 9.10, 9.20, 9.21, 9.22],[0.30, 0.18, 0.22, 0.47, 0.11]);