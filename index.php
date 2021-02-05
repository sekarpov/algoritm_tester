<?php
require_once "StringLength.php";
require_once "01-LuckyTickets/LuckyTickets.php";
require_once "Tester.php";

/**
 * Тест
 */
//$task = new StringLength();
//$tester = new Tester($task, str_replace('\\', '\\\\', dirname(__FILE__)) . '\\checkFiles\\');

/**
 * Задача - Счастливые билеты
 */
$task = new LuckyTickets();
$tester = new Tester($task, str_replace('\\', '\\\\', dirname(__FILE__)) . '\\01-LuckyTickets\\checkFiles\\');

$tester->RunTest();