<?php

namespace Algorithm\DynamicArray;

use Algorithm\DynamicArray\Stack;
use Algorithm\DynamicArray\DynamicArray;
use Exception;

class ArrayStack implements Stack
{
    protected $arr;
    public function __construct($capacity)
    {
        $this->arr = new DynamicArray($capacity);
    }

    public function push($e)
    {
        $this->arr->addLast($e);
    }

    public function pop()
    {
        try{
            return $this->arr->removeLast();
        } catch (Exception $e) {
            throw new Exception($e->getMessage().': stack is empty, pop stack failed');
        }
    }

    public function peek()
    {
        try{
            return $this->arr->getLast();
        } catch (Exception $e) {
            throw new Exception($e->getMessage().': stack is empty, get the peek of stack failed');
        }
    }

    public function getSize(): int
    {
        return $this->arr->getSize();
    }

    public function isEmpty(): bool
    {
        return $this->arr->isEmpty();
    }

    public function getCapacity(): int
    {
        return $this->arr->getCapacity();
    }

    public function toString(): string
    {
        $str = 'Stack: [';
        for ($i = 0; $i < $this->arr->getSize(); $i ++) {
            $str .= $this->arr->get($i); 
            if ($i != $this->arr->getSize() - 1) {
                $str .= ', ';
            }
        }
        $str .= '] top';
        return $str;
    }
}
