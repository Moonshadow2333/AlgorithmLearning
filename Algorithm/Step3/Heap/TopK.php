<?php

namespace Algorithm\Heap;

class TopK
{
    public function getLeastNumbers($arr, $k): array
    {
        $priorityQueue = new PriorityQueue();
        for ($i = 0; $i < $k; $i++) {
            $priorityQueue->enqueue($arr[$i]);
        }

        for ($i = $k; $i < count($arr); $i++) {
            if (!$priorityQueue->isEmpty() && $arr[$i] < $priorityQueue->getFront()) {
                $priorityQueue->dequeue();
                $priorityQueue->enqueue($arr[$i]);
            }
        }

        $res = [];
        for ($i = 0; $i < $k; $i++) {
            $res[] = $priorityQueue->dequeue();
        }
        return $res;
    }
}