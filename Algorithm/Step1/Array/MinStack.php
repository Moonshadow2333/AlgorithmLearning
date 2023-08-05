<?php

namespace Algorithm\DynamicArray;

class MinStack {
    /**
     */
    protected $stack;
    function __construct() {
        $this->stack = [];
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val) {
        array_push($this->stack, $val);
    }

    /**
     * @return NULL
     */
    function pop() {
       array_pop($this->stack);
    }

    /**
     * @return Integer
     */
    function top() {
        if ($this->isEmpty()) {
            throw new \Exception('Cannot get top e from an empty stack');
        }
        $lastIndex = $this->size() - 1;
        return $this->stack[$lastIndex];
    }

    /**
     * @return Integer
     */
    function getMin() {
        if ($this->isEmpty()) {
            throw new \Exception('Cannot getMin from an empty stack');
        }
        $min = $this->stack[0];
        for ($i = 0; $i < $this->size(); $i ++) {
            if ($this->stack[$i] < $min) {
                $min = $this->stack[$i];
            }
        }
        return $min;
    }

    public function isEmpty()
    {
        return $this->size() == 0;
    }

    public function size()
    {
        return count($this->stack);
    } 
}
