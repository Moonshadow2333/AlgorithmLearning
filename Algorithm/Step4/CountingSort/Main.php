<?php

include 'Student.php';

class Main
{
    public static function test()
    {
        $n = 26 * 26 * 26 * 26;
        $k = 0;
        $students = [];
        $letters = range('a', 'z');

        for ($c1 = 0; $c1 <= 25; $c1 ++) {
            for ($c2 = 0; $c2 <= 25; $c2 ++) {
                for ($c3 = 0; $c3 <= 25; $c3 ++) {
                    for ($c4 = 0; $c4 <= 25; $c4 ++) {
                        $name = $letters[$c1].$letters[$c2].$letters[$c3].$letters[$c4];
                        $score = mt_rand(0, 100);
                        $students[$k] = new Student($name, $score);
                        $k++;
                    }
                }
            }
        }

        $r = 101;
        $cnt = array_fill(0, $r, 0);

        foreach ($students as $student) {
            $cnt[$student->getScore()] += 1;
        }
        // var_dump($cnt[0]);exit;
        $index = array_fill(0, $r, 0);
        for ($i = 0; $i < $r; $i ++) {
            $index[$i + 1] = $index[$i] + $cnt[$i];
        }
        
        $temp = array_fill(0, $r, 0);
        foreach ($students as $student) {
            $temp[$index[$student->getScore()]] = $student;
            $index[$student->getScore()] ++;
        }
        // var_dump($index);exit;
        
        for ($i = 0; $i < $n; $i ++) {
            $students[$i] = $temp[$i];
        }

        for ($i = 1; $i < $n; $i ++) {
            if ($students[$i - 1]->getScore() > $students[$i]->getScore()) {
                throw new Exception('sort error');
            }

            if ($students[$i - 1]->getScore() == $students[$i]->getScore()) {
                if (strcmp($students[$i - 1]->getName(), $students[$i]->getName()) > 0) {
                    var_dump($students[$i - 1]->getName(), $students[$i]->getName());
                    throw new Exception('None-stable');
                }
            }
        }



        echo 'success';
    }

    public function campareTo($str1, $str2)
    {
        if (strcmp($str1, $str2) == 0) {
            return 0;
        } elseif (strcmp($str1, $str2) > 0) {
            return 1;
        } elseif (strcmp($str1, $str2) < 0) {
            return -1;
        }
    }
}

Main::test();