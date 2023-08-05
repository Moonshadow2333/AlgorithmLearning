<?php

namespace Algorithm\DynamicArray;

use Exception;

class DynamicArray
{
    private $size;
    private $data;
    private $capacity;

    public function __construct($capacity = 10, $data = [])
    {
        $this->capacity = $capacity;
        $this->size = 0;
        $this->data = $data;
    }

    public function setArray($arr)
    {
        for ($i = 0; $i < count($arr); $i ++) {
            $this->data[$i] = $arr[$i];
        }
        $this->size = count($arr);
    }

    // 获取数组中元素的个数；
    public function getSize()
    {
        return $this->size;
    }

    // 在数组的末尾添加一个元素
    public function addLast($e)
    {
        $this->add($this->size, $e);
    }

    // 在数组的第一个位置添加元素
    public function addFirst($e)
    {
        $this->add(0, $e);
    }

    // 判断数组是否为空
    public function isEmpty()
    {
        return $this->size == 0;
    }

    // 获取数组的容量
    public function getCapacity()
    {
        return $this->capacity;
    }

    public function getData()
    {
        return $this->data;
    }

    // 在任意位置添加元素
    public function add(int $index, $e)
    {
        if ($index < 0 || $index > $this->size) {
            throw new Exception('AddLast failed, index is not illegal.');
        }

        if ($this->size == $this->capacity) {
            $this->resize($this->capacity * 2);
        }

        for ($i = count($this->data) - 1; $i >= $index; $i--) {
            $this->data[$i + 1] = $this->data[$i];
        }
        $this->data[$index] = $e;
        $this->size++;
    }

    // 通过索引查找某个元素
    public function get(int $index)
    {
        if ($index < 0 || $index > $this->size) {
            throw new Exception('illegal index.');
        }
        return $this->data[$index];
    }

    public function getLast()
    {
        return $this->get($this->size - 1);
    }

    public function getFirst()
    {
        return $this->get(0);
    }

    // 通过索引修改某个元素的值
    public function set(int $index, $e)
    {
        if ($index < 0 || $index > $this->size) {
            throw new Exception('illegal index.');
        }
        $this->data[$index] = $e;
    }

    // 查找某个值，如果存在则返回 true 否则返回 false；
    public function contains($e)
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->data[$i] == $e) {
                return true;
            }
        }
        return false;
    }

    // 查找某个值，如果存在则返回该值对应的索引，否则返回 - 1；
    public function find($e)
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->data[$i] == $e) {
                return $i;
            }
        }
        return -1;
    }

    // 删除元素
    public function remove(int $index)
    {
        if ($index < 0 || $index >= $this->size) {
            throw new Exception('illegal index.');
        }
        
        $re = $this->data[$index];
        for ($i = $index; $i + 1 < $this->size; $i++) {
            $this->data[$i] = $this->data[$i + 1];
        }

        $this->size--;

        if ($this->size == floor($this->capacity / 4) && floor($this->capacity / 2) != 0) {
            $this->resize(floor($this->capacity / 2));
        }
        return $re;
    }

    // 删除第一个元素
    public function removeFirst()
    {
        return $this->remove(0);
    }

    // 删除最后一个元素
    public function removeLast()
    {
        return $this->remove($this->size - 1);
    }

    public function resize($newCapacity)
    {
        $newData = [];
        for ($i = 0; $i < $this->size; $i++) {
            $newData[$i] = $this->data[$i];
        }
        $this->capacity = $newCapacity;
        $this->data = $newData;
    }

    public function swap($i, $j)
    {
        if ($i < 0 || $i > $this->getSize() - 1 || $j < 0 || $j > $this->getSize() - 1) {
            throw new \Exception('invalid index');
        }
        $temp = $this->data[$i];
        $this->data[$i] = $this->data[$j];
        $this->data[$j] = $temp;
    }
}
