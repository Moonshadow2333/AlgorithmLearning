<?php

namespace Algorithm\DynamicArray;

class Deque
{
    protected $data;
    protected $capacity;

    public function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->data = new DynamicArray($capacity);
    }

    public function addFront($e)
    {
        $this->data->addFirst($e);
    }

    public function addLast($e)
    {
        $this->data->addLast($e);
    }

    public function removeFront()
    {
        return $this->data->removeFirst();
    }
    
    public function removeLast()
    {
        return $this->data->removeLast();
    }

    public function toString()
    {
        $str = sprintf("Deque: size = %d, capcity = %d", $this->data->getSize(), $this->data->getCapacity()).PHP_EOL;
        $str .= "front [";
        for ($i = 0; $i < $this->data->getSize(); $i++) {
            $str .= $this->data->getData()[$i];
            if ($i != $this->data->getSize() - 1) {
                $str .= ' ,';
            }
        }
        $str .= "] end";
        return $str;
    }
}
