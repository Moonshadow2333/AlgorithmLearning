<?php

namespace Algorithm\DynamicArray;

class MyQueue {
    /**
     * [用栈实现队列]（https://leetcode.cn/problems/implement-queue-using-stacks/)
     */
    protected $stack1;
    protected $stack2;
    protected $pop;
    function __construct() {
        $this->stack1 = new PhpStack();
        $this->stack2 = new PhpStack();
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        $this->stack1->push($x);
    }

    /**
     * @return Integer
     */
    function pop() {
        if ($this->empty()) {
            throw new \Exception('Cannot pop from an empty queue');
        }

        $size1 = $this->stack1->size() - 1;
        for ($i = 0; $i < $size1; $i++) {
            $this->stack2->push($this->stack1->pop());
        }
        $peek = $this->stack1->pop();
        $size2 = $this->stack2->size();
        for ($i = 0; $i < $size2; $i++) {
            $this->stack1->push($this->stack2->pop());
        }
        return $peek;
    }

    /**
     * @return Integer
     */
    function peek() {
        if ($this->empty()) {
            throw new \Exception('Cannot peek from an empty queue');
        }
        $size1 = $this->stack1->size() - 1;
        for ($i = 0; $i < $size1; $i++) {
            $this->stack2->push($this->stack1->pop());
        }
        $peek = $this->stack1->pop();
        $this->stack2->push($peek);
        $size2 = $this->stack2->size();
        for ($i = 0; $i < $size2; $i++) {
            $this->stack1->push($this->stack2->pop());
        }
        return $peek;
    }

    /**
     * @return Boolean
     */
    function empty() {
        return $this->stack1->isEmpty();
    }
}

/**
 * Your MyQueue object will be instantiated and called as such:
 * $obj = MyQueue();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->peek();
 * $ret_4 = $obj->empty();
 */

