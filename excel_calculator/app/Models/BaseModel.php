<?php

namespace App\Models;

abstract class BaseModel
{
    protected $formProperties = [];
    protected $requiredFields = [];
    protected array $importFields = [];
    protected string $inputPrefix = 'Please fill up ';
    protected string $selectPrefix = 'Please select ';
    protected string $defaultExportName = 'report';

    public function getFormProperties()
    {
        return $this->formProperties;
    }

    public function validateRequiredFields(array $data)
    {
        foreach ($this->requiredFields as $key => $error) {
            if (!isset($data[$key]) || $data[$key] == '') {
                return [
                    'isValid' => false,
                    'error' => $error
                ];
            }
        }

        return ['isValid' => true];
    }
}
