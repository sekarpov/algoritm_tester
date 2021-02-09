<?php

require_once "ITask.php";

class Nod implements ITask
{

    public $a;
    public $b;

    public function Run($data = []): string
    {
        $this->a = explode(':',$data[0])['0'];
        $this->b = explode(':',$data[0])['1'];

        $nod = $this->gcd($this->a, $this->b);

        echo $nod;

        return $nod;
    }

    /**
     * Нахождение НОД вычитанием
     *
     * @param $a
     * @param $b
     * @return int
     */
    public function calculateNodMinus($a, $b) : int
    {
        while ($a != $b)
        {
            if ($a > $b) {
                $a = $a - $b;
            } else {
                $b = $b - $a;
            }
        }

        return $b;
    }

    /**
     * Нахождение НОД остатком от деления
     *
     * @param $a
     * @param $b
     * @return int
     */
    public function calculateNodDivision($a, $b) : int
    {
        while ($a != 0 && $b != 0)
        {
            if ($a > $b) {
                $a = $a % $b;
            } else {
                $b = $b % $a;
            }
        }

        if($b == 0) return $a;

        return $b;
    }

    /**
     * Нахождение НОД остатком от деления (вариант с рекурсией)
     *
     * @param int $a
     * @param int $b
     * @return int
     */
    public function gcd(int $a, int $b) : int
    {
        if ($b == 0 ) return $a;
        return $this->gcd($b, $a % $b);
    }
}