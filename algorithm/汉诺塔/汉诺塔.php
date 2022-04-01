<?php
function hanoi($n, $x, $y, $z)
{
    if ($n==1) {
        move($x, 1, $z);
    } else {
        hanoi($n-1, $x, $z, $y);
        move($x, $n, $z);
        hanoi($n-1, $y, $x, $z);
    }
}
function move($x, $n, $z)
{
    echo 'move disk '.$n.' from '.$x.' to '.$z.'<br>';
}
hanoi(5, 'x', 'y', 'z');
