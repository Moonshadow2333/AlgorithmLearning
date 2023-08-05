<?php

namespace Algorithm\UnionFind;

interface UF
{
    public function getSize(): int;
    public function isConected(int $p, int $q): bool;
    public function unionElements(int $p, int $q): void;
}
