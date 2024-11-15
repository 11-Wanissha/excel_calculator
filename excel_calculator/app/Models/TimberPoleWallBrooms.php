<?php
namespace app\Models;

class SedData
{
    private $dataNumber;
    public function __construct()
    {
        $this->dataNumber = array(
            [
                'optionName' => '150 mm',
                'value' => 150
            ],
            [
                'optionName' => '175 mm',
                'value' => 175
            ],
            [
                'optionName' => '200 mm',
                'value' => 200
            ],
            [
                'optionName' => '225 mm',
                'value' => 225
            ],
            [
                'optionName' => '275 mm',
                'value' => 275
            ],
            [
                'optionName' => '300 mm',
                'value' => 300
            ],
            [
                'optionName' => '325 mm',
                'value' => 325
            ],
            [
                'optionName' => '350 mm',
                'value' => 350
            ],
            [
                'optionName' => '375 mm',
                'value' => 375
            ],
            [
                'optionName' => '400 mm',
                'value' => 400
            ]
        );
    }
    public function getAll()
    {
        return $this->dataNumber;
    }
}

class TimberGradeData
{
    private $gradeData;
    public function __construct()
    {
        $this->gradeData = array(
            'Green' => [
                'grade' => 'fb',
                'VSG10' => 11.7,
                'VSG8' => 11.7
            ],
            'Dry' => [
                'grade' => 'fb',
                'VSG10' => 20,
                'VSG8' => 14
            ],
        );
    }
    public function getValue($moisture, $vsg)
    {
        return $this->gradeData[$moisture][$vsg];
    }
}

class SmallDataSet
{
    private $k4;
    private $k5;
    private $k8;
    private $normal;
    private $high;
    public function __construct()
    {
        $this->k4 = 1;
        $this->k5 = 1;
        $this->k8 = 1;
        $this->normal = 38;
        $this->high = 52;
    }
    public function getAll()
    {
        return [
            'k4' => $this->k4,
            'k5' => $this->k5,
            'k8' => $this->k8,
            'normal' => $this->normal,
            'high' => $this->high,
        ];
    }
}

class DataTable
{
    private $dataTable;
    public function __construct()
    {
        $this->dataTable = array(
            '1/100x50' =>
                [
                    'b' => 90,
                    'd' => 45,
                    'size' => 0, // 0 is none 
                ],
            '2/100x50' => [
                'b' => 90,
                'd' => 45,
                'size' => 0, // 0 is none 
            ],
            '3/100x50' => [
                'b' => 90,
                'd' => 45,
                'size' => 0, // 0 is none 
            ],
            '1/150x50' => [
                'b' => 140,
                'd' => 45,
                'size' => 0, // 0 is none 
            ],
            '2/150x50' => [
                'b' => 140,
                'd' => 45,
                'size' => 0, // 0 is none 
            ],
            '3/150x50' => [
                'b' => 140,
                'd' => 45,
                'size' => 0, // 0 is none 
            ],
            '1/200x50' => [
                'b' => 190,
                'd' => 45,
                'size' => 0, // 0 is none 
            ],
            '2/200x50' => [
                'b' => 190,
                'd' => 45,
                'size' => 0, // 0 is none 
            ],
            '3/200x50' => [
                'b' => 190,
                'd' => 45,
                'size' => 0, // 0 is none 
            ],
            'Half-Rounds 125 Dia. Normal' => [
                'b' => 125,
                'size' => 1, // 1 is normal 
            ],
            'Half-Rounds 150 Dia. Normal' => [
                'b' => 150,
                'size' => 1, // 1 is normal 
            ],
            'Half-Rounds 200 Dia. Normal' => [
                'b' => 200,
                'size' => 1, // 1 is normal 
            ],
            'Half-Rounds 125 Dia. High' => [
                'b' => 125,
                'size' => 2, // 2 is high
            ],
            'Half-Rounds 150 Dia. High' => [
                'b' => 150,
                'size' => 2, // 2 is high
            ],
            'Half-Rounds 200 Dia. High' => [
                'b' => 200,
                'size' => 2, // 2 is high
            ],
        );
    }
    public function getData()
    {
        return $this->dataTable;
    }
    public function getName()
    {
        $newArray = [];
        foreach ($this->dataTable as $key => $value) {
            $newArray[] = [
                'optionName' => $key,
                'value' => $key,
            ];
        }
        return $newArray;
    }
}


class TimberPoleWallBrooms
{
    private $timberGradeData;
    private $dataSet;
    private $fromProperties;
    public function __construct()
    {
        $this->timberGradeData = new TimberGradeData();
        $this->dataSet = new DataTable();
        $this->dataSet = $this->dataSet->getData();
    }
    public function getData()
    {
        return $this->dataSet;
    }
    public function calculatedDataSet($b25, $d25, $f56)
    {
        //calulated Z
        foreach ($this->dataSet as $index => $dataSetValue) {
            $this->dataSet[$index]['Z'] = isset($dataSetValue['d']) ? $dataSetValue['b'] * pow($dataSetValue['d'], 2) / 6 : ((M_PI / 8 - 8 / (9 * M_PI)) * pow($dataSetValue['b'] / 2, 4)) / ($dataSetValue['b'] / 2 - (2 * $dataSetValue['b']) / (3 * M_PI));
        }

        //calculated Strenght by plank	
        $numberArr = [0.8, 2 * 0.8, 3 * 0.8, 0.8, 2 * 0.8, 3 * 0.8, 0.8, 2 * 0.8, 2 * 0.8];
        $countIndex = 0;
        $smallData = new SmallDataSet();
        $smallData = $smallData->getAll();
        foreach ($this->dataSet as $index => $dataSetValue) {
            switch ($dataSetValue['size']) {
                case 0:
                    $this->dataSet[$index]['mnStaticPlank'] = $numberArr[$countIndex] * $b25 * $smallData['k4'] * $smallData['k5'] * $smallData['k8'] * $f56 * ($dataSetValue['Z'] / pow(1000, 2));
                    $this->dataSet[$index]['mnSeismicPlank'] = $numberArr[$countIndex] * $d25 * $smallData['k4'] * $smallData['k5'] * $smallData['k8'] * $f56 * ($dataSetValue['Z'] / pow(1000, 2));
                    $countIndex++;
                    break;
                case 1:
                    $this->dataSet[$index]['mnStaticPlank'] = 0.8 * $b25 * $smallData['k4'] * $smallData['k5'] * $smallData['k8'] * $smallData['normal'] * ($dataSetValue['Z'] / pow(1000, 2));
                    $this->dataSet[$index]['mnSeismicPlank'] = 0.8 * $d25 * $smallData['k4'] * $smallData['k5'] * $smallData['k8'] * $smallData['normal'] * ($dataSetValue['Z'] / pow(1000, 2));
                    break;
                case 2:
                    $this->dataSet[$index]['mnStaticPlank'] = 0.8 * $b25 * $smallData['k4'] * $smallData['k5'] * $smallData['k8'] * $smallData['high'] * ($dataSetValue['Z'] / pow(1000, 2));
                    $this->dataSet[$index]['mnSeismicPlank'] = 0.8 * $d25 * $smallData['k4'] * $smallData['k5'] * $smallData['k8'] * $smallData['high'] * ($dataSetValue['Z'] / pow(1000, 2));
                    break;
                default:
                    break;
            }
        }
        $numberArr = [];
        $smallData = null;
        $countIndex = null;

        //calculated Strenght by meter	
        foreach ($this->dataSet as $index => $dataSetValue) {
            $this->dataSet[$index]['mnStaticMeter'] = round($dataSetValue['mnStaticPlank'] * (1000 / $dataSetValue['b']), 1);
            $this->dataSet[$index]['mnSeismicMeter'] = round($dataSetValue['mnSeismicPlank'] * (1000 / $dataSetValue['b']), 1);
        }
        return true;
    }
    public function getValueDataset($adopt, $isStatic)
    {
        switch ($isStatic) {
            case 0:
                return $this->dataSet[$adopt]['mnSeismicMeter'];
            case 1:
                return $this->dataSet[$adopt]['mnStaticMeter'];
            default:
                break;
        }
    }
    public function getValue($moisture, $vsg)
    {
        return $this->timberGradeData->getValue($moisture, $vsg);
    }
    public function getFromProperties()
    {
        $sedData = new SedData();
        $optionData = new DataTable();
        $this->fromProperties = [
            'title' => 'Timber Pole Retaining Wall Brooms Calculator',
            'url' => '/timber-pole-retaining-wall-brooms',
            'importUrl' => '/timber-pole-retaining-wall-brooms-import',
            'exportUrl' => '/timber-pole-retaining-wall-brooms-export',
            'show' => [0,1,2,8],
            'secTion' => array(
                [
                    'menu' => array(
                        [
                            'menuTitle' => '1. Pole cantilever wall parameters',
                            'input' => array(
                                [
                                    'inputType' => 'file',
                                    'slot' => 1,  // ถ้าใส่ มันจะเต็มทั้งแถว
                                    'label' => 'Import File', // required
                                    'id' => 'file', // required
                                    'name' => 'file',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Retained height (H)', // required
                                    'id' => 'B9', // required
                                    'name' => 'B9',
                                    'unit' => 'm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Embedded depth (L)', // required
                                    'id' => 'B10', // required
                                    'name' => 'B10',
                                    'unit' => 'm',
                                    'type' => 'number',
                                    'disabled' => true,
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Pole spacing (s)', // required
                                    'id' => 'B11', // required
                                    'name' => 'B11',
                                    'unit' => 'm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'dropdown',
                                    'label' => 'Pole diameter', // required
                                    'selectOption' => "Please Select",
                                    'id' => 'B12', // required
                                    'disabled' => false,
                                    // required
                                    'option' => $sedData->getAll(),
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Concrete diameter (D)', // required
                                    'id' => 'B13', // required
                                    'name' => 'B13',
                                    'unit' => 'mm',
                                    'type' => 'number',
                                    'disabled' => true,
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Soil friction angle (φ)', // required
                                    'id' => 'B14', // required
                                    'name' => 'B14',
                                    'unit' => 'degree',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Soil unit weight (γ)', // required
                                    'id' => 'B15', // required
                                    'name' => 'B15',
                                    'unit' => 'kN/m<sup>3</sup>',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Undrained shear strength (C<sub>u</sub>)', // required
                                    'id' => 'B16', // required
                                    'name' => 'B16',
                                    'unit' => 'kPa',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Surcharge (ω)', // required
                                    'id' => 'B17', // required
                                    'name' => 'B17',
                                    'unit' => 'kN/m<sup>2</sup>',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Peak ground acceleration (PGA)', // required
                                    'id' => 'B18', // required
                                    'name' => 'B18',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Static Load factor (SF)', // required
                                    'id' => 'B20', // required
                                    'name' => 'B20',
                                    'value' => 1.5,
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Active pressure coefficient (K<sub>a</sub>)', // required
                                    'id' => 'B21', // required
                                    'name' => 'B21',
                                    'type' => 'number',
                                    'disabled' => true,
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Seismic pressure coefficient (K<sub>ae</sub>)', // required
                                    'id' => 'B22', // required
                                    'name' => 'B22',
                                    'type' => 'number',
                                    'disabled' => true,
                                    'slot' => 1,
                                ],
                            ),
                        ],
                        [
                            'menuTitle' => '2. Timber pole properties',
                            'input' => array(
                                [
                                    'inputType' => 'text',
                                    'label' => 'k<sub>1,static</sub>', // required 
                                    'id' => 'B25', // required
                                    'name' => 'B25',
                                    'value' => 0.6,
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k<sub>1,seismic</sub>', // required
                                    'id' => 'D25', // required
                                    'name' => 'D25',
                                    'value' => 1,
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Reduction factor (φ)', // required
                                    'id' => 'F25', // required
                                    'name' => 'F25',
                                    'value' => 0.8,
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'dropdown',
                                    'label' => 'Trimming method', // required
                                    'selectOption' => "Please Select",
                                    'id' => 'F26', // required
                                    'disabled' => false,
                                    // required
                                    'option' => array(
                                        [
                                            'optionName' => "Shaving",
                                            'value' => 0,
                                        ],
                                        [
                                            'optionName' => "Peeling",
                                            'value' => 1,
                                        ],
                                    ),
                                ],
                                [
                                    'inputType' => 'dropdown',
                                    'label' => 'Moisture', // required
                                    'selectOption' => "Please Select",
                                    'id' => 'I27', // required
                                    'disabled' => false,
                                    // required
                                    'option' => array(
                                        [
                                            'optionName' => "Green",
                                            'value' => 'Green',
                                        ],
                                        [
                                            'optionName' => "Dry",
                                            'value' => "Dry",
                                        ],
                                    ),
                                ],
                                [
                                    'inputType' => 'dropdown',
                                    'label' => 'Bending strength (MPa)', // required
                                    'selectOption' => "Please Select",
                                    'id' => 'D28', // required
                                    'disabled' => false,
                                    // required
                                    'option' => array(
                                        [
                                            'optionName' => "High density",
                                            'value' => 0,
                                        ],
                                        [
                                            'optionName' => "Normal density",
                                            'value' => 1,
                                        ],
                                    ),
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k<sub>20</sub>', // required
                                    'id' => 'B26', // required
                                    'name' => 'B26',
                                    'type' => 'number',
                                    'disabled' => true,
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k<sub>8</sub>', // required
                                    'id' => 'B27', // required
                                    'name' => 'B27',
                                    'value' => 1,
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k<sub>21</sub>', // required
                                    'id' => 'D27', // required
                                    'name' => 'D27',
                                    'value' => 0.85,
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k<sub>22</sub>', // required
                                    'id' => 'F27', // required
                                    'name' => 'F27',
                                    'type' => 'number',
                                    'disabled' => true,
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'f<sub>b</sub>', // required
                                    'id' => 'B28', // required
                                    'name' => 'B28',
                                    'type' => 'number',
                                    'unit' => 'MPa',
                                    'disabled' => true,
                                    'slot' => 1,
                                ],

                            ),
                        ],
                        [
                            'menuTitle' => '3. Check timber rails',
                            'subMenu' => array(
                                [
                                    'subMenuTitle' => '3.1 Max.e',
                                    'input' => array(
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Max.e', // required
                                            'id' => 'B59', // required
                                            'name' => 'B59',
                                            'type' => 'number',
                                            'unit' => 'm',
                                            'value' => 0,
                                            'disabled' => true,
                                            'slot' => 1,
                                        ],
                                        [
                                            'inputType' => 'table',
                                            'slot' => 1,
                                            'column' => array(
                                                [
                                                    'id' => "mstatic",
                                                    'label' => "Mstatic",
                                                ],
                                                [
                                                    'id' => "Mn,static",
                                                    'label' => "φMn,static",
                                                    'unit' => "kN·m",
                                                ],
                                                [
                                                    'id' => "ok",
                                                    'label' => "OK/NG!",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mstatic' => array(
                                                        [
                                                            'text' => '<p id="G59" name="G59">0</p>',
                                                        ]
                                                    ),
                                                    'Mn,static' => array(
                                                        [
                                                            'text' => '<p id="I59" name="I59">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p id="K59" name="K59">-</p>',
                                                        ]
                                                    ),
                                                ],
                                            ),
                                        ],
                                        [
                                            'inputType' => 'table',
                                            'slot' => 1,
                                            'column' => array(
                                                [
                                                    'id' => "mseismic",
                                                    'label' => "Mseismic",
                                                ],
                                                [
                                                    'id' => "mn,seismic",
                                                    'label' => "φMn,seismic",
                                                    'unit' => "kN·m",
                                                ],
                                                [
                                                    'id' => "ok",
                                                    'label' => "OK/NG!",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mseismic' => array(
                                                        [
                                                            'text' => '<p id="G60" name="G60">0</p>',
                                                        ]
                                                    ),
                                                    'mn,seismic' => array(
                                                        [
                                                            'text' => '<p id="I60" name="I60">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p id="K60" name="K60">-</p>',
                                                        ]
                                                    ),
                                                ],
                                            ),
                                        ],
                                        [
                                            'inputType' => 'dropdown',
                                            'label' => 'Adopt', // required
                                            'selectOption' => "Please Select",
                                            'id' => 'E61', // required
                                            'disabled' => false,
                                            // required
                                            'option' => $optionData->getName(),
                                            'slot' => 1,
                                        ],
                                    ),
                                ],
                                [
                                    'subMenuTitle' => '3.2 Max.e',
                                    'input' => array(
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Max.e', // required
                                            'id' => 'B63', // required
                                            'name' => 'B63',
                                            'type' => 'number',
                                            'unit' => 'm',
                                            'slot' => 1,
                                        ],
                                        [
                                            'inputType' => 'table',
                                            'slot' => 1,
                                            'column' => array(
                                                [
                                                    'id' => "mstatic",
                                                    'label' => "Mstatic",
                                                ],
                                                [
                                                    'id' => "Mn,static",
                                                    'label' => "φMn,static",
                                                    'unit' => "kN·m",
                                                ],
                                                [
                                                    'id' => "ok",
                                                    'label' => "OK/NG!",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mstatic' => array(
                                                        [
                                                            'text' => '<p id="G63" name="G63">0</p>',
                                                        ]
                                                    ),
                                                    'Mn,static' => array(
                                                        [
                                                            'text' => '<p id="I63" name="I63">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p id="K63" name="K63">-</p>',
                                                        ]
                                                    ),
                                                ],
                                            ),
                                        ],
                                        [
                                            'inputType' => 'table',
                                            'slot' => 1,
                                            'column' => array(
                                                [
                                                    'id' => "mseismic",
                                                    'label' => "Mseismic",
                                                ],
                                                [
                                                    'id' => "mn,seismic",
                                                    'label' => "φMn,seismic",
                                                    'unit' => "kN·m",
                                                ],
                                                [
                                                    'id' => "ok",
                                                    'label' => "OK/NG!",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mseismic' => array(
                                                        [
                                                            'text' => '<p id="G64" name="G64">0</p>',
                                                        ]
                                                    ),
                                                    'mn,seismic' => array(
                                                        [
                                                            'text' => '<p id="I64" name="I64">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p id="K64" name="K64">-</p>',
                                                        ]
                                                    ),
                                                ],
                                            ),
                                        ],
                                        [
                                            'inputType' => 'dropdown',
                                            'label' => 'Adopt', // required
                                            'selectOption' => "Please Select",
                                            'id' => 'E65', // required
                                            'disabled' => false,
                                            // required
                                            'option' => $optionData->getName(),
                                            'slot' => 1,
                                        ],
                                    ),
                                ],
                                [
                                    'subMenuTitle' => '3.3 Max.e',
                                    'input' => array(
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Max.e', // required
                                            'id' => 'B67', // required
                                            'name' => 'B67',
                                            'type' => 'number',
                                            'unit' => 'm',
                                            'slot' => 1,
                                        ],
                                        [
                                            'inputType' => 'table',
                                            'slot' => 1,
                                            'column' => array(
                                                [
                                                    'id' => "mstatic",
                                                    'label' => "Mstatic",
                                                ],
                                                [
                                                    'id' => "Mn,static",
                                                    'label' => "φMn,static",
                                                    'unit' => "kN·m",
                                                ],
                                                [
                                                    'id' => "ok",
                                                    'label' => "OK/NG!",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mstatic' => array(
                                                        [
                                                            'text' => '<p id="G67" name="G67">0</p>',
                                                        ]
                                                    ),
                                                    'Mn,static' => array(
                                                        [
                                                            'text' => '<p id="I67" name="I67">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p id="K67" name="K67">-</p>',
                                                        ]
                                                    ),
                                                ],
                                            ),
                                        ],
                                        [
                                            'inputType' => 'table',
                                            'slot' => 1,
                                            'column' => array(
                                                [
                                                    'id' => "mseismic",
                                                    'label' => "Mseismic",
                                                ],
                                                [
                                                    'id' => "mn,seismic",
                                                    'label' => "φMn,seismic",
                                                    'unit' => "kN·m",
                                                ],
                                                [
                                                    'id' => "ok",
                                                    'label' => "OK/NG!",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mseismic' => array(
                                                        [
                                                            'text' => '<p id="G68" name="G68">0</p>',
                                                        ]
                                                    ),
                                                    'mn,seismic' => array(
                                                        [
                                                            'text' => '<p id="I68" name="I68">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p id="K68" name="K68">-</p>',
                                                        ]
                                                    ),
                                                ],
                                            ),
                                        ],
                                        [
                                            'inputType' => 'dropdown',
                                            'label' => 'Adopt', // required
                                            'selectOption' => "Please Select",
                                            'id' => 'E69', // required
                                            'disabled' => false,
                                            // required
                                            'option' => $optionData->getName(),
                                            'slot' => 1,
                                        ],
                                    ),
                                ],
                            ),
                            'input' => array(
                                [
                                    'inputType' => 'dropdown',
                                    'label' => 'Timber Grade', // required
                                    'selectOption' => "Please Select",
                                    'id' => 'B56', // required
                                    'disabled' => false,
                                    // required
                                    'option' => array(
                                        [
                                            'optionName' => "VSG8",
                                            'value' => 'VSG8',
                                        ],
                                        [
                                            'optionName' => "VSG10",
                                            'value' => 'VSG10',
                                        ],
                                    ),
                                ],
                                [
                                    'inputType' => 'dropdown',
                                    'label' => 'Moisture', // required
                                    'selectOption' => "Please Select",
                                    'id' => 'B57', // required
                                    'disabled' => false,
                                    // required
                                    'option' => array(
                                        [
                                            'optionName' => "Green",
                                            'value' => 'Green',
                                        ],
                                        [
                                            'optionName' => "Dry",
                                            'value' => 'Dry',
                                        ],
                                    ),
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Bending Charasteristic strength (MPa)(fb)', // required
                                    'id' => 'F56', // required
                                    'name' => 'F56',
                                    'type' => 'number',
                                    'value' => 0,
                                    'disabled' => true,
                                    'slot' => 1,
                                ],

                            ),
                        ],

                    ),
                ],
                [
                    'menu' => array(
                        [
                            'menuTitle' => '4. Check pole capacity',
                            'input' => array(
                                [
                                    'inputType' => 'table',
                                    'slot' => 1,
                                    'column' => array(
                                        [
                                            'id' => "name",
                                            'label' => "",
                                            'width' => '50px',
                                        ],
                                        [
                                            'id' => "Pu",
                                            'label' => "Pu",
                                            'unit' => 'kN',
                                            'width' => '200px',
                                        ],
                                        [
                                            'id' => "Mu",
                                            'label' => "Mu",
                                            'unit' => 'kN·m',
                                            'width' => '200px',
                                        ],
                                    ),
                                    'row' => array(
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Static Factored Demands',
                                                ]
                                            ),
                                            'Pu' => array(
                                                [
                                                    'text' => '<p id="C34" name="C34">0</p>',
                                                ]
                                            ),
                                            'Mu' => array(
                                                [
                                                    'text' => '<p id="F34" name="F34">0</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Seismic Factored Demands',
                                                ]
                                            ),
                                            'Pu' => array(
                                                [
                                                    'text' => '<p id="C38" name="C38">0</p>',
                                                ]
                                            ),
                                            'Mu' => array(
                                                [
                                                    'text' => '<p id="F38" name="F38">0</p>',
                                                ]
                                            ),
                                        ],
                                    ),
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Pole section modulus (Z)', // required
                                    'id' => 'B39', // required
                                    'name' => 'B39',
                                    'type' => 'number',
                                    'disabled' => true,
                                    'unit' => 'x103mm3',
                                    'slot' => 1,
                                ],
                                [
                                    'inputType' => 'table',
                                    'slot' => 1,
                                    'column' => array(
                                        [
                                            'id' => "name",
                                            'label' => "",
                                            'width' => '50px',
                                        ],
                                        [
                                            'id' => "value",
                                            'label' => "Value",
                                            'width' => '200px',
                                            'unit' => 'kN·m',
                                        ],
                                        [
                                            'id' => "moreSta",
                                            'label' => ">Mmax,static",
                                            'width' => '200px',
                                        ],
                                    ),
                                    'row' => array(
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'φMn,static',
                                                ]
                                            ),
                                            'value' => array(
                                                [
                                                    'text' => '<p id="E40" name="E40">0</p>',
                                                ]
                                            ),
                                            'moreSta' => array(
                                                [
                                                    'text' => '<p id="I40" name="I40">-</p>',
                                                ]
                                            ),
                                        ],
                                    ),
                                ],
                                [
                                    'inputType' => 'table',
                                    'slot' => 1,
                                    'column' => array(
                                        [
                                            'id' => "name",
                                            'label' => "",
                                            'width' => '50px',
                                        ],
                                        [
                                            'id' => "value",
                                            'label' => "Value",
                                            'width' => '200px',
                                            'unit' => 'kN·m',
                                        ],
                                        [
                                            'id' => "moreSeis",
                                            'label' => ">Mmax,seismic",
                                            'width' => '200px',
                                        ],
                                    ),
                                    'row' => array(
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'φMn,seismic',
                                                ]
                                            ),
                                            'value' => array(
                                                [
                                                    'text' => '<p id="E41" name="E41">0</p>',
                                                ]
                                            ),
                                            'moreSeis' => array(
                                                [
                                                    'text' => '<p id="I41" name="I41">-</p>',
                                                ]
                                            ),
                                        ],
                                    ),
                                ],
                            ),
                        ],
                        [
                            'menuTitle' => '5. Check pole embedment',
                            'input' => array(
                                [
                                    'inputType' => 'table',
                                    'slot' => 1,
                                    'column' => array(
                                        [
                                            'id' => "name",
                                            'label' => "",
                                            'width' => '50px',
                                        ],
                                        [
                                            'id' => "static",
                                            'label' => "Static",
                                            'width' => '200px',
                                        ],
                                        [
                                            'id' => "seismic",
                                            'label' => "Seismic",
                                            'width' => '200px',
                                        ],
                                    ),
                                    'row' => array(
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'e',
                                                ]
                                            ),
                                            'static' => array(
                                                [
                                                    'text' => '<p id="D45" name="D45">0 m</p>',
                                                ]
                                            ),
                                            'seismic' => array(
                                                [
                                                    'text' => '<p id="F45" name="F45">0 m</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 's/D',
                                                ]
                                            ),
                                            'static' => array(
                                                [
                                                    'text' => '<p id="D46" name="D46">0</p>',
                                                ]
                                            ),
                                            'seismic' => array(
                                                [
                                                    'text' => '<p id="F46" name="F46">0</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'k',
                                                ]
                                            ),
                                            'static' => array(
                                                [
                                                    'text' => '<p id="D47" name="D47">0</p>',
                                                ]
                                            ),
                                            'seismic' => array(
                                                [
                                                    'text' => '<p id="F47" name="F47">0</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'L2',
                                                ]
                                            ),
                                            'static' => array(
                                                [
                                                    'text' => '<p id="D48" name="D48">0 m</p>',
                                                ]
                                            ),
                                            'seismic' => array(
                                                [
                                                    'text' => '<p id="F48" name="F48">0 m</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'f',
                                                ]
                                            ),
                                            'static' => array(
                                                [
                                                    'text' => '<p id="D49" name="D49">0 m</p>',
                                                ]
                                            ),
                                            'seismic' => array(
                                                [
                                                    'text' => '<p id="F49" name="F49">0 m</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'g',
                                                ]
                                            ),
                                            'static' => array(
                                                [
                                                    'text' => '<p id="D50" name="D50">0 m</p>',
                                                ]
                                            ),
                                            'seismic' => array(
                                                [
                                                    'text' => '<p id="F50" name="F50">0 m</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Embedment (m)',
                                                ]
                                            ),
                                            'static' => array(
                                                [
                                                    'text' => '<p id="D51" name="D51">0 m</p>',
                                                ]
                                            ),
                                            'seismic' => array(
                                                [
                                                    'text' => '<p id="F51" name="F51">0 m</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Mmax',
                                                ]
                                            ),
                                            'static' => array(
                                                [
                                                    'text' => '<p id="D52" name="D52">0 Knm</p>',
                                                ]
                                            ),
                                            'seismic' => array(
                                                [
                                                    'text' => '<p id="F52" name="F52">0 Knm</p>',
                                                ]
                                            ),
                                        ],
                                    ),
                                ],
                            ),
                        ],
                        [
                            'menuTitle' => '6. Graphic',
                            'canvas' => '<canvas id="renderCanvas" touch-action="none"></canvas>',
                        ]
                    ),
                ],
            ),
        ];
        return $this->fromProperties;
    }
}

