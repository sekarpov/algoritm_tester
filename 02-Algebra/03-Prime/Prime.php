<?php

require_once "ITask.php";

class Prime implements ITask
{

    public $a;
    public $b;

    public function Run($data = []): string
    {
        $this->a = explode(':',$data[0])['0'];
        $this->b = explode(':',$data[0])['1'];

        $res = $this->countPrime($this->a, $this->b);

        echo $res;

        return $res;
    }

    /**
     * Проверка является ли число простым
     * т.е. делиться ТОЛЬКО на себя и на единицу
     *
     * @param $p
     *
     * @return bool
     */
    public function isPrime1($p)
    {
        $d = 0;
        for ($i = 1; $i <= $p; $i++) {
            if($p % $i == 0){
                $d++;
            }
        }

        return $d == 2;
    }

    /**
     * Проверка является ли число простым
     * т.е. делиться ТОЛЬКО на себя и на единицу
     *
     * @param $p
     *
     * @return bool
     */
    public function isPrime2($p)
    {
        if($p == 2 || $p == 3) return true;
        for ($i = 3; $i*$i <= $p; $i += 2) {
            if($p % $i == 0 || $p % 2 == 0){
                return false;
            }
        }
        return true;
    }

    /**
     * Посчитать количество простых чисел в определенном диапазоне $from $to
     *
     * @param $from
     * @param $to
     *
     * @return int
     */
    public function countPrime($from, $to)
    {
        $count = 0;
        for ($i = $from; $i <= $to; $i++) {
            if($this->isPrime2($i)){
                $count++;
            }
        }

        return $count;
    }


}