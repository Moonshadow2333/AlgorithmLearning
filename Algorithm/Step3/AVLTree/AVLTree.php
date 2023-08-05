<?php

namespace Algorithm\AVL;

class AVLTree
{
    private $size;
    private $root;

    public function __construct()
    {
        $this->root = null;
        $this->size = 0;
    }

    // 获取节点的高度值
    private function getHeight($node)
    {
        if (is_null($node)) {
            return 0;
        }
        return $node->height;
    }

    private function getBalanceFactor($node)
    {
        if (is_null($node)) {
            return 0;
        }
        return $this->getHeight($node->left) - $this->getHeight($node->right);
    }

    public function getSize()
    {
        return $this->size;
    }

    public function isEmpty()
    {
        return $this->size == 0;
    }

    public function add($key, $value)
    {
        $this->root = $this->implementAdd($this->root, $key, $value);
    }

    public function implementAdd($node, $key, $value)
    {
        // 返回添加新节
        if ($node == null) {
            // height 的默认值是 1，故在新增叶子节点时不需要更新 height 的值
            $this->size ++;
            return new Node($key, $value);
        }

        // if ($key < $node->key) {
        //     $node->left = $this->implementAdd($node->left, $key, $value);
        // } elseif ($key > $node->key) {
        //     $node->right = $this->implementAdd($node->right, $key, $value);
        // } else {
        //     // key == $node->key
        //     $node->value = $value;
        // }

        if (strcmp($key, $node->key) < 0) {
            // key < node->key 的情况
            $node->left = $this->implementAdd($node->left, $key, $value);
        } elseif (strcmp($key, $node->key) > 0) {
            // key > node->key 的情况
            $node->right = $this->implementAdd($node->right, $key, $value);
        } else {
            $node->value = $value;
        }

        // 更新 height，height 的值是 1 加上当前 node 左右子树高度的最大值
        $node->height = 1 + max($this->getHeight($node->left), $this->getHeight($node->right));

        // 计算平衡因子
        $balanceFactor = $this->getBalanceFactor($node);
        // if (abs($balanceFactor) > 1) {
        //     throw new \Exception('Unbalanced Tree');
        // }

        // LL
        if ($balanceFactor > 1 && $this->getBalanceFactor($node->left) >= 0) {
            return $this->rightRotate($node);
        }

        // RR
        if ($balanceFactor < -1 && $this->getBalanceFactor($node->right) <= 0) {
            return $this->leftRotate($node);
        }

        // LR
        if ($balanceFactor > 1 && $this->getBalanceFactor($node->left) < 0) {
            $node->left = $this->leftRotate($node->left);
            return $this->rightRotate($node);
        }

        // RL
        if ($balanceFactor < -1 && $this->getBalanceFactor($node->right) > 0) {
            $node->right = $this->rightRotate($node->right);
            return $this->leftRotate($node);
        }
        return $node;
    }

    // 返回以 node 为根节点的二分搜索树中，key 所在的节点
    public function getNode($node, $key)
    {
        if ($node == null) {
            return null;
        }

        // if ($key == $node->key) {
        //     return $node;
        // } elseif ($key > $node->key) {
        //     return $this->getNode($node->right, $key);
        // } else {
        //     return $this->getNode($node->left, $key);
        // }

        if (strcmp($key, $node->key) == 0) {
            return $node;
        } elseif (strcmp($key, $node->key) > 0) {
            return $this->getNode($node->right, $key);
        } else {
            return $this->getNode($node->left, $key);
        }
    }

    public function contains($key)
    {
        return $this->getNode($this->root, $key) != null;
    }

    public function get($key)
    {
        $node = $this->getNode($this->root, $key);
        return $node == null ? null : $node->value;
    }

    public function set($key, $newValue)
    {
        $node = $this->getNode($this->root, $key);
        if ($node == null) {
            throw new \Exception('key 不存在');
        }

        $node->value = $newValue;
    }

    public function remove($key)
    {
        $node = $this->getNode($this->root, $key);
        if ($node != null) {
            $this->root = $this->implementRemove($this->root, $key);
            return $node->value;
        }
        return null;
    }

    /**
        * 递归删除方法
        * 在node为根节点的二分搜索树中删除key的节点
        * AVL树删除操作维护平衡性
        * @return ;返回删除完树的根节点
    */
    public function implementRemove($node, $key)
    {
        if ($node == null) {
            return null;
        }

        /**不能急着返回 先使用一个变量存储需要返回的根节点*/
        $retNode = null;
        // if ($key < $node->key) {
        if (strcmp($key, $node->key) < 0) {    
            $node->left = $this->implementRemove($node->left, $key);
            $retNode = $node;
        } elseif (strcmp($key, $node->key) > 0) {
            $node->right = $this->implementRemove($node->right, $key);
            $retNode = $node;
        } else {
            // $e == $node->e;
            if ($node->left == null) {
                $rightNode = $node->right;
                $node->right = null;
                $this->size--;
                $retNode = $rightNode;
            } elseif ($node->right == null) {
                $leftNode = $node->left;
                $node->left = null;
                $this->size--;
                $retNode = $leftNode;
            } else {
                // 左右子树都不为空的情况
                // 找到比待删除节点大的最小值，即待删除节点右子树的最小节点
                // 用这个节点顶替待删除节点的位置
                $successor = $this->implementMinimum($node->right);
                // $successor->right = $this->removeMin($node->right); removemin 删除元素后并没有维护平衡
                $successor->right = $this->implementRemove($node->right, $successor->key);

                $successor->left = $node->left;

                $node->left = $node->right == null;
                $retNode = $successor;
            }
        }

        if (is_null($retNode)) {
            return null;
        }
        // 更新 height，height 的值是 1 加上当前 node 左右子树高度的最大值
        $retNode->height = 1 + max($this->getHeight($retNode->left), $this->getHeight($retNode->right));

        // 计算平衡因子
        $balanceFactor = $this->getBalanceFactor($retNode);

        // LL
        if ($balanceFactor > 1 && $this->getBalanceFactor($retNode->left) >= 0) {
            return $this->rightRotate($retNode);
        }

        // RR
        if ($balanceFactor < -1 && $this->getBalanceFactor($retNode->right) <= 0) {
            return $this->leftRotate($retNode);
        }

        // LR
        if ($balanceFactor > 1 && $this->getBalanceFactor($retNode->left) < 0) {
            $retNode->left = $this->leftRotate($retNode->left);
            return $this->rightRotate($retNode);
        }

        // RL
        if ($balanceFactor < -1 && $this->getBalanceFactor($retNode->right) > 0) {
            $retNode->right = $this->rightRotate($retNode->right);
            return $this->leftRotate($retNode);
        }
        return $retNode;
    }

    // 查找二分查找树的最小元素
    public function minimum()
    {
        if ($this->size == 0) {
            throw new \Exception('BST is empty');
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

    // 判断该二叉树是不是二分搜索树
    public function isBst()
    {
        // 中序遍历遍历二分搜索树得到的是一个升序的数组
        $keys = [];
        $this->inOrder($this->root, $keys);
        for ($i = 1; $i < count($keys); $i ++) {
            if (strcmp($keys[$i - 1], $keys[$i]) > 0) {
                return false;
            }
        }
        return true;
    }

    private function inOrder($node, &$keys)
    {
        if (is_null($node)) {
            return;
        }
        $this->inOrder($node->left, $keys);
        $keys[] = $node->key;
        $this->inOrder($node->right, $keys);
    }

    protected function generateDepthString($depth)
    {
        $str = '';
        for ($i = 0; $i < $depth; $i++) {
            $str .= '|--';
        }
        return $str;
    }

    public function isBalanced()
    {
        return $this->implementIsBalanced($this->root);
    }

    private function implementIsBalanced($node)
    {
        if (is_null($node)) {
            return true;
        }

        $balanceFactor = $this->getBalanceFactor($node);
        if (abs($balanceFactor) > 1) {
            return false;
        }

        return $this->implementIsBalanced($node->left) && $this->implementIsBalanced($node->right);
    }

    public function rightRotate($y)
    {
        $x = $y->left;
        $T3 = $x->right;
        // 向右旋转
        $x->right = $y;
        $y->left = $T3;

        // 更新 height
        $y->height = max($this->getHeight($y->left), $this->getHeight($y->right)) + 1;
        $x->height = max($this->getHeight($x->left), $this->getHeight($x->right)) + 1;
        return $x;
    }

    public function leftRotate($y)
    {
        $x = $y->right;
        $T3 = $x->left;

        // 向左旋转
        $x->left = $y;
        $y->right =$T3;

        // 更新 height
        $y->height = max($this->getHeight($y->left), $this->getHeight($y->right)) + 1;
        $x->height = max($this->getHeight($x->left), $this->getHeight($x->right)) + 1;
        return $x;
    }

    public static function Main()
    {
        $map = new AVLTree();
        $words = ['a', 'b', 'c', 'a', 'sdfds', 'a', 'aaa', 'sdrfsd', 'a', 'sdfwer', 'b'];
        foreach ($words as $word) {
            if ($map->contains($word)) {
                $map->set($word, ($map->get($word) + 1));
            } else {
                $map->add($word, 1);
            }
        }
        echo sprintf('total different words: %d', $map->getSize()).PHP_EOL;
        echo sprintf('frequency of a is %d', $map->get('a')).PHP_EOL;
        echo sprintf('frequency of b is %d', $map->get('b')).PHP_EOL;

        // var_dump($map->isBst());exit;
        // var_dump($map->isBalanced());

        foreach ($words as $word) {
            // echo $word.PHP_EOL;
            $map->remove($word);
            if (!$map->isBst() || !$map->isBalanced()) {
                throw new \Exception('Error');
            }
        }
        echo 'Success';
    }
}
