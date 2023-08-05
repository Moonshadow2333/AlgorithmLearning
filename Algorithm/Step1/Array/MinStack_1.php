<?php

namespace Algorithm\DynamicArray;

class MinStack_1
{
    /**
     * 用一个辅助栈来维护最小值
     */
    protected $stack;
    protected $minStack;
    function __construct() {
        $this->stack = [];
        $this->minStack = [];
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val) {
        array_push($this->stack, $val);
        if (empty($this->minStack)) {
            array_push($this->minStack, $val);
        } elseif ($val <= $this->minStack[count($this->minStack) - 1]) {
            array_push($this->minStack, $val);
        }
    }

    /**
     * @return NULL
     */
    function pop() {
        if ($this->isEmpty()) {
            throw new \Exception('Cannot pop from an empty stack');
        }
       $top = array_pop($this->stack);
       if ($top <= $this->minStack[count($this->minStack) - 1]) {
            array_pop($this->minStack);
       }
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
        if (empty($this->minStack)) {
            throw new \Exception('Cannot getMin from an empty stack');
        }
        return $this->minStack[count($this->minStack) - 1];
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
