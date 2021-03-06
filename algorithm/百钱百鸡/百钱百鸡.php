<?php
    // 百钱百鸡问题；
    // 公鸡一只5元，母鸡一只三元，小鸡一元三只；
    // 现在要用一百元买一百只鸡，每只鸡最少一只，问公鸡，母鸡，小鸡各多少只？

    // 5*公鸡 + 3*母鸡 + 1/3*小鸡 = 100；
    // 公鸡 + 母鸡 + 小鸡 =100；
    // 小鸡%3 == 0；
    // 公鸡>0，母鸡>0，小鸡>0;其实这里还隐藏了一个条件，即公鸡的数量是小于等于100的，母鸡，小鸡同理；

    // 枚举变量：
    // 公鸡，母鸡，小鸡；

    // 枚举范围：
    // 公鸡：1-100，母鸡：1-100，小鸡：1-100；

    // 判断条件：
    // 5*公鸡 + 3*母鸡 + 1/3*小鸡 = 100；
    // 公鸡 + 母鸡 + 小鸡 =100；
    // 小鸡%3 == 0；

    for($i=1;$i<=100;$i++){
        for($j=1;$j<=100;$j++){
            for($k=1;$k<=100;$k++){
                if(5*$i+3*$j+1/3*$k==100 && $i+$j+$k==100 && $k%3 == 0){
                    echo '公鸡'.$i.'只<br/>';
                    echo '母鸡'.$j.'只<br/>';
                    echo '小鸡'.$k.'只<br/>';
                    echo '<br/>';
                }
            }
        }
    }