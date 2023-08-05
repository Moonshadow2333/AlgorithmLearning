<?php

namespace Algorithm\LinkedList;

use Algorithm\DynamicArray\Queue;

class LinkedListQueue implements Queue
{
    // 带有尾指针的链表：使用链表实现队列

    protected $size;
    protected $head;
    protected $tail;

    public function __construct()
    {
        $this->size = 0;
        $this->head = null;
        $this->tail = null;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function isEmpty(): bool
    {
        return $this->size == 0;
    }

    public function getFront()
    {
        if ($this->isEmpty()) {
            throw new \Exception('Cannot dequeue from an empty');
        }
        return $this->head->e;
    }

    public function enqueue($e)
    {
        if ($this->tail == null) {
            $this->tail = new Node($e);
            $this->head = $this->tail;
        } else {
            $this->tail->next = new Node($e);
            $this->tail = $this->tail->next;
        }
        $this->size ++;
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new \Exception('Cannot dequeue from an empty');
        }
        $retNode = $this->head;
        $this->head = $this->head->next;
        $retNode->next = null;
        if ($this->head == null) {
            $this->tail = null;
        }
        $this->size --;
        return $retNode->e;
    }

    public function toString()
    {
        $str = 'Queue: front ';
        $cur = $this->head;
        while ($cur != null) {
            $str .= $cur->e . '->';
            $cur = $cur->next;
        }
        $str .= 'NULL tail';
        return $str;
    }
}
