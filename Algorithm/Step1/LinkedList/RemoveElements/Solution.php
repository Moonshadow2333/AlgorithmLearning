<?php

namespace Algorithm\LinkedList\RemoveElements;

class Solution
{
    // 删除元素
    public function removeElements(ListNode $head, int $val)
    {
        $dummyHead = new ListNode(-1);
        $dummyHead->next = $head;

        $prev = $dummyHead;
        while ($prev->next != null) {
            if ($prev->next->val == $val) {
                $delNode = $prev->next;
                $prev->next = $delNode->next;
                $delNode->next = null;
            } else {
                $prev = $prev->next;
            }
        }

        return $dummyHead->next;
    }

    public static function main()
    {
        $arr = [1, 2, 6, 3, 4, 5, 6];
        $head = new ListNode($arr);
        dump($head);

        $ret = (new Solution())->removeElements($head, 6);
        dump($ret);
    }
}
