<?php

namespace Algorithm\LinkedList\RemoveElements;

class Solution2
{
    // 递归实现
    // 删除元素
    public function removeElements($head, int $val, $depth)
    {
        $depthString = $this->generateDepthString($depth);

        echo $depthString;
        dump("Call: remove: {$val} in {$head}");
        if ($head == null) {
            echo $depthString;
            dump("Return: NULL");
            return null;
        }
        $res = $this->removeElements($head->next, $val, $depth + 1);
        echo $depthString;
        dump("After remove {$val} in {$res}");

        if ($head->val == $val) {
            $ret = $res;
        } else {
            $head->next = $res;
            $ret = $head;
        }
        echo $depthString;
        dump("Return: {$ret}");
        return $ret;
        // 简化代码
        // $head->next = $this->removeElements($head->next, $val, $depth + 1);
        // return $head->val == $val ? $head->next : $head;
    }

    private function generateDepthString($depth)
    {
        $str = '';
        for ($i = 0; $i < $depth; $i ++) {
            $str .= '--';
        }
        return $str;
    }

    public function removeEles($head, $e)
    {
        if ($head == null) {
            return null;
        }
        $head->next = $this->removeEles($head->next, 6);
        return $head->val == $e ? $head->next : $head;
    }

    public static function main()
    {
        $arr = [4, 6, 3, 6, 2, 1];
        $head = new ListNode($arr);
        dump($head);

        // $ret = (new Solution2())->removeElements($head, 6, 0);
        $ret = (new Solution2())->removeEles($head, 6);
        dump($ret);
    }
}
