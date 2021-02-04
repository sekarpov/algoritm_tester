<?php
require_once "StringLength.php";
require_once "Tester.php";


$task = new StringLength();
$tester = new Tester($task, str_replace('\\', '\\\\', dirname(__FILE__)) . '\\checkFiles\\');
$tester->RunTest();