<?php

namespace Algorithm\DynamicArray;

class LoopQueue implements Queue
{
    protected $data;
    protected $front;
    protected $tail;
    protected $size;
    protected $capacity;
    public function __construct($capacity)
    {
        $this->data = []; // 有意识的浪费一个空间
        $this->size  = 0;
        $this->front = 0;
        $this->tail  = 0;
        $this->capacity = $capacity + 1;
    }

    public function getCapacity()
    {
        // 实际容量，有意识的浪费了一个空间
        return $this->getLenth() - 1;
    }

    public function resize($newCapacity)
    {
        $newData = [];
        for ($i = 0; $i < $this->size; $i++) {
            $newData[$i] = $this->data[($i + $this->front) % $this->getLenth()];
        }
        $this->data = $newData;
        $this->front = 0;
        $this->tail  = $this->size;
        $this->capacity = $newCapacity + 1;
    }

    public function isEmpty(): bool
    {
        return $this->front == $this->tail;
    }

    public function enqueue($e)
    {
        if (($this->tail + 1) % $this->getLenth() == $this->front) {
            $this->resize($this->getCapacity() * 2);
        }

        $this->data[$this->tail] = $e;
        $this->tail = ($this->tail + 1) % $this->getLenth();
        $this->size++;
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new \Exception('cannot dequeue from an empty queue');
        }
        $ret = $this->data[$this->front];
        $this->data[$this->front] = null;
        $this->front = ($this->front + 1) % $this->getLenth();
        $this->size --;
        if ($this->size == floor($this->getCapacity() / 4) && floor($this->getCapacity()/2) != 0) {
            $this->resize(floor($this->getCapacity()/2));
        }
        return $ret;
    }

    public function getFront()
    {
        if ($this->isEmpty()) {
            throw new \Exception('cannot getFront from an empty queue');
        }
        return $this->data[$this->front];
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getLenth(): int
    {
        return $this->capacity;
    }

    public function toString(): string
    {
        $str = sprintf("Queue: size = %d, capacity = %d", $this->size, $this->getCapacity()).PHP_EOL;
        $str .= 'front [';
        for ($i = $this->front; $i != $this->tail; $i = ($i + 1) % $this->getLenth()) {
            $str .= $this->data[$i];
            if (($i + 1) % $this->getLenth() != $this->tail) {
                $str .= ', ';
            }
        }
        $str .= '] tail';
        return $str;
    }
}
