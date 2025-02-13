<?php
namespace app\Models;

class ExampleModel
{
    private $exampleData;
    public function __construct()
    {
        $this->exampleData = "Example";
    }
    public function getData()
    {
        return $this->exampleData;
    }
}

