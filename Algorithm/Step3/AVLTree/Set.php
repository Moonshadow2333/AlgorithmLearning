<?php

namespace Algorithm\AVL;

interface Set
{
    public function add($e) :void;
    public function remove($e) :void;
    public function contains($e) :bool;
    public function getSize() :int;
    public function isEmpty() :bool;
}