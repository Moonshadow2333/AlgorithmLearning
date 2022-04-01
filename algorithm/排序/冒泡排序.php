<?php
    // (1,64,32,-3,3,34,53);
    // 可不可以理解为枚举啊?
    // 以下是枚举的思路；
    // 枚举变量：比较数，被比较数；
    // 枚举范围：比较数：n个，
    // 判断条件：可以说没有
    // 测试:2万个数据可以跑完;20万个数据跑不完;
    // 但是ksrot()函数可以跑完20万个数据;
    function a($arr,$len){
        for($i=0;$i<=$len-1;$i++){
            for($j=$i+1;$j<=$len;$j++){
                if($arr[$i]>$arr[$j]){
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
        }
        return $arr;
    }
    
    // $arr = array(1,64,32,-3,3,34,53,-2,-3);
    $arr = array();
    for($i=0;$i<=20000;$i++){
        $num = rand(-100,100);
        $arr[] = $num;
    }
    // var_dump($arr);exit;
    $len = count($arr) - 1;
    $re = a($arr,$len);
    var_dump($re);
    // 
    // $arr = array(2,4,3);
    // $temp = $arr[0];
    // $arr[0] = $arr[2];
    // $arr[2] = $temp;
    // var_dump($arr);
    // echo '<hr/>';
    // $r = asort($arr);
    // var_dump($r);返回一个布尔值；
    // var_dump($arr);
