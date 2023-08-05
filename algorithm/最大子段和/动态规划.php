<?php
    // 这里用动态规划求最大字段和
    // 算法步骤：
    // 1.确定初始条件f[1] = a[1];
    // 2.动态规划操作：f[i] = max(f[i-1] + a[i],a[i])(2<=i<=n);
    // 3.求ans: Answer = max(f[i] 1<=i<=n);

    function a($arr){
        $len = count($arr) - 1;
        // 1.确定初始条件f[1] = a[1];
        $f = array();
        $f[0] = $arr[0];
        // 2.动态规划操作：f[i] = max(f[i-1] + a[i],a[i])(2<=i<=n);
        for($i=1;$i<=$len;$i++){
            $f[$i] = max($f[$i-1]+$arr[$i],$arr[$i]);
        }
        // 3.求ans: Answer = max(f[i] 1<=i<=n);
        $re = max($f);
        return $re;
    }

    // $arr = array(2,-4,3,-1,2,-4,3);
    $arr = array();
    for($i=0;$i<=2000000;$i++){
        $a = rand(-100,100);
        $arr[] = $a;
    }
    $r = a($arr);
    echo $r;