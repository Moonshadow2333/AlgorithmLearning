<?php
    // 这里写一个快速排序法
    // 递归实现：
    // 终止条件：当数组只有一个元素时终止递归。
    // 递推表达式：用一个数组的第一个元素分割这个数组，这个元素记作$mid；
    // 把数组中小于$mid的元素放在左边；
    // 把数组中大于$mid的元素放在右边；
    // 合并左边，中间，右边 三个数组；
    // (1,64,32,-3,3,34,53);

    function a($arr){
        $len = count($arr) - 1;
        if($len<=1){
            return $arr;
        }
        $mid = $arr[0];
        $l_arr = array();
        $r_arr = array();
        for($i=1;$i<=$len;$i++){
            if($mid>$arr[$i]){
                $l_arr[] = $arr[$i]; 
            }else{
                $r_arr[] = $arr[$i];
            }
        }
        $l_arr = a($l_arr);
        $r_arr = a($r_arr);
        return array_merge($l_arr,array($mid),$r_arr);
    }

    $arr = array(1,64,32,-3,3,3,3,34,53);
    // $arr = array();
    // for($i=0;$i<=200000;$i++){
    //     $num = rand(-10000000,1000000000);
    //     $arr[] = $num;
    // }
    $r = a($arr);
    var_dump($r);