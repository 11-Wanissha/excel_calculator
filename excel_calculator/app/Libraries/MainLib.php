<?php

namespace app\Libraries;

use PhpOffice\PhpSpreadsheet\RichText\RichText;

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

    function convertHtmlToRichText($text)
    {
        $richText = new RichText();

        // Updated pattern to include span, i, and b tags
        $pattern = '/<(sub|sup|span|i|b)(?:\s+style="([^"]*)")?>([^<]*)<\/(?:sub|sup|span|i|b)>/';
        $parts = preg_split($pattern, $text, -1, PREG_SPLIT_DELIM_CAPTURE);

        foreach ($parts as $index => $part) {
            // Plain text parts
            if ($index % 4 === 0) {
                if ($part !== '') {
                    $run = $richText->createTextRun($part);
                    $font = $run->getFont();
                    $font->setName('DejaVu Sans')
                        ->setSize(9);
                }
                continue;
            }

            // Tag name is at index % 4 === 1
            // Style attribute is at index % 4 === 2
            // Content is at index % 4 === 3
            if ($index % 4 === 3) {
                $run = $richText->createTextRun($part);
                $font = $run->getFont();
                $font->setName('DejaVu Sans')
                    ->setSize(9);

                $tagName = $parts[$index - 2];

                switch ($tagName) {
                    case 'sub':
                        $font->setSubScript(true);
                        break;
                    case 'sup':
                        $font->setSuperScript(true);
                        break;
                    case 'i':
                        $font->setItalic(true);
                        break;
                    case 'b':
                        $font->setBold(true);
                        break;
                    case 'span':
                        break;
                }
            }
        }

        return $richText;
    }
}
