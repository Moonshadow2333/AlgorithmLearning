<?php

namespace Algorithm\AVL;

class StrComparable implements Comparable
{
    public function compareTo($a, $b): int
    {
        return strcmp($a, $b);
    }
}