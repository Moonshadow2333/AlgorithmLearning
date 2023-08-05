<?php

namespace Algorithm\DynamicArray;

class PhpStack
{
    protected $stack;
    public function __construct()
    {
        $this->stack = [];
    }

    public function pop()
    {
        return array_pop($this->stack);
    }

    public function push($e)
    {
        array_push($this->stack, $e);
    }

    public function isEmpty()
    {
        return $this->size() == 0;
    }

    public function size()
    {
        return count($this->stack);
    }

    public function getMin()
    {
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
}
