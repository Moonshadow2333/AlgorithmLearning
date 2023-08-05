<?php

namespace Algorithm\DynamicArray;

class PhpQueue
{
    protected $queue;
    public function __construct()
    {
        $this->queue = [];
    }

    public function enqueue($e)
    {
        array_push($this->queue, $e);
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new \Exception('Cannot dequeue from an empty queue!');
        }
        return array_shift($this->queue);
    }

    public function size()
    {
        return count($this->queue);
    }

    public function isEmpty()
    {
        return $this->size() == 0;
    }

    public function toString()
    {
        $str = sprintf("queue, size: %d", $this->size()).PHP_EOL;
        $str .= 'front [';
        for ($i = 0; $i < $this->size(); $i ++) {
            $str .= $this->queue[$i];
            if ($i != $this->size() - 1) {
                $str .= ', '; 
            }
        }
        $str .= '] end'; 
        return $str;
    }
}