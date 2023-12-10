<?php

namespace Algorithm\HashTable;

use Algorithm\BST\BSTMap;

class HashTable
{
    // /****由于简单的进行2M或者M/2的扩容缩容 很容易导致M不是素数 从而引发更多的哈希冲突****/
    private $capacity = [53, 97, 193, 389, 769, 1543, 3079, 6151, 12289, 24593,
    49157, 98317, 196613, 393241, 786433, 1572869, 3145739, 6291469,
    12582917, 25165843, 50331653, 100663319, 201326611, 402653189, 805306457, 1610612741];
    private static $upperTol = 10; // 动态空间
    private static $lowerTol = 2;  // 动态空间
    private $capacityIndex = 0;
    private $hashTable;
    private $M; // 素数 
    private $size;

    use HashCodeTrait;

    public function __construct()
    {
        $this->M = $this->capacity[$this->capacityIndex];
        $this->size = 0;
        for ($i = 0; $i < $this->M; $i ++) {
            $this->hashTable[$i] = new BSTMap();
        }
    }

    private function hash($key) {
        // $this->hashCode($key) & 0x7fffffff 消除 key 的符号，类似于取绝对值。
        return ($this->hashCode($key) & 0x7fffffff) % $this->M;
    }


    public function getSize()
    {
        return $this->size;
    }

    public function add($key, $value)
    {
        $map = $this->hashTable[$this->hash($key)];
        if ($map->contains($key)) {
            $map->set($key, $value);
        } else {
            $map->add($key, $value);
            $this->size ++;
            if ($this->size >= self::$upperTol * $this->M && $this->capacityIndex + 1 < count($this->capacity)) {
                // 扩容
                $this->capacityIndex ++;
                $this->resize($this->capacityIndex);
            }
        }
    }

    public function remove($key)
    {
        $map = $this->hashTable[$this->hash($key)];
        $ret = null;
        if ($map->contains($key)) {
            $ret = $map->remove($key);
            $this->size --;
            if ($this->size < self::$lowerTol * $this->M && $this->capacityIndex - 1 >= 0) {
                // 缩容
                $this->capacityIndex--;
                $this->resize($this->capacity[$this->capacityIndex]);
            }
        }
        return $ret;
    }

    public function set($key, $value)
    {
        $map = $this->hashTable[$this->hash($key)];
        if (!$map->contains($key)) {
            throw new \Exception($key. 'does not exist!');
        }
        $map->set($key, $value);
    }

    public function contains($key)
    {
        return $this->hashTable[$this->hash($key)]->contains($key);
    }

    public function get($key)
    {
        return $this->hashTable[$this->hash($key)]->get($key);
    }

    private function resize($newM)
    {
        $newHashTable = [];
        for ($i = 0; $i < $newM; $i ++) {
            $newHashTable[$i] = new BSTMap();
        }

        // 保存原来的 M
        $oldM = $this->M;
        // 把成员变量 M 的值更新为 newM，因为在 hash 方法中是对 $this->M 取模
        $this->M = $newM;
        for ($i = 0; $i < $oldM; $i ++) {
            $map = $this->hashTable[$i];
            $keySet = $map->keySet();
            foreach ($keySet as $key) {
                $newHashTable[$this->hash($key)]->add($key, $map->get($key));
            }
        }
        $this->hashTable = $newHashTable;
    }

    public function getM()
    {
        return $this->M;
    }
    
    public static function Main()
    {
        $hashTable = new HashTable();
        $hashTable->add("A","shixian");
        $hashTable->add("liu","bei");
        $hashTable->add("wu","sangui");
        $hashTable->add("sun","wukong");
        $hashTable->add("zhu","bajie");
        $hashTable->add("sha","seng");

        $hashTable->add("Asd","shixian");
        $hashTable->add("liudf","bei");
        $hashTable->add("wusdff","sangui");
        $hashTable->add("sunsdf","wukong");
        $hashTable->add("zhusdf","bajie");
        $hashTable->add("shasdf","seng");
        $hashTable->add("Asd","shixian");
        $hashTable->add("liudf","bei");
        $hashTable->add("wusdff","sangui");
        $hashTable->add("sunsdf","wukong");
        $hashTable->add("zhusdf","bajie");
        $hashTable->add("shasdf","seng");
        
        echo $hashTable->get("qin").PHP_EOL;
        echo $hashTable->get("liu").PHP_EOL;
        echo $hashTable->get("wu").PHP_EOL;
        echo $hashTable->get("sun").PHP_EOL;
        echo $hashTable->get("zhu").PHP_EOL;
        echo $hashTable->get("sha").PHP_EOL;
        echo $hashTable->getM();
    }
}