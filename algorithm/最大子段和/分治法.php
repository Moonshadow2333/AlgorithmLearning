<?php
    // 这里用分治实现
    function find($l,$r,$arr){
        // 终止条件；
        if($l == $r){
            return $arr[$l];
        }else{
            $mid = intval(($l + $r)/2);

            // echo $mid.'<br/>';
            // echo $l.'<br/>';
            // echo $r.'<br/>';
            // 1、计算第二种跨越mid情况的序列的最大和
            // a.求以mid为尾的子序列和
            $sum1 = 0;
            $Lset = array();
            for($k=$mid;$k>=$l;$k--){
                $sum1 = $sum1 + $arr[$k];
                $Lset[] = $sum1;
            } 
            $maxx1 = max($Lset);
            // $Larr = array_slice($arr,0,$mid+1);
            // b.求以mid为头的子序列和
            $sum2 = 0;
            $Rset = array();
            $Rarr = array();
            for($k=$mid;$k<=$r;$k++){
                $sum2 = $sum2 + $arr[$k];
                $Rset[] = $sum2;
                // $Rarr[] = $arr[$k];
            } 
            // var_dump($Larr);
            // echo '<hr/>';
            // var_dump($Rarr);
            // echo '<hr/>';
            $maxx2 = max($Rset);
            $midMax = $maxx1 + $maxx2 - $arr[$mid];
            // echo $midMax;exit;
            // 2、比较方式1、2、3的最大值
            // return max(max(find(0,$mid,$Larr),find($mid+1,count($Rarr)-1,$Rarr)),$midMax);
            $Lmax = find(0,$mid,$arr);
            $Rmax = find($mid+1,count($arr)-1,$arr);
            return max(max($Lmax,$Rmax),$midMax);
            
        }
    }

    $arr = array(2,-4,3,-1,2,-4,3);
    $r = find(0,count($arr)-1,$arr);
    echo $r;

    // $a = (1+4)/2;
    // echo intval($a);
    // $mid = intval(0+count($arr)-1)/2;
    // // echo $mid;exit;
    // $Larr = array_slice($arr,0,$mid+1);
    // var_dump($Larr);