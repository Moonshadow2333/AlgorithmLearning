<?php

echo '<pre/>';
/*
    1.功能：返回最大价值。
    2. 参数：
        2.1 参数1：存储物品的二维数组。形如：['obj'=>['value'=> num, 'weight'=>num]];
        2.2 参数2：存储背包的一维数组
        形如：[1,2,3,4]
        2.3 参数3：
        2.4 参数4：
*/
function dynamic($things, $bags)
{
    $rows = count($things);
    $cols = count($bags);
    $results = [];
    // 初始化表格，。
    for ($i=0;$i<=$rows;$i++) {
        for ($j=0;$j<=$cols;$j++) {
            $results[$i][$j] = 0;
        }
    }
    // var_dump($results);
    // exit;
    $r = 1;
    foreach ($things as $thing => $v) {
        $c = 1;
        $weight = $v['weight'];
        // echo '<'.$weight.'><br/>';
        for ($i=0;$i<count($bags);$i++) {
            // echo '|'.$bags[$i].'|<br/>';
            if ($weight>$bags[$i]) {
                // 这个容量的袋子装不下该物品
                $results[$r][$c] = $results[$r-1][$c];
            } else {
                if ($results[$r-1][$c]>$results[$r][$c-$weight]+$v['value']) {
                    $results[$r][$c] = $results[$r-1][$c];
                } else {
                    $results[$r][$c] = $results[$r-1][$c-$weight]+$v['value'];
                }
            }
            $c = $c + 1;
        }
        $r = $r+1;
    }
    return $results;
}
$things = [
    'sound' => ['value'=>3000,'weight'=>4],
    'computer' => ['value'=>2000,'weight'=>3],
    'guitar' => ['value'=>1500,'weight'=>1],

];

$bags = [1,2,3,4];
$re = dynamic($things, $bags);
var_dump($re);
