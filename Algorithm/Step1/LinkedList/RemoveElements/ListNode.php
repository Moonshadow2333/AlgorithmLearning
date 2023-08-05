<?php

namespace Algorithm\LinkedList\RemoveElements;

class ListNode
{
    public $val;
    public $next;
    public function __construct($x)
    {
        if (is_int($x)) {
            $this->val = $x;
        } elseif (is_array($x)) {
            if ($x == null || count($x) == 0) {
                throw new \Exception("arr cannot be empty");
            }

            $this->val = $x[0];
            $cur = $this;
            for ($i = 1; $i < count($x); $i ++) {
                $cur->next = new ListNode($x[$i]);
                $cur = $cur->next;
            }
        }
    }

    public function __toString()
    {
        $str = '';
        $cur = $this;
        while ($cur != null) {
            $str .= "{$cur->val}->";
            $cur = $cur->next;
        }
        $str .= 'NULL';
        return $str;
    }
}
