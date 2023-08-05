<?php

namespace Algorithm\LinkedList;

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

use Algorithm\LinkedList\RemoveElements\ListNode;

class Solution
{
    /**
     * @param ListNode $head
     * @return ListNode
     */

    public function reverseList($head)
    {
        $prev = null;
        $cur = $head;
        while ($cur != null) {
            $next = $cur->next;
            $cur->next = $prev;
            $prev = $cur;
            $cur = $next;
        }
        return $prev;
    }

    public static function Main()
    {
        $arr = [1, 2, 3, 4, 5];
        $head = new ListNode($arr);
        dump($head);

        $ret = (new Solution())->reverseListRecursive($head);
        // $ret = (new Solution())->reverseListWrong($head);
        dump($ret);
    }

    public function reverseListR($head, $depth)
    {
        $depthString = $this->generateDepthString($depth);

        echo $depthString;
        dump("Call: ReverseList: {$head}");
        $cur = $head;
        if ($cur->next == null) {
            echo $depthString;
            dump("return {$cur}");
            return $cur;
        }
        $reversedList = $this->reverseListR($cur->next, $depth + 1);
        $cur->next = null;

        $tail = $reversedList;
        while ($tail->next != null) {
            $tail = $tail->next;
        }

        $tail->next = $cur;
        // var_dump($next);
        echo $depthString;
        dump("After reverse {$tail}");
        return $reversedList;
    }

    private function generateDepthString($depth)
    {
        $str = '';
        for ($i = 0; $i < $depth; $i ++) {
            $str .= '--';
        }
        return $str;
    }

    public function reverseListRecursive($head)
    {
        if ($head->next == null) {
            return $head;
        }
        $reversedList = $this->reverseListRecursive($head->next);
        $head->next = null;
        $tail = $reversedList;
        while ($tail->next != null) {
            $tail = $tail->next;
        }
        $tail->next = $head;
        return $reversedList;
    }

    public function reverseListWrong($head)
    {
        if ($head->next == null) {
            return $head;
        }
        $reversedList = $this->reverseListWrong($head->next);
        $head->next = null;
        $reversedList->next = $head;
        return $reversedList;
    }
}
