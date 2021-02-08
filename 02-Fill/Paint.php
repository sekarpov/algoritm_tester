<?php

/**
 * Class Paint
 */
class Paint
{
    public $map = [];
    public $w;
    public $h;
    public $symbols = " #<>^vx";

    public function __construct(int $w, int $h)
    {
        $this->w = $w;
        $this->h = $h;
        /*
         * Карта - 2мерный массив
         */
        $this->map = array_fill(1, $h, array_fill(1, $w, " "));
    }

    /**
     * @param int $x
     * @param int $y
     * @param $number
     */
    public function setMap(int $x, int $y, $number)
    {
        $this->map[$y][$x] = $number;
        $this->printAt($x, $y);
    }

    /**
     * Отрисовка карты
     *
     * @param int $x
     * @param int $y
     */
    public function printAt(int $x, int $y)
    {
        $arr_symbols = str_split($this->symbols);
        $this->map[$y][$x] = $arr_symbols[$this->map[$y][$x]];

        foreach ($this->map as $i){
            foreach ($i as $j)
            {
                echo $j;
            }
            echo PHP_EOL;
        }
        usleep(50000);

        /**
         * Разделители между отрисовками карт
         */
        $separator = "";
        for ($i = 1; $i <= $this->w; $i++) {
            $separator .= "#";
        }
        echo $separator.PHP_EOL;
        echo $separator.PHP_EOL;

    }

    /**
     * @param int $x
     * @param int $y
     * @return bool
     */
    public function isEmpty(int $x, int $y) : bool
    {
        if($x < 0 || $x > $this->w) return false;
        if($y < 0 || $y > $this->h) return false;
        if(!isset($this->map[$y][$x])) return false;

        return $this->map[$y][$x] === " ";
    }

    /**
     * Отрисовка препятствий на карте
     *
     * @param int $count
     */
    public function putRandomNumbers(int $count)
    {
        for ($i = 0; $i < $count; $i++) {
            $x = rand(1, $this->w);
            $y = rand(1, $this->h);
            $this->map[$y][$x] = '#';
        }
    }

    /**
     * Алгоритм рекурсии для закрашивания
     *
     * @param int $x
     * @param int $y
     */
    public function Fill(int $x, int $y)
    {
        if(!$this->isEmpty($x, $y)) return;
        $this->setMap($x, $y, 2); $this->Fill($x - 1, $y);
        $this->setMap($x, $y, 3); $this->Fill($x + 1, $y);
        $this->setMap($x, $y, 4); $this->Fill($x, $y - 1);
        $this->setMap($x, $y, 5); $this->Fill($x, $y + 1);
        $this->setMap($x, $y, 6);

    }
}