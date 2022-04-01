<?php

function f($x, $y, $num=2)
{
    if ($num>$x || $num >$y) {
        return 1;
    }
    if($x%$num==0 && $y%$num==0){
        return $num * f($x/$num, $y/$num, $num);
    }else{
        $num++;
        return f($x, $y, $num);
    }
}
echo f(18,22);