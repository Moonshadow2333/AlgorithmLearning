<?php
    echo '<pre>';
    // 这里用枚举解决最大子段和的问题；
    // $arr = array(2,-4,3,-1,2,-4,3);
    $arr = array();
    for($i=0;$i<=1000;$i++){
        $a = rand(-100,100);
        $arr[] = $a;
    }

    // 枚举变量：起点，终点；
    // 枚举范围：起点：0-n-1,终点：起点-(n-1);
    // 判断条件：没有具体的判断条件，只需要求和得到的每一段的和，再求出最大值。

    // 算法思路：
    // 枚举每一段的起点和终点;
    // 对每一段求和,再找出最大值.

    $final = count($arr);
    // 枚举每一段的起点和终点;
    for($i=0;$i<$final;$i++){
        for($j=$i;$j<$final;$j++){
            // 对每一段求和,再找出最大值.
            $sum = 0;
            for($k=$i;$k<=$j;$k++){
                
                $sum = $sum + $arr[$k];
            }
            $set[] = $sum;
        }
    }

    // var_dump($set);
    $result = max($set);
    echo $result;