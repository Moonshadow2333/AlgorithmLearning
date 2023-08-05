<?php

namespace Algorithm\Heap;

use Exception;

class HeapSort
{
    public function sort($data)
    {
        $maxHeap = new MaxHeap();
        for ($i = 0; $i < count($data); $i ++) {
            $maxHeap->add($data[$i]);
        }

        for ($i = (count($data) -1); $i >= 0; $i--) {
            $data[$i] = $maxHeap->extractMax();
        }
        return $data;
    }

    public function sort2($data)
    {
        if (count($data) <= 1) {
            return $data;
        }

        // heapify 的过程
        for ($i = (count($data) - 2)/2; $i >= 0; $i--) {
            $this->siftDown($data, $i, count($data));
        }

        for ($i = count($data) - 1; $i >= 0; $i--) {
            $this->swap($data, 0, $i);
            $this->siftDown($data, 0, $i);
        }
        return $data;
    }

    // 对data[0,n)所形成的最大堆，索引k的元素执行siftDown
    protected function siftDown(&$data, $k, $n)
    {
        while (2 * $k + 1 < $n) {
            $j = 2 * $k + 1;
            if ($j + 1 < $n && $data[$j + 1] > $data[$j]) {
                $j = 2 * $k + 2;
            }
            // $data[$j] 是 leftChild 和 rightChild 中的最大值

            if ($data[$k] >= $data[$j]) {
                break;
            }

            $this->swap($data, $k, $j);
            $k = $j;
        }
    }

    public function swap(&$arr, $i, $j)
    {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }

    public function heapifySort($data)
    {
        $maxHeap = new MaxHeap;

        $maxHeap->heapify($data);

        for ($i = (count($data) -1); $i >= 0; $i--) {
            $data[$i] = $maxHeap->extractMax();
        }
        return $data;
    }

    public static function main()
    {
        $data = [];
        for ($i = 0; $i < 1000; $i ++) {
            $data[] = mt_rand(0, 100000);
        }

        // $res = (new HeapSort())->sort($data);
        // $res = (new HeapSort())->heapifySort($data);
        $res = (new HeapSort())->sort2($data);
        // $res[0] = [1053453453453];
        try {
            for ($i = 1; $i < count($res); $i ++) {
                if ($res[$i - 1] > $res[$i]) {
                    throw new \Exception('Error');
                }
            }
            var_dump($res);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}