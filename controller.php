<?php

require_once("vendor/autoload.php");
require_once("model.php");
require_once("trait.php");

class Controller
{

    use DataHelper;
    private $db;
    public function __construct()
    {
        $this->db = new Model();
    }

    public function readFile($filename)
    {
        if (file_exists($filename)) {
            if (str_contains(strtolower($filename), ".xml")) {
                return $this->readXML($filename);
            } else if (str_contains(strtolower($filename), ".json")) {
                return $this->readJSON($filename);
            } else if (str_contains(strtolower($filename), ".csv")) {
                return $this->readCSV($filename);
            } else {
                return [];
            }
        } else {
            return [];
        }
    }

    public function processFile($data)
    {
        
        if (isset($data[0])) {
            $validateKeys = array_keys((array)$data[0]);
            if ($this->dataValidity($validateKeys)) {
                $this->db->process($data);
            } else {
                echo "Invalid File Format ";
            }
        }
        else{
            echo "Invalid File Format ";
        }
    }

    private function readJSON($filename)
    {
        try {
            $response = [];
            $jsonData = file_get_contents($filename);
            if ($jsonData) {
                $response = json_decode($jsonData, true);
            }

            return $response;
        } catch (Throwable $e) {
            $this->log_error($e);
        } catch (Exception $e) {
            $this->log_error($e);
        }

    }

    private function readXML($filename)
    {
        try {
            $response = [];

            $feed = file_get_contents($filename);
            if ($feed) {
                $xml_array = simplexml_load_string($feed);
                $response = $xml_array->children();
            }

            return $response;
        } catch (Throwable $e) {
            $this->log_error($e);
        } catch (Exception $e) {
            $this->log_error($e);
        }
    }

    private function readCSV($filename)
    {
        try {

            $csvFile = fopen($filename, 'r');
            $headers = fgetcsv($csvFile);
            if (count($headers)) {
                $response = [];
                while (($row = fgetcsv($csvFile)) !== false) {
                    $response[] = array_combine($headers, $row);
                }
                fclose($csvFile);
                return $response;
            } else {
                return [];
            }
        } catch (Throwable $e) {
            $this->log_error($e);
        } catch (Exception $e) {
            $this->log_error($e);
        }

    }

    private function dataValidity($data)
    {
        $key_array = array(
            0 => 'entity_id',
            1 => 'CategoryName',
            2 => 'sku',
            3 => 'name',
            4 => 'description',
            5 => 'shortdesc',
            6 => 'price',
            7 => 'link',
            8 => 'image',
            9 => 'Brand',
            10 => 'Rating',
            11 => 'CaffeineType',
            12 => 'Count',
            13 => 'Flavored',
            14 => 'Seasonal',
            15 => 'Instock',
            16 => 'Facebook',
            17 => 'IsKCup',
        );

        if ($data == $key_array) {
            return true;
        } else {
            return false;
        }

    }
}