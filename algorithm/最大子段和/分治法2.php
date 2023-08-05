<?php
function find($l, $r, $arr)
{
    // 递归终止条件。
    if ($l === $r) {
        return $arr[$l];
    }
    // 跨越mid。
    $mid = intval(($l + $r)/2);
    $sum1 = 0;
    $Lset = $Rset = array();
    for ($i=$mid;$i>=$l;$i--) {
        $sum1 = $sum1 + $arr[$i];
        $Lset[] = $sum1;
    }
    $maxx1 = max($Lset);

    $sum2 = 0;
    for ($j=$mid;$j<=$r;$j++) {
        $sum2 = $sum2 + $arr[$j];
        $Rset[] = $sum2;
    }
    $maxx2 = max($Rset);
    $midMax = $maxx1 + $maxx2 - $arr[$mid];
    $Lmax = find($l, $mid, $arr);
    $Rmax = find($mid+1, $r, $arr);
    return max(max($Lmax, $Rmax), $midMax);
}

// $arr = array(2,-4,3,-1,2,-4,3);
    // $arr = array();
    // for($i=0;$i<20;$i++){
    //     $num = rand(-10,10);
    //     $arr[] = $num;
    // }
    // var_dump($arr);exit;
$arr = array(2,-5,4,3,-2,-5,1);

    $r = find(0, count($arr)-1, $arr);
    echo $r;
