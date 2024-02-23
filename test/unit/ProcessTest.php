<?php
use PHPUnit\Framework\TestCase;

require_once("model.php");

class ProcessTest extends TestCase
{
    public function test_check_process_function()
    {
        $model = new Model();
        $data = [
            [
                "entity_id" => "340",
                "CategoryName" => "Green Mountain Ground Coffee",
                "sku" => "20",
                "name" => "Green Mountain Coffee French Roast Ground Coffee 24 2.2oz Bag",
                "description" => "",
                "shortdesc" => "Green Mountain Coffee French Roast Ground Coffee 24 2.2oz Bag steeps cup after cup of smoky-sweet, complex dark roast coffee from Green Mountain Ground Coffee.",
                "price" => "41.6000",
                "link" => "http://www.coffeeforless.com/green-mountain-coffee-french-roast-ground-coffee-24-2-2oz-bag.html",
                "image" => "http://mcdn.coffeeforless.com/media/catalog/product/images/uploads/intro/frac_box.jpg",
                "Brand" => "Green Mountain Coffee",
                "Rating" => "0",
                "CaffeineType" => "Caffeinated",
                "Count" => "24",
                "Flavored" => "No",
                "Seasonal" => "No",
                "Instock" => "Yes",
                "Facebook" => "1",
                "IsKCup" => "0"
            ],
            [
                "entity_id" => "340",
                "CategoryName" => "Green Mountain Ground Coffee",
                "sku" => "20",
                "name" => "Green Mountain Coffee French Roast Ground Coffee 24 2.2oz Bag",
                "description" => "",
                "shortdesc" => "Green Mountain Coffee French Roast Ground Coffee 24 2.2oz Bag steeps cup after cup of smoky-sweet, complex dark roast coffee from Green Mountain Ground Coffee.",
                "price" => "41.6000",
                "link" => "http://www.coffeeforless.com/green-mountain-coffee-french-roast-ground-coffee-24-2-2oz-bag.html",
                "image" => "http://mcdn.coffeeforless.com/media/catalog/product/images/uploads/intro/frac_box.jpg",
                "Brand" => "Green Mountain Coffee",
                "Rating" => "0",
                "CaffeineType" => "Caffeinated",
                "Count" => "24",
                "Flavored" => "No",
                "Seasonal" => "No",
                "Instock" => "Yes",
                "Facebook" => "1",
                "IsKCup" => "0"
            ]
        ];
        $this->assertEquals(true, $model->process($data));
    }
}