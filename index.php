<?php

require_once("./vendor/autoload.php");

$start_time = microtime(true);

require_once("controller.php");

$fileName = "Feed/feed.xml";

$controller = new Controller();
$data = $controller->readFile($fileName);
if (count($data)) {
    $controller->processFile($data);
} else {
    echo "Invalid File Type or File does not exist! ";
}

$stop_time = microtime(true);

$execution_time = (($stop_time - $start_time) / 60) * 60;

echo 'Total Execution Time: ' . $execution_time . ' Secs';

