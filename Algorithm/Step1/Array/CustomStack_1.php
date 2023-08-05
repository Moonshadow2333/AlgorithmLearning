<?php

namespace Algorithm\DynamicArray;

class CustomStack_1
{
    protected $stack;
    protected $capacity;
    protected $add;
    /**
    * @param Integer $maxSize
    */
    public function __construct($maxSize)
    {
        $this->capacity = $maxSize;
        $this->stack = [];
        $this->add = array_fill(0, 1000, 0);
    }

    /**
    * @param Integer $x
    * @return NULL
    */
    public function push($x)
    {
        if ($this->getSize() == $this->capacity) {
            return NULL;
        }
        array_push($this->stack, $x);
    }

    /**
    * @return Integer
    */
    public function pop()
    {
        if ($this->isEmpty()) {
            return -1;
        }
        $n = $this->getSize();
        $ret = array_pop($this->stack) + $this->add[$n - 1];
        if ($n -2 >= 0) {
            $this->add[$n - 2] += $this->add[$n - 1];
        }
        $this->add[$n - 1] = 0;
        return $ret;
    }

    /**
    * @param Integer $k
    * @param Integer $val
    * @return NULL
    */
    public function increment($k, $val)
    {
        $limit = $k >= $this->getSize() ? $this->getSize() : $k;
        if ($limit -1 >= 0) {
            $this->add[$limit - 1] += (int)$val; 
        }
    }

    protected function getSize()
    {
        return count($this->stack);
    }

    protected function isEmpty()
    {
        return $this->getSize() == 0;
    }
}

/**
* Your CustomStack object will be instantiated and called as such:
* $obj = CustomStack($maxSize);
* $obj->push($x);
* $ret_2 = $obj->pop();
* $obj->increment($k, $val);
*/
