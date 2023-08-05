<?php

namespace Algorithm\DynamicArray;

interface Stack
{
    public function push($e);
    public function pop();
    public function peek();
    public function getSize(): int;
    public function isEmpty(): bool;
}
