<?php

namespace Algorithm\DynamicArray;

class CustomStack
{
    protected $stack;
    protected $capacity;
    /**
    * @param Integer $maxSize
    */
    public function __construct($maxSize)
    {
        $this->capacity = $maxSize;
        $this->stack = [];
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
        return array_pop($this->stack);
    }

    /**
    * @param Integer $k
    * @param Integer $val
    * @return NULL
    */
    public function increment($k, $val)
    {
        $endIndex = $k >= $this->getSize() ? $this->getSize() : $k;
        for ($i = 0; $i < $endIndex; $i ++) {
            $this->stack[$i] = $this->stack[$i] + (int)$val;
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
