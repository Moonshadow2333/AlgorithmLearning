<?php
    // 这里用分治实现
    function find($l,$r,$arr){
        // 终止条件；
        // echo $r;
        // echo '<br/>';
        if($l === $r){
            return $arr[$l];
        }else{
            $mid = intval(($l + $r)/2);
            $sum1 = 0;
            $Lset = array();
            for($k=$mid;$k>=$l;$k--){
                $sum1 = $sum1 + $arr[$k];
                $Lset[] = $sum1;
            } 
            $maxx1 = max($Lset);

            $sum2 = 0;
            $Rset = array();
            for($k=$mid;$k<=$r;$k++){
                $sum2 = $sum2 + $arr[$k];
                $Rset[] = $sum2;
            } 
            $maxx2 = max($Rset);
            $midMax = $maxx1 + $maxx2 - $mid;

            $Lmax = find($l,$mid,$arr);
            $Rmax = find($mid+1,count($arr)-1,$arr);
            return max(max($Lmax,$Rmax),$midMax);
            
        }
    }

    // $arr = array(2,-4,3,-1,2,-4,3);
    $arr = array(2,-5,4,3,-2,5);
    // $arr = array();
    // for($i=0;$i<20;$i++){
    //     $num = rand(-10,10);
    //     $arr[] = $num;
    // }
    // var_dump($arr);exit;
    $r = find(0,count($arr)-1,$arr);
    echo $r;
