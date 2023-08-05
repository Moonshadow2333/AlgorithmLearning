<?php

namespace Algorithm\LinkedList\Recursive;

use Algorithm\LinkedList\Node;
use Exception;

class LinkedList
{
    // 递归实现链表的增删改查
    protected $dummyHead;
    protected $size;
    protected $prev;
    protected $cur;

    public function __construct()
    {
        $this->dummyHead = new Node();
        $this->size = 0;
        $this->prev = $this->dummyHead;
    }

    public function getSize () 
    {
        return $this->size;
    }

    public function isEmpty()
    {
        return $this->size == 0;
    }

    public function add($index, $e)
    {
        if ($index < 0 || $index > $this->size) {
            throw new Exception('Illegal index');
        }
        
        if ($index == 0) {
            $node = new Node($e);
            $node->next = $this->prev->next;
            $this->prev->next = $node;
            $this->prev->next;
            $this->size ++;
            $this->resetPrev();
            $this->setCur();
            return ;
        }

        $index --;
        $this->prev = $this->prev->next;
        $this->add($index, $e);
        return;
    }

    public function addFirst($e)
    {
        $this->add(0, $e);
    }

    public function remove($index)
    {
        if ($index < 0 || $index > $this->size) {
            throw new Exception('Illegal index');
        }

        if ($index == 0) {
            $node = $this->prev->next;
            $this->prev->next = $node->next;
            $e = $node->e;
            $node = null;
            $this->size --;
            $this->resetPrev();
            $this->setCur();
            return $e;
        }

        $index --;
        $this->prev = $this->prev->next;
        return $this->remove($index);
    }

    public function get($index)
    {
        if ($index < 0 || $index > $this->size) {
            throw new Exception('Illegal index');
        }
        
        if ($index == 0) {
            return $this->cur->e;
        }

        $index --;
        $this->cur = $this->cur->next;
        return $this->get($index);
    }

    public function set($index, $e)
    {
        if ($index < 0 || $index > $this->size) {
            throw new Exception('Illegal index');
        }

        if ($index == 0) {
            $this->cur->e = $e;
            $this->setCur();
            return;
        }
        
        $index --;
        $this->cur = $this->cur->next;
        $this->set($index, $e);
        return;
    }

    // 重置头结点
    protected function resetPrev()
    {
        $this->prev = $this->dummyHead;
    }

    // 设置当前节点
    protected function setCur()
    {
        $this->cur = $this->dummyHead->next;
    }

    public function __toString()
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

    // 测试
    public static function Main()
    {
        $arr = [1,2,5];
        $linked = (new LinkedList());
        for ($i = 0; $i < count($arr); $i ++) {
            $linked->addFirst($arr[$i]);
            dump($linked);
        }
        // var_dump();
        $linked->add(1, 6);
        dump($linked);
        dump($linked->remove(1));
        dump($linked);
        dump($linked->get(0));
        $linked->set(1, 6);
        dump($linked);
        dump($linked->get(2));
    }
}
