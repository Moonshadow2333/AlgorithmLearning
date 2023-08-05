<?php

namespace Algorithm\LinkedList;

use Algorithm\DynamicArray\Stack;

class LinkedListStack implements Stack
{
    protected $linkedList;

    public function __construct()
    {
        $this->linkedList = new LinkedList;
    }
    public function push($e)
    {
        $this->linkedList->addFirst($e);
    }

    public function pop()
    {
        return $this->linkedList->removeFirst();
    }

    public function peek()
    {
        return $this->linkedList->get(0);
    }

    public function getSize(): int
    {
        return $this->linkedList->getSize();
    }

    public function isEmpty(): bool
    {
        return $this->linkedList->isEmpty();
    }

    public function toString()
    {
        $str = 'Stack: top ';
        $str .= $this->linkedList->toString();
        return $str;
    }
}