<?php

namespace Algorithm\LinkedList;

class LinkedList
{
    // protected Node $head;
    protected Node $dummyHead; // 虚拟头结点
    private $size;

    public function __construct()
    {
        // $this->head = null;
        $this->dummyHead = new Node();
        $this->size = 0;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function isEmpty(): bool
    {
        return $this->size == 0;
    }

    // 在链表头添加新的元素
    public function addFirst($e)
    {
        $this->add(0, $e);
    }

    // 在链表的 index (0-based) 位置添加新的元素 e
    public function add($index, $e)
    {
        // 判断 index 的合法性
        if ($index < 0 || $index > $this->size) {
            // 注意 index 可以取到 size 的，因为可以在最后一个节点添加元素
            throw new \Exception('Add failed. illegal index');
        }

        $prev = $this->dummyHead;
        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }
        // 顺序很重要
        $node = new Node($e);
        $node->next = $prev->next;
        $prev->next = $node;

        // 更优雅的写法
        // $prev->next = new Node($e, $prev->next);
        $this->size ++;
    }

    // 在链表末尾添加元素 e
    public function addLast($e)
    {
        $this->add($this->size, $e);
    }

    // 获得链表中第 index 个位置的元素：
    public function get($index)
    {
        if ($index < 0 && $index >= $this->size) {
            throw new \Exception('Get failed, Illeal index');
        }

        $cur = $this->dummyHead->next;
        for ($i = 0; $i < $index; $i++) {
            $cur = $cur->next;
        }
        return $cur->e;
    }

    // 获得链表的第一个元素
    public function getFrist()
    {
        return $this->get(0);
    }

    // 获得链表的最后一个元素
    public function getLast()
    {
        return $this->get($this->size - 1);
    }

    // 修改链表的第 index 个位置的元素
    public function set($index, $e)
    {
        if ($index < 0 && $index >= $this->size) {
            throw new \Exception('Set failed, Illeal index');
        }

        $cur = $this->dummyHead->next;
        for ($i = 0; $i < $index; $i++) {
            $cur = $cur->next;
        }
        $cur->e = $e;
    }

    // 查找链表中是否存在元素 e
    public function contains($e)
    {
        $cur = $this->dummyHead->next;
        while ($cur != null) {
            if ($e == $cur->e) {
                return true;
            }
            $cur = $cur->next;
        }
        return false;
    }

    // 从链表中删除第 index 个元素，并返回删除元素的值
    public function remove($index)
    {
        if ($index < 0 || $index >= $this->size) {
            throw new \Exception('Delete failed, illegal index');
        }
        $prev = $this->dummyHead;
        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }

        $retNode = $prev->next;
        $prev->next = $retNode->next;
        $retNode->next = NULL;
        $this->size--;

        return $retNode->e;
    }

    // 从链表中删除第一个元素，返回删除元素
    public function removeFirst()
    {
        return $this->remove(0);
    }

    // 从链表中删除最后一个元素，返回删除元素
    public function removeLast()
    {
        return $this->remove($this->size - 1);
    }

    public function toString()
    {
        $cur = $this->dummyHead->next;
        $ret = '';
        while ($cur != null) {
            $ret .= $cur->e . '->';
            $cur = $cur->next;
        }
        $ret .= 'NULL';
        return $ret;
    }
}
