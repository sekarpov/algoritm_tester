<?php


class Paint
{
    public $map = [];
    public $w;
    public $h;
    public $symbols = " #+0x";

    public function __construct(int $w, int $h)
    {
        $this->w = $w;
        $this->h = $h;
        $this->map = array_fill(1, $h, array_fill(1, $w, " "));
    }

    public function setMap(int $x, int $y, $number)
    {
        $this->map[$y][$x] = $number;
        $this->printAt($x, $y);
    }

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
        echo PHP_EOL;
    }

    public function isEmpty(int $x, int $y) : bool
    {
        if($x < 0 || $x > $this->w) return false;
        if($y < 0 || $y > $this->h) return false;
        if(!isset($this->map[$y][$x])) return false;

        return $this->map[$y][$x] === " ";
    }

    public function Fill(int $x, int $y)
    {
        if(!$this->isEmpty($x, $y)) return;
        $this->setMap($x, $y, 2);
        $this->Fill($x - 1, $y);
        $this->Fill($x + 1, $y);
        $this->Fill($x, $y - 1);
        $this->Fill($x, $y + 1);
        $this->setMap($x, $y, 4);

    }
}