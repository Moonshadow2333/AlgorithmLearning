<?php

namespace Algorithm\BST;

use Exception;

class BST
{
    public $root;
    public $size;

    public function __construct()
    {
        $this->root = null;
        $this->size = 0;
    }

    public function size()
    {
        return $this->size;
    }

    public function isEmpty()
    {
        return $this->size == 0;
    }

    public function add($e)
    {
        $this->root = $this->implementAdd($this->root, $e);
    }

    public function contains($e)
    {
        return $this->implementContains($this->root, $e);
    }

    private function implementContains($node, $e)
    {
        if ($node == null) {
            return false;
        }

        if ($node->e == $e) {
            return true;
        } elseif ($e < $node->e) {
            return $this->implementContains($node->left, $e);
        } else {
            return $this->implementContains($node->right, $e);
        }
    }

    public function add2($e)
    {
        $this->root = $this->implementAddWithLoop2($this->root, $e);
    }

    public function preOrder()
    {
        $this->implementPreOrder($this->root);
    }

    public function preOrderNR()
    {
        // 非递归实现二叉树的前序遍历
        $stack = [];
        array_push($stack, $this->root);
        while (!empty($stack)) {
            $cur = array_pop($stack);
            dump($cur->e);
            if ($cur->right != null) {
                array_push($stack, $cur->right);
            }
            if ($cur->left != null) {
                array_push($stack, $cur->left);
            }
        }
    }

    private function implementPreOrder($node)
    {
        if ($node == null) {
            return ;
        }
        dump($node->e);
        $this->implementPreOrder($node->left);
        $this->implementPreOrder($node->right);
    }

    public function inOrder()
    {
        $this->implementInOrder($this->root);
    }

    public function implementInOrder($node)
    {
        if ($node == null) {
            return ;
        }
        $this->implementInOrder($node->left);
        dump($node->e);
        $this->implementInOrder($node->right);
    }

    public function inOrderNR()
    {
        $stack = [];
        $processedNode = [];// 记录已经处理过的节点
        array_push($stack, $this->root);
        while (!empty($stack)) {
            $peek = getStackPeek($stack);// 获取栈顶元素
            while ($peek->left != null) {
                if (in_array($peek->left->e, $processedNode)) {
                    // 处理过的节点不在处理，避免死循环
                    break;
                }
                array_push($stack, $peek->left);
                $peek = $peek->left;
            }
            $cur = array_pop($stack);
            array_push($processedNode, $cur->e);
            dump($cur->e);
            if ($cur->right != null) {
                array_push($stack, $cur->right);
            }
        }
    }

    public function postOrder()
    {
        $this->implementPostOrder($this->root);
    }

    private function implementPostOrder($node)
    {
        if ($node == null) {
            return;
        }

        $this->implementPostOrder($node->left);
        $this->implementPostOrder($node->right);
        dump($node->e);
    }

    // 层序遍历
    public function levelOrder()
    {
        $queue = [];
        array_push($queue, $this->root);
        while (!empty($queue)) {
            $cur = array_shift($queue);
            dump($cur->e);
            if ($cur->left != null) {
                array_push($queue, $cur->left);
            }
            if ($cur->right != null) {
                array_push($queue, $cur->right);
            }
        }
    }

    public function implementAdd($node, $e)
    {
        // 返回添加新节点后的二分搜索树的根。
        if ($node == null) {
            $this->size ++;
            return new Node($e);
        }

        if ($e < $node->e) {
            $node->left = $this->implementAdd($node->left, $e);
        } elseif ($e > $node->e) {
            $node->right = $this->implementAdd($node->right, $e);
        }
        return $node;
    }

    public function implementAddWithLoop2($node, $e)
    {
        $dumyHead = new Node(PHP_INT_MAX);
        // PHP_INT_MAX 表示整数 integer 的最大值
        $dumyHead->left = $node;
        $prev = $dumyHead;
        while (($e < $prev->e && $prev->left != null) || ($e > $prev->e && $prev->right != null)) {
            if ($e < $prev->e) {
                $prev = $prev->left;
            } elseif ($e > $prev->e) {
                $prev = $prev->right;
            }
        }
        if ($e < $prev->e) {
            $prev->left = new Node($e);
        } elseif ($e > $prev->e) {
            $prev->right = new Node($e);
        }
        $this->size ++;
        return $dumyHead->left;
    }

    public function implementAddLoop($node, $e)
    {
        $prev = $node;
        if ($prev == null) {
            return new Node($e);
        }

        while (($e < $prev->e && $prev->left != null) || ($e > $prev->e && $prev->right != null)) {
            if ($e < $prev->e) {
                $prev = $prev->left;
            } elseif ($e > $prev->e) {
                $prev = $prev->right;
            }
        }
        if ($e < $prev->e) {
            $prev->left = new Node($e);
        } elseif ($e > $prev->e) {
            $prev->right = new Node($e);
        }
        return $node;
    }

    // 查找二分查找树的最小元素
    public function minimum()
    {
        if ($this->size == 0) {
            throw new Exception('BST is empty');
        }
        return $this->implementMinimum($this->root);
    }

    public function implementMinimum($node)
    {
        if ($node->left == null) {
            return $node;
        }
        return $this->implementMinimum($node->left);
    }

    // 查找二分查找树的最大元素
    public function maximum()
    {
        if ($this->size == 0) {
            throw new Exception('BST is empty');
        }
        return $this->implementMaximum($this->root);
    }

    public function implementMaximum($node)
    {
        if ($node->right == null) {
            return $node;
        }
        return $this->implementMaximum($node->right);
    }

    public function removeMin()
    {
        $ret = $this->minimum();
        $this->root = $this->implementRemoveMin($this->root);
        return $ret->e;
    }

    // 删除掉以node为根的二分搜索树中的最小节点；
    // 返回删除节点后新的二分搜索树的根。
    public function implementRemoveMin($node)
    {
        if ($node->left == null) {
            $rightNode = $node->right;
            $node->right = null;
            $this->size--;
            return $rightNode;
        }
        // 删除最小值后原最小节点的右孩子成为上层的左孩子
        $node->left = $this->implementRemoveMin($node->left);
        return $node;
    }

    public function removeMax()
    {
        $ret = $this->maximum();
        $this->root = $this->implementRemoveMax($this->root);
        return $ret->e;
    }

    // 删除掉以node为根的二分搜索树中的最小节点；
    // 返回删除节点后新的二分搜索树的根。
    public function implementRemoveMax($node)
    {
        if ($node->right == null) {
            $leftNode = $node->left;
            $node->left = null;
            $this->size--;
            return $leftNode;
        }
        // 删除最小值后原最小节点的右孩子成为上层的左孩子
        $node->right = $this->implementRemoveMax($node->right);
        return $node;
    }

    public function remove($e)
    {
        $this->root = $this->implementRemove($this->root, $e);
    }

    public function implementRemove($node, $e)
    {
        if ($node == null) {
            return null;
        }

        if ($e < $node->e) {
            $node->left = $this->implementRemove($node->left, $e);
            return $node;
        } elseif ($e > $node->e) {
            $node->right = $this->implementRemove($node->right, $e);
            return $node;
        } else {
            // $e == $node->e;
            if ($node->left == null) {
                $rightNode = $node->right;
                $node->right = null;
                $this->size--;
                return $rightNode;
            }
            if ($node->right == null) {
                $leftNode = $node->left;
                $node->left = null;
                $this->size--;
                return $leftNode;
            }
            // 左右子树都不为空的情况
            // 找到比待删除节点大的最小值，即待删除节点右子树的最小节点
            // 用这个节点顶替待删除节点的位置
            $successor = $this->implementMinimum($node->right);
            $successor->right = $this->removeMin($node->right);
            $successor->left = $node->left;

            $node->left = $node->right == null;
            return $successor;
        }
    }
    // public function add($e)
    // {
    //     if ($this->root == null) {
    //         $this->root = new Node($e);
    //         $this->size ++;
    //     } else {
    //         $this->implementAdd($this->root, $e);
    //     }
    // }

    // // 向以node为根的二分搜索树中插入元素 e，递归算法。
    // private function implementAdd($node, $e)
    // {
    //     if ($node->e == $e) {
    //         return;
    //     } elseif ($node->e < $e && $node->left == null) {
    //         $this->size ++;
    //         $node->left = new Node($e);
    //         return;
    //     } elseif ($node->e > $e && $node->right == null) {
    //         $this->size ++;
    //         $node->right = new Node($e);
    //         return;
    //     }

    //     if ($node->e < $e) {
    //         $this->implementAdd($node->left, $e);
    //     } else {
    //         $this->implementAdd($node->right, $e);
    //     }
    // }
    public function __toString()
    {
        $res = '';
        $this->generateBstString($this->root, 0, $res);
        return $res;
    }

    private function generateBstString($node, $depth, &$res)
    {
        if ($node == null) {
            $res .= $this->generateDepthString($depth) . "null" . PHP_EOL;
            return;
        }
        $res .= $this->generateDepthString($depth) . $node->e . PHP_EOL;
        $this->generateBstString($node->left, $depth + 1, $res);
        $this->generateBstString($node->right, $depth + 1, $res);
    }

    private function generateDepthString($depth)
    {
        $depthStr = "";
        for ($i = 0; $i < $depth; $i++) {
            $depthStr .= "--";
        }
        return $depthStr;
    }

    public static function Main()
    {
        // $arr = [28, 16, 13, 22, 30, 29, 42];
        // // $arr = [5, 3, 6, 8, 4, 2];
        $bst = new BST();
        // foreach ($arr as $v) {
        //     // $bst->add($v);
        //     $bst->add2($v);
        // }
        // $bst->preOrder();
        // echo PHP_EOL;
        // dump($bst);

        // $bst->inOrder();
        // echo PHP_EOL;
        // $bst->postOrder();
        // $bst->preOrderNR();
        // $bst->inOrderNR();

        // $bst->levelOrder();

        for ($i = 0; $i < 1000; $i ++) {
            $e = mt_rand(0, 10000);
            $bst->add($e);
        }
        
        // $nums = [];

        // while (!$bst->isEmpty()) {
        //     $nums[] = $bst->removeMin();
        // }
        // dump('['.implode(',', $nums).']');
        // for ($i = 1; $i < count($nums); $i ++) {
        //     if ($nums[$i - 1] > $nums[$i]) {
        //         throw new Exception('error');
        //     }
        // }
        // dump('success');

        $nums = [];

        while (!$bst->isEmpty()) {
            $nums[] = $bst->removeMax();
        }
        dump('['.implode(',', $nums).']');
        for ($i = 1; $i < count($nums); $i ++) {
            if ($nums[$i - 1] < $nums[$i]) {
                throw new Exception('error');
            }
        }
        dump('success');
    }
}
