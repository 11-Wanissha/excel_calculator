<?php

namespace app\Libraries;

class MainLib
{
    public function __construct() {}
    public function combineArray($key, array $arrays)
    {
        $combined = [];
        foreach ($arrays as $array) {
            if (isset($array[$key]) && is_array($array[$key])) {
                $combined = array_merge($combined, $array[$key]);
            }
        }
        return $combined;
    }

    public function isHtml($string)
    {
        return preg_match("/<[^<*]/", $string) != 0;
    }

    public function getTableCellId($tableCell, $cellKey)
    {
        $cell = is_array($tableCell) ? $tableCell[0][$cellKey] : $tableCell[$cellKey];

        preg_match('/id="([^"]*)"/', $cell, $matches);

        if (isset($matches[1])) {
            $id = $matches[1];
            return $id;
        } else {
            return '';
        }
    }

    public function getDropdownCellValue(array $options, $keyValue)
    {
        $val = '';

        foreach ($options as $option) {
            if ($option['value'] == $keyValue) {
                $val = $option['optionName'];
                break;
            }
        }

        return $val;
    }
}
