<?php
    // 这里用动态规划求 方格3*3，右上最大值的问题
    echo '<pre>';
    $arr = array(
        array(3,14,12),
        array(6,7,5),
        array(20,9,8)
    );
    $r = a($arr);
    echo $r;
    function a($arr){
        // 二维数组中外层数组的长度；
        $lenX = count($arr) - 1;
        // 内层数组的长度；
        $lenY = count($arr[0]) - 1;
        $f = array(array());
        // 1.确定初始条件f[1][1] = a[1];
        $f[0][0] = $arr[0][0];
        // 2.确定状态转移方程：f[i][j] = max(f[i-1][j],f[i][j-1])+a[i][j](2<=i<=n);
        // i代表行，j代表列；
        // f[i-1][j]：表示向上走；f[i][j-1]：表示向右走；
        for($i=0;$i<=$lenX;$i++){
            for($j=0;$j<=$lenY;$j++){
                if($i==0 && $j==0){
                    continue;
                }elseif($i==0){
                    $f[$i][$j] = $f[$i][$j-1] + $arr[$i][$j];
                }elseif($j==0){
                    $f[$i][$j] = $f[$i-1][$j] + $arr[$i][$j];
                }else{
                    $f[$i][$j] = max($f[$i-1][$j],$f[$i][$j-1]) + $arr[$i][$j]; 
                }
            }
        }
        $max = array();
        foreach($f as $v){
            $max[] = max($v);
        }
        $max = max($max);
        return $max;
    }
    /*
        20 9 8
        6 7 5
        3 14 12
    */