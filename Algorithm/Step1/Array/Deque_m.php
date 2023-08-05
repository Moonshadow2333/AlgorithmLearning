<?php

namespace Algorithm\DynamicArray;

class Deque_m
{
    protected $data;
    protected $front;
    protected $tail;
    protected $size;
    protected $capacity;
    public function __construct($capacity)
    {
        $this->data = [];
        $this->size  = 0;
        $this->front = 0;
        $this->tail  = 0;
        $this->capacity = $capacity;
    }

    public function getCapacity()
    {
        return $this->getLenth();
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
        $this->capacity = $newCapacity;
    }

    public function isEmpty(): bool
    {
        return $this->size == 0;
    }

    public function addLast($e)
    {
        if ($this->size == $this->getCapacity()) {
            $this->resize($this->getCapacity() * 2);
        }
        $this->data[$this->tail] = $e;
        $this->tail = ($this->tail + 1) % $this->getLenth();
        $this->size++;
    }

    public function addFront($e)
    {
        if ($this->size == $this->getCapacity()) {
            $this->resize($this->getCapacity() * 2);
        }

        $this->front = ($this->front - 1 + $this->getLenth()) % $this->getLenth();

        $this->data[$this->front] = $e;
        $this->size++;
    }

    public function removeFront()
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

    public function removeLast()
    {
        if ($this->isEmpty()) {
            throw new \Exception('cannot dequeue from an empty queue');
        }
        // $this->tail = ($this->tail - 1 + $this->getCapacity()) % $this->getCapacity();
        $this->tail = ($this->tail - 1 + $this->getLenth()) % $this->getLenth();
        $ret = $this->data[$this->tail];
        $this->data[$this->tail] = null;
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
        for ($i = 0; $i < $this->size; $i++) {
            $str .= $this->data[($i + $this->front) % $this->getLenth()];
            if ($i != $this->size - 1) {
                $str .= ', ';
            }
        }
        $str .= '] tail';
        return $str;
    }
}
