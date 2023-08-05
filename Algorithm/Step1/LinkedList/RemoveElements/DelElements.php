<?php

namespace Algorithm\LinkedList\RemoveElements;

class DelElements
{
    // 删除元素
    public function removeElements(ListNode $head, int $val)
    {
        while ($head != null && $head->val == $val) {
            $retNode = $head;
            $head = $retNode->next;
            $retNode->next = null;
        }

        if ($head == null) {
            return null;
        }

        $prev = $head;
        while ($prev->next != null) {
            if ($prev->next->val == $val) {
                $delNode = $prev->next;
                $prev->next = $delNode->next;
                $delNode->next = null;
            } else {
                $prev = $prev->next;
            }
        }
        return $head;
    }
}
