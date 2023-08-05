# 二分查找的变种

查找比 target 大的最小值。

## 代码

```PHP
<?php

class BS
{
    // 二分查找法的变式
    public function upper($arr, $target)
    {
        $l = 0;
        $r = count($arr);
        $i = 1;
        while ($l < $r) {
            $mid = floor(($l + $r) / 2);
            echo sprintf("第 %d 轮循环，初始搜索范围[%d, %d], mid = %d, arr[mid] = %d, ", $i, $l, $r, $mid, $arr[$mid]);
            if ($target >= $arr[$mid]) {
                $l = $mid + 1;
            } else {
                $r = $mid;
            }
            echo sprintf("下轮循环的搜索范围[%d, %d] ", $l, $r).PHP_EOL;
            $i ++;
        }
        return $l;
    }

    public static function Main()
    {
        $arr = [23, 36, 65, 69, 72, 89, 96, 99];
        $up = new BS();
        $arrStr = '['.implode(', ', $arr).']';

        $targets = [60, 78, 99];
        for ($i = 0; $i < count($targets); $i ++) {
            $target = $targets[$i];
            $index = $up->upper($arr, $target);
            echo sprintf("在数组 %s 中比 %d 大的最小值对应的索引是 %d，其值为：%d。", $arrStr,$target, $index, $arr[$index]).PHP_EOL;
            echo PHP_EOL;
        }
    }
}
```

结果如下：

```PHP
第 1 轮循环，初始搜索范围[0, 8], mid = 4, arr[mid] = 72, 下轮循环的搜索范围[0, 4] 
第 2 轮循环，初始搜索范围[0, 4], mid = 2, arr[mid] = 65, 下轮循环的搜索范围[0, 2] 
第 3 轮循环，初始搜索范围[0, 2], mid = 1, arr[mid] = 36, 下轮循环的搜索范围[2, 2] 
在数组 [23, 36, 65, 69, 72, 89, 96, 99] 中比 60 大的最小值对应的索引是 2，其值为：65。

第 1 轮循环，初始搜索范围[0, 8], mid = 4, arr[mid] = 72, 下轮循环的搜索范围[5, 8] 
第 2 轮循环，初始搜索范围[5, 8], mid = 6, arr[mid] = 96, 下轮循环的搜索范围[5, 6] 
第 3 轮循环，初始搜索范围[5, 6], mid = 5, arr[mid] = 89, 下轮循环的搜索范围[5, 5] 
在数组 [23, 36, 65, 69, 72, 89, 96, 99] 中比 78 大的最小值对应的索引是 5，其值为：89。

第 1 轮循环，初始搜索范围[0, 8], mid = 4, arr[mid] = 72, 下轮循环的搜索范围[5, 8] 
第 2 轮循环，初始搜索范围[5, 8], mid = 6, arr[mid] = 96, 下轮循环的搜索范围[7, 8] 
第 3 轮循环，初始搜索范围[7, 8], mid = 7, arr[mid] = 99, 下轮循环的搜索范围[8, 8] 
在数组 [23, 36, 65, 69, 72, 89, 96, 99] 中比 99 大的最小值对应的索引是 8，其值为：0。
```

```PHP
public function up($arr, $target)
{
    // 不带调试代码的upper方法
    $l = 0;
    $r = count($arr);
    while ($l < $r) {
        $mid = floor(($l + $r) / 2);
        if ($target >= $arr[$mid]) {
            $l = $mid + 1;
        } else {
            $r = $mid;
        }
    }
    return $l;
}
```

搜索范围是 arr[l, r]，其中 l = 0，r = count(arr)。需要注意的是，这里的 r 就是数组的长度，而不是 r = count(arr) - 1。

一开始我还在纠结如果 r = count(arr) 会不会造成越界的问题，因为 arr[count(arr)] 是没有对应的值的。

其实是不会的，在测试用例中，我设置了三个值，target 分别是 60、78、99：

- 60 比 arr[mid] 即 72 小；
- 78 比 arr[mid] 即 72 大。
- 99 这个比较特殊，因为在数组中没有比 99 大的元素，选这个用例就是想看下会不会出现出界的问题。

从代码和输出可以看出：只有 arr[mid] 和 target 比较，但是 mid 永远不可能等于 r。例如当 target 等于 99 时，l 会不断的接近 r 但是永远不会等于 r，因为当 l = r 时循环终止了，所以不会出现出界的问题。
