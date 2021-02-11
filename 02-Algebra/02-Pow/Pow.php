<?php

require_once "ITask.php";

class Pow implements ITask
{

    public $a;
    public $b;

    public function Run($data = []): string
    {

        $this->a = explode(':',$data[0])['0'];
        $this->b = explode(':',$data[0])['1'];

        $pow = $this->calculatePowBin($this->a, $this->b);

        echo $pow;

        return $pow;
    }

    /**
     * Возведение в степень (самый простой вариант)
     *
     * @param $a
     * @param $b
     * @return int
     */
    public function calculatePow($a, $b)
    {
        $res = 1;
        for ($i = 1; $i <= $b; $i++) {
            $res *= $a;
        }

        return $res;
    }

    /**
     * Возведение в степень (вычисляет быстрее)
     *  a^2 * a^2
     *  a^4 * a^4
     *  a^8 * a^8
     *  и тд
     *  остальные степени превышающие $b домнажаем к имеющемуся результату
     *
     * @param $a
     * @param $b
     * @return int
     */
    public function calculatePow2($a, $b)
    {
        $maxB = 1;
        while($maxB * 2 < $b){
            $prevMaxB = $maxB;
            $a *= $a;
            $maxB *= 2;
        }

        $res = 1;
        for ($i = 1; $i <= $b - $prevMaxB; $i++) {
            $res *= $a;
        }

        return $res;
    }

    /**
     * Возведение в степень (самый быстрый способ)
     *
     * https://neerc.ifmo.ru/wiki/index.php?title=%D0%91%D1%8B%D1%81%D1%82%D1%80%D0%BE%D0%B5_%D0%B2%D0%BE%D0%B7%D0%B2%D0%B5%D0%B4%D0%B5%D0%BD%D0%B8%D0%B5_%D0%B2_%D1%81%D1%82%D0%B5%D0%BF%D0%B5%D0%BD%D1%8C
     */
    public function calculatePowBin($a, int $b)
    {
        $res = 1;
        while ($b > 0) {
            if($b % 2 == 1){
                $res *= $a;
            }
            $a *= $a;

            $b = intdiv($b, 2); // целочисленное деление
        }

        return $res;
    }


}