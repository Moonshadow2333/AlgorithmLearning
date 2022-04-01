<?php
    // 枚举变量：
    // 公鸡，母鸡，小鸡；

    // 原枚举范围：
    // 公鸡：1-100，母鸡：1-100，小鸡：1-100；

    // 优化后的枚举范围；
    // 公鸡：1-18，母鸡：1-32，小鸡：1-98。
    // 判断条件：
    // 5*公鸡 + 3*母鸡 + 1/3*小鸡 = 100；
    // 公鸡 + 母鸡 + 小鸡 =100；
    // 小鸡%3 == 0；

    // 减小枚举变量；（可以不用枚举小鸡了）
    // 公鸡：x, 母鸡：y, 小鸡：z。
    // z = 100 - x - y;

    // 新的枚举范围：
    // 公鸡：1-18，母鸡：1-32；

    // 新的判断条件：
    // 5*公鸡 + 3*母鸡 + 1/3*小鸡 = 100；
    // 小鸡%3 == 0；
    $z = '';
    for($i=1;$i<=18;$i++){
        for($j=1;$j<=32;$j++){
            $z = 100 - $i - $j;   
            if(5*$i+3*$j+1/3*$z==100 && $z%3 == 0){
                echo '公鸡'.$i.'只<br/>';
                echo '母鸡'.$j.'只<br/>';
                echo '小鸡'.$z.'只<br/>';
                echo '<br/>';
            }
        }
    }