<?php

namespace Algorithm\DynamicArray;

class ValidParentheses
{
    public static function isValid(string $str): bool
    {
        $stack = new ArrayStack(10);
        for ($i = 0; $i < strlen($str); $i ++) {
            if ($str[$i] == '{' || $str[$i] == '[' || $str[$i] == '(') {
                $stack->push($str[$i]);
            } else {
                if ($stack->isEmpty()) {
                    return false;
                }
                $peek = $stack->pop();

                if ($str[$i] == '}' && $peek != '{') {
                    return false;
                }

                if ($str[$i] == '[' && $peek != ']') {
                    return false;
                }

                if ($str[$i] == '(' && $peek != ')') {
                    return false;
                }
            }
        }
        return $stack->isEmpty();
    }

    protected static function isMatch($peek, $current): bool
    {
        // 栈顶元素反映了在嵌套层次关系中，最近要匹配的元素。
        switch ($peek) {
            case '{':
                return $current == '}';
            case '[':
                return $current == ']';
            case '(':
                return $current == ')';
            default:
                return false;
        }
    }

    // 利用栈匹配括号
    public static function solution($str): bool
    {
        // 循环不变量：当前元素与栈顶元素匹配，匹配则出栈。
        $stack = new ArrayStack(10);
        for ($i = 0; $i < strlen($str); $i++) {
            $peek = !$stack->isEmpty() ? $peek = $stack->peek() : '';

            if ($str[$i] == '{' || $str[$i] == '[' || $str[$i] == '(') {
                $stack->push($str[$i]);
            } else {
                if (self::isMatch($peek, $str[$i])) {
                    $stack->pop();
                }
            }
        }
        return $stack->isEmpty();
    }
}