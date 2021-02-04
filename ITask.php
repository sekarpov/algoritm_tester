<?php


interface ITask
{
    public function Run($data = []) : string;
}