<?php

class Student
{
    public $name;
    public $score;

    public function __construct($name, $score)
    {
        $this->name = $name;
        $this->score = $score;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function getScore()
    {
        return $this->score;
    }

    public function __toString()
    {
        return sprintf('Student(name: %s, score: %d)', $this->name, $this->score);
    }
}