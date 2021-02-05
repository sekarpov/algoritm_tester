<?php

require_once "ITask.php";

class LuckyTickets implements ITask
{

    public $n;
    public $qty;

    public function Run($data = []): string
    {
        $this->qty = 0;
        $this->n = $data[0];
        $this->NextDigit(0, 0, 0);

        echo $this->qty;

        return $this->qty;
    }

    public function Tickets6()
    {
        $count = 6;
        return $count;
    }

    public function NextDigit($nr, $sum1, $sum2) : void
    {
        if($nr == 2 * $this->n){
            if($sum1 == $sum2){
                $this->qty++;
            }
            return;
        }

        for ($i = 0; $i <= 9; $i++)
        {
            if($nr < $this->n)
                $this->NextDigit($nr + 1, $sum1 + $i, $sum2);
            else
                $this->NextDigit($nr + 1, $sum1, $sum2 + $i);
        }

    }
}