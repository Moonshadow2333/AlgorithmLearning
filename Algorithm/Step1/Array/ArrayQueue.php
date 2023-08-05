<?php

namespace Algorithm\DynamicArray;

use Algorithm\DynamicArray\DynamicArray;

class ArrayQueue implements Queue
{
    protected $queue;
    public function __construct($capacity)
    {
        $this->queue = new DynamicArray($capacity);    
    }

    public function enqueue($e)
    {
        $this->queue->addLast($e);
    }

    public function dequeue()
    {
        try{
            return $this->queue->removeFirst();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage().': queue is empty, dequeue failed');
        }
    }

    public function getFront()
    {
        try{
            return $this->queue->getFirst();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage().': queue is empty, getFront failed');
        }
    }

    public function getSize(): int
    {
        return $this->queue->getSize();
    }

    public function isEmpty(): bool
    {
        return $this->queue->isEmpty();
    }

    public function getCapacity()
    {
        return $this->queue->getCapacity();
    }

    public function toString(): string
    {
        $str = 'Queue: front [';
        for ($i = 0; $i < $this->queue->getSize(); $i ++) {
            $str .= $this->queue->get($i); 
            if ($i != $this->queue->getSize() - 1) {
                $str .= ', ';
            }
        }
        $str .= '] tail';
        return $str;
    }
}