<?php

namespace Algorithm\BST;

class BSTMap
{
    private $size;
    private $root;

    public function __construct()
    {
        $this->root = null;
        $this->size = 0;
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
        // 返回添加新节点后的二分搜索树的根。
        if ($node == null) {
            $this->size ++;
            return new BSTNode($key, $value);
        }

        if ($key < $node->key) {
            $node->left = $this->implementAdd($node->left, $key, $value);
        } elseif ($key > $node->key) {
            $node->right = $this->implementAdd($node->right, $key, $value);
        } else {
            // key == $node->key
            $node->value = $value;
        }

        return $node;
    }

    // 返回以 node 为根节点的二分搜索树中，key 所在的节点
    public function getNode($node, $key)
    {
        if ($node == null) {
            return null;
        }

        if ($key == $node->key) {
            return $node;
        } elseif ($key > $node->key) {
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

    public function implementRemove($node, $key)
    {
        if ($node == null) {
            return null;
        }

        if ($key < $node->key) {
            $node->left = $this->implementRemove($node->left, $key);
            return $node;
        } elseif ($key > $node->key) {
            $node->right = $this->implementRemove($node->right, $key);
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
}