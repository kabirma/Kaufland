<?php

trait DataHelper
{
    public function log_error($exception)
    {
        $log_array = [
            "CODE:".$exception->getCode(),
            $exception->getFile(),
            "LINE:" . $exception->getLine(),
            '{' . $exception->getMessage() . '}',
            date("Y-m-d H:i:s"),
        ];
        $error = implode(" ", $log_array);
        file_put_contents('logs.txt', $error . PHP_EOL, FILE_APPEND | LOCK_EX);
        echo "Error Occured with the code: ".$exception->getCode();
        die;
    }
}