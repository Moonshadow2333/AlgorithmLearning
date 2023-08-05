<?php

class LinearSearch
{
    private function __construct()
    {
    }
    public static function search(array $data, int $target){
        for($i = 0; $i<count($data); $i++){
            if ($data[$i] == $target) {
                return $i;
            }
        }
        return -1;
    }
}

$data = [2,3,62,29];

$re = LinearSearch::search($data, 62);
var_dump($re);

$re1 = LinearSearch::search($data, 666);
var_dump($re1);