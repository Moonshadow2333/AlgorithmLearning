<?php

class Meat
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
}
class Fruit
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
}
class Foo
{
    public function eat(Meat $meat)
    {
        echo 'eat '.$meat->name."\r";
    }
}
class Son extends Foo
{
    public function eat(Meat $meat)
    {
        echo 'eat '.$meat->name;
    }
}

$meat = new Meat('pork');
$fruit = new Fruit('apple');

$foo = new Foo();
$son = new Son();
$foo->eat($meat);
$son->eat($$meat);
