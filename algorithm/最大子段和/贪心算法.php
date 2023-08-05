<?php
    // 这里写一个贪心算法；
    function a($arr,$len){
        $sum = $arr[0];
        $maxx = $arr[0];
        for($i=1;$i<=$len;$i++){
            if($sum<=0){
                $sum = 0;
            }
            $sum += $arr[$i];

            $maxx = max($sum,$maxx);
            
        }
        return $maxx;
    }
    
    $arr = array();
    for($i=0;$i<=2000000;$i++){
        $a = rand(-100,100);
        $arr[] = $a;
    }
    // $arr = array(2,-4,3,-1,2,-4,3);
    $len = count($arr)-1;
    $r = a($arr,$len);
    echo $r;