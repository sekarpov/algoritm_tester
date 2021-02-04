<?php


class Tester
{
    private $task;
    private $path;

    public function __construct(ITask $task, string $path)
    {
        $this->task = $task;
        $this->path = $path;
    }

    public function RunTest(): void
    {
        $nr = 0;

        while (true)
        {
            $inFile = $this->path . "test.$nr.in";
            $outFile = $this->path . "test.$nr.out";
            if (!file_exists($inFile) || !file_exists($outFile))
            {
                break;
            }

            echo "Test $nr - " . $this->RunTestBool($inFile, $outFile) . PHP_EOL;
            $nr++;
        }
    }

    public function RunTestBool(string $inFile, string $outFile)
    {
        try
        {
            $data = $this->readFile($inFile, true);;
            $expect = $this->readFile($outFile);;
            $actual = $this->task->Run($data);
            return $actual == $expect ? 'true' : 'false';
        }
        catch (Exception $e)
        {
            echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
            return false;
        }
    }

    public function readFile($file, $return_array = false)
    {
        if($return_array){
            $data = [];
        } else {
            $data = '';
        }
        $handle = fopen($file, "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                if($return_array){
                    $data[] = $line;
                } else {
                    $data .= $line;
                }
            }
            fclose($handle);
        }

        if($return_array){
            return $data;
        } else {
            return trim($data);
        }

    }
}