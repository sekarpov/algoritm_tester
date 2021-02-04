<?php

require_once "ITask.php";

class StringLength implements ITask
{

    public function Run($data = []): string
    {
        return $data[0];
    }
}