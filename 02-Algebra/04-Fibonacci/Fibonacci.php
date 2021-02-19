<?php

require_once "ITask.php";

class Fibonacci implements ITask
{

    public function Run($data = []): string
    {
        $n = $data[0];

        $res = $this->fib_n($n);
        echo $res;

        return $res;
    }

    /**
     * Нахождение числа фибоначчи рекурсией
     * Рекурсивные алгоритмы ведут себя за экспоненциальное время.
     * @param $n
     *
     * @return int
     */
    public function f($n)
    {
        if($n == 0) return 0;
        if($n == 1) return 1;

        return $this->f($n-2) + $this->f($n-1);
    }


    /**
     * Линейное решение нахождения числа фибоначчи
     * O(n) времени
     *
     * @param $n
     *
     * @return int
     */
    public function fib_n($n)
    {
        if($n <= 2) return 1;
        $x = 1;
        $y = 1;
        $ans = 0;
        for ($i = 2; $i <= $n-1; $i++) {
            $ans = $x + $y;
            $x = $y;
            $y = $ans;
        }

        return $ans;
    }





}