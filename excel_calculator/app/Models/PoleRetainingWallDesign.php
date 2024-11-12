<?php

namespace App\Models;

class PoleRetainingWallDesign extends BaseModel
{
    public function __construct()
    {
        $this->formProperties = [
            'title' => 'Timber Pole Retaining Wall Design',
            'url' => '/pole-retaining-wall-design',
            'importUrl' => '/pole-retaining-wall-design-import',
            'exportUrl' => '/pole-retaining-wall-design-export',
            'lastIndex' => 7,
            'secTion' => array(
                [
                    'menu' => array(
                        [
                            'menuTitle' => '1. Cantilever Wall Parameters',
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
                                    'label' => 'Wall height',
                                    'id' => 'B10',
                                    'name' => 'B10',
                                    'unit' => 'm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Pole spacing',
                                    'id' => 'B11',
                                    'name' => 'B11',
                                    'unit' => 'm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Backslope',
                                    'id' => 'B12',
                                    'name' => 'B12',
                                    'unit' => 'degree',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Toeslope',
                                    'id' => 'B13',
                                    'name' => 'B13',
                                    'unit' => 'degree',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Inactive zone',
                                    'id' => 'B14',
                                    'name' => 'B14',
                                    'unit' => 'm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Surcharge',
                                    'id' => 'B15',
                                    'name' => 'B15',
                                    'unit' => 'kPa',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Distance to surcharge',
                                    'id' => 'B16',
                                    'name' => 'B16',
                                    'unit' => 'm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Diameter of timber pole',
                                    'id' => 'B17',
                                    'name' => 'B17',
                                    'unit' => 'mm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Diameter of concrete',
                                    'id' => 'B18',
                                    'name' => 'B18',
                                    'unit' => 'mm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Depth of rotation',
                                    'id' => 'B19',
                                    'name' => 'B19',
                                    'unit' => 'm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Soil unit weight',
                                    'id' => 'B20',
                                    'name' => 'B20',
                                    'unit' => 'kN/m^3',
                                    'type' => 'number',
                                ],
                            )
                        ],
                        [
                            'menuTitle' => '2. Soil Parameters',
                            'input' => array(
                                [
                                    'inputType' => 'table',
                                    'slot' => 1,
                                    'column' => array(
                                        [
                                            'id' => 'name',
                                            'label' => '',
                                            'width' => '300px'
                                        ],
                                        [
                                            'id' => 'gravity',
                                            'label' => 'Gravity Case',
                                            'width' => '200px'
                                        ],
                                        [
                                            'id' => 'seismic',
                                            'label' => 'Seismic Case',
                                            'width' => '200px'
                                        ]
                                    ),
                                    'row' => array(
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Soil friction angle (degree)'
                                                ]
                                            ),
                                            'gravity' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="B24" name="B24" value="0"  /',
                                                ]
                                            ),
                                            'seismic' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="H24" name="H24" value="0"  /',
                                                ]
                                            )
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Soil shear strength (kPa)'
                                                ]
                                            ),
                                            'gravity' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="B25" name="B25" value="0"  /',
                                                ]
                                            ),
                                            'seismic' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="H25" name="H25" value="0"  /',
                                                ]
                                            )
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Load factor for surcharge'
                                                ]
                                            ),
                                            'gravity' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="B26" name="B26" value="0"  /',
                                                ]
                                            ),
                                            'seismic' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="H26" name="H26" value="0"  /',
                                                ]
                                            )
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Incorporate effect of backslope'
                                                ]
                                            ),
                                            'gravity' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="B27" name="B27" value="0"  /',
                                                ]
                                            ),
                                            'seismic' => array(
                                                [
                                                    'text' => '<input type="number" step="any" disabled class="form-control" id="H27" name="H27" value="0.42"  /',
                                                ]
                                            )
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Passive resistance'
                                                ]
                                            ),
                                            'gravity' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="B28" name="B28" value="0"  /',
                                                ]
                                            ),
                                            'seismic' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="H28" name="H28" value="0"  /',
                                                ]
                                            )
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Factor of Safety/Load factor'
                                                ]
                                            ),
                                            'gravity' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="B29" name="B29" value="0"  /',
                                                ]
                                            ),
                                            'seismic' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="H29" name="H29" value="0"  /',
                                                ]
                                            )
                                        ]
                                    )
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Leveling distance in front of wall for toeslope allowance',
                                    'name' => 'B33',
                                    'unit' => 'm',
                                    'id' => 'B33',
                                    'type' => 'number',
                                    'value' => '1',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'H(rs)',
                                    'name' => 'J33',
                                    'unit' => 'm',
                                    'id' => 'J33',
                                    'type' => 'number',
                                    'disabled' => true
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Total Retained Height',
                                    'name' => 'F35',
                                    'unit' => 'm',
                                    'id' => 'F35',
                                    'type' => 'number',
                                    'disabled' => true
                                ],
                            ),
                        ],
                        [
                            'menuTitle' => '3. Seismic Parameters',
                            'subMenu' => array(
                                [
                                    'subMenuTitle' => '3.1 Seismic Parameters (based on Module 6)',
                                    'input' => array(
                                        [
                                            'inputType' => 'text',
                                            'label' => 'A (topo)',
                                            'name' => 'B39',
                                            'unit' => 'm',
                                            'id' => 'B39',
                                            'type' => 'number'
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'W (d)',
                                            'name' => 'B40',
                                            'id' => 'B40',
                                            'type' => 'number'
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'a (max)',
                                            'name' => 'B41',
                                            'id' => 'B41',
                                            'type' => 'number'
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'k (h)',
                                            'name' => 'B42',
                                            'id' => 'B42',
                                            'type' => 'number',
                                            'disabled' => true
                                        ],
                                    )
                                ],
                                [
                                    'subMenuTitle' => '3.2 Calculation of K (aeh)',
                                    'input' => array(
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Slop of the wall',
                                            'name' => 'G39',
                                            'id' => 'G39',
                                            'type' => 'number',
                                            'unit' => 'degree'
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Angle of interface friction (active)',
                                            'name' => 'G40',
                                            'id' => 'G40',
                                            'type' => 'number',
                                            'unit' => 'degree'
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'k (h)',
                                            'name' => 'G41',
                                            'id' => 'G41',
                                            'type' => 'number',
                                            'disabled' => true,
                                            'unit' => 'degree'
                                        ],
                                    )
                                ]
                            ),
                            'input' => array(
                                [
                                    'inputType' => 'text',
                                    'label' => 'Ψ', // required
                                    'name' => 'H45',
                                    'id' => 'H45',
                                    'type' => 'number',
                                    'disabled' => true,
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'K<sub>ae</sub>', // required
                                    'name' => 'H46',
                                    'id' => 'H46',
                                    'type' => 'number',
                                    'disabled' => true,
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'K<sub>aeh</sub>', // required
                                    'name' => 'H47',
                                    'id' => 'H47',
                                    'type' => 'number',
                                    'disabled' => true,
                                ],
                                [
                                    'inputType' => 'table',
                                    'slot' => 1,
                                    'column' => array(
                                        [
                                            'id' => 'name',
                                            'label' => '',
                                        ],
                                        [
                                            'id' => 'gravity',
                                            'label' => 'Gravity Case'
                                        ],
                                        [
                                            'id' => 'seismic',
                                            'label' => 'Seismic Case'
                                        ],
                                    ),
                                    'row' => array(
                                        [
                                            'name' => array(['text' => 'Driving Moment from active soil pressure and surcharge']),
                                            'gravity' => array(['text' => '']),
                                            'seismic' => array(['text' => ''])
                                        ],
                                        [
                                            'name' => array(['text' => '<span>M</span><sub>d</sub> (kN.m/m)']),
                                            'gravity' => array(['text' => '<input type="number" disabled step="any"  class="form-control" id="B52" name="B52" value=""  /',]),
                                            'seismic' => array(['text' => '<input type="number" disabled step="any"  class="form-control" id="H52" name="H52" value=""  /',])
                                        ],
                                        [
                                            'name' => array(['text' => 'Restoring moment about base from passive soil pressure']),
                                            'gravity' => array(['text' => '']),
                                            'seismic' => array(['text' => ''])
                                        ],
                                        [
                                            'name' => array(['text' => '<span>M</span><sub>r</sub> (kN.m/m)']),
                                            'gravity' => array(['text' => '<input type="number" disabled step="any"  class="form-control" id="B56" name="B56" value=""  /',]),
                                            'seismic' => array(['text' => '<input type="number" disabled step="any"  class="form-control" id="H56" name="H56" value=""  /',])
                                        ],
                                        [
                                            'name' => array(['text' => 'Chech Factor of Safety']),
                                            'gravity' => array(['text' => '']),
                                            'seismic' => array(['text' => ''])
                                        ],
                                        [
                                            'name' => array(['text' => 'FS / <span>FS</span><sub>EQ</sub>']),
                                            'gravity' => array(['text' => '<input type="number" disabled step="any"  class="form-control" id="C59" name="C59" value=""  /',]),
                                            'seismic' => array(['text' => '<input type="number" disabled step="any"  class="form-control" id="I59" name="I59" value=""  /',])
                                        ],
                                    )
                                ],
                                [
                                    'inputType' => 'text',
                                    'type' => 'number',
                                    'label' => 'Depth of Embedment',
                                    'disabled' => true,
                                    'id' => 'F61',
                                    'name' => 'F61',
                                    'unit' => 'm',
                                    'slot' => 1,
                                ]
                            )
                        ]
                    )
                ],
                [
                    'menu' => array(
                        [
                            'menuTitle' => '4. Pole Demand',
                            'input' => array(
                                [
                                    'inputType' => 'table',
                                    'slot' => 1,
                                    'column' => array(
                                        [
                                            'id' => 'name',
                                            'label' => '',
                                        ],
                                        [
                                            'id' => 'gravity',
                                            'label' => 'Gravity Case',
                                        ],
                                        [
                                            'id' => 'seismic',
                                            'label' => 'Seismic Case'
                                        ]
                                    ),
                                    'row' => array(
                                        [
                                            'name' => array(['text' => 'Determine depth below ground to zero shear']),
                                            'gravity' => array(['text' => '']),
                                            'seismic' => array(['text' => '']),
                                        ],
                                        [
                                            'name' => array(['text' => 'Z<sub>bmax</sub> (m)']),
                                            'gravity' => array(['text' => '<input type="number" step="any"  class="form-control" id="B72" name="B72" value=""  /',]),
                                            'seismic' => array(['text' => '<input type="number" step="any"  class="form-control" id="H72" name="H72" value=""  /',])
                                        ],
                                        [
                                            'name' => array(['text' => 'V<sub>bmax</sub> (kN/m)']),
                                            'gravity' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="B75" name="B75" value=""  /',]),
                                            'seismic' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="H75" name="H75" value=""  /',])
                                        ],
                                        [
                                            'name' => array(['text' => 'Maximum Bending Moment in pole']),
                                            'gravity' => array(['text' => '']),
                                            'seismic' => array(['text' => '']),
                                        ],
                                        [
                                            'name' => array(['text' => 'M* (kNm)']),
                                            'gravity' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="B80" name="B80" value=""  /',]),
                                            'seismic' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="H80" name="H80" value=""  /',])
                                        ],
                                    )
                                ]
                            )
                        ],
                        [
                            'menuTitle' => '5. Timber Pole Strength',
                            'subMenu' => array(
                                [
                                    'subMenuTitle' => '5.1 Serviceability Check',
                                    'input' => array(
                                        [
                                            'inputType' => 'text',
                                            'label' => 'E',
                                            'id' => 'E93',
                                            'name' => 'E93',
                                            'type' => 'number',
                                            'unit' => 'GPa',
                                            'disabled' => true
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'k<sub>20</sub>',
                                            'id' => 'H93',
                                            'name' => 'H93',
                                            'type' => 'text',
                                            'unit' => 'mm',
                                            'disabled' => true
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Assessing deflection under unfactored soil load only',
                                            'id' => 'B95',
                                            'name' => 'B95',
                                            'type' => 'number',
                                            'unit' => 'mm',
                                            'disabled' => true
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => '% of H',
                                            'id' => 'E95',
                                            'name' => 'E95',
                                            'type' => 'number',
                                            'unit' => '%',
                                            'disabled' => true
                                        ],
                                    )
                                ]
                            ),
                            'input' => array(
                                [
                                    'inputType' => 'text',
                                    'label' => 'Reduction Factor (φ)',
                                    'id' => 'B84',
                                    'name' => 'B84',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Steaming factor (k21)',
                                    'id' => 'F84',
                                    'name' => 'F84',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k8',
                                    'id' => 'B85',
                                    'name' => 'B85',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Dry use factor (k22)',
                                    'id' => 'F85',
                                    'name' => 'F85',
                                    'type' => 'number',
                                    'value' => '1',
                                    'readonly' => true
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k1 (Gravity Case)',
                                    'id' => 'J84',
                                    'name' => 'J84',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k1 (Seismic Case)',
                                    'id' => 'J85',
                                    'name' => 'J85',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'dropdown',
                                    'label' => 'Trimming method',
                                    'id' => 'C86',
                                    'name' => 'C86',
                                    'selectOption' => 'Please Select',
                                    'option' => array(
                                        [
                                            'optionName' => 'Specify method',
                                            'value' => 'specify',
                                        ],
                                        [
                                            'optionName' => 'Shaving',
                                            'value' => 'shaving'
                                        ],
                                        [
                                            'optionName' => 'Peeling',
                                            'value' => 'peeling'
                                        ]
                                    )
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k20',
                                    'id' => 'F86',
                                    'name' => 'F86',
                                    'type' => 'text',
                                    'disabled' => true,
                                ],
                                [
                                    'inputType' => 'dropdown',
                                    'label' => 'Pole density',
                                    'id' => 'C87',
                                    'name' => 'C87',
                                    'selectOption' => 'Please Select',
                                    'option' => array(
                                        [
                                            'optionName' => 'High',
                                            'value' => 'high'
                                        ],
                                        [
                                            'optionName' => 'Normal',
                                            'value' => 'normal'
                                        ]
                                    )
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'f<sub>b</sub>',
                                    'id' => 'F87',
                                    'name' => 'F87',
                                    'type' => 'number',
                                    'disabled' => true,
                                    'unit' => 'MPa'
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Pole diameter, d',
                                    'id' => 'J87',
                                    'name' => 'J87',
                                    'type' => 'number',
                                    'disabled' => true,
                                    'unit' => 'mm',
                                    'slot' => 1,
                                ],
                                [
                                    'inputType' => 'table',
                                    'slot' => 1,
                                    'column' => array(
                                        [
                                            'id' => 'name',
                                            'label' => '',
                                        ],
                                        [
                                            'id' => 'gravity',
                                            'label' => 'Gravity Case',
                                        ],
                                        [
                                            'id' => 'seismic',
                                            'label' => 'Seismic Case'
                                        ]
                                    ),
                                    'row' => array(
                                        [
                                            'name' => array(['text' => 'φM<sub>n</sub> (kMn)']),
                                            'gravity' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="B90" name="B90" value=""  /',]),
                                            'seismic' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="H90" name="H90" value=""  /',])
                                        ],
                                    )
                                ]
                            )
                        ],
                        [
                            'menuTitle' => '6. Timber Whalers',
                            'subMenu' => array(
                                [
                                    'subMenuTitle' => '6.1 Whalers #1',
                                    'input' => array(
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Number of whaler, #',
                                            'id' => 'J98',
                                            'name' => 'J98',
                                            'value' => '1',
                                            'type' => 'number',
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => '@H',
                                            'id' => 'B98',
                                            'name' => 'B98',
                                            'type' => 'number',
                                            'unit' => 'm',
                                        ],
                                        [
                                            'inputType' => 'dropdown',
                                            'label' => 'Whaler type',
                                            'id' => 'F98',
                                            'name' => 'F98',
                                            'selectOption' => 'Please Select',
                                            'option' => array(
                                                [
                                                    'optionName' => 'Plank',
                                                    'value' => 'plank'
                                                ],
                                                [
                                                    'optionName' => 'Round',
                                                    'value' => 'round'
                                                ]
                                            )
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Thickness',
                                            'id' => 'B99',
                                            'name' => 'B99',
                                            'type' => 'number',
                                            'unit' => 'mm',
                                        ],
                                        [
                                            'inputType' => 'dropdown',
                                            'label' => 'Density',
                                            'id' => 'F99',
                                            'name' => 'F99',
                                            'selectOption' => 'Please Select',
                                            'option' => array(
                                                [
                                                    'optionName' => 'Normal',
                                                    'value' => 'normal'
                                                ],
                                                [
                                                    'optionName' => 'High',
                                                    'value' => 'high'
                                                ]
                                            )
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'f<sub>b</sub>',
                                            'id' => 'J99',
                                            'name' => 'J99',
                                            'type' => 'number',
                                            'unit' => 'Mpa',
                                            'disabled' => true,
                                        ],
                                        [
                                            'inputType' => 'table',
                                            'slot' => 1,
                                            'column' => array(
                                                [
                                                    'id' => 'name',
                                                    'label' => '',
                                                ],
                                                [
                                                    'id' => 'gravity',
                                                    'label' => 'Gravity Case',
                                                ],
                                                [
                                                    'id' => 'seismic',
                                                    'label' => 'Seismic Case'
                                                ]
                                            ),
                                            'row' => array(
                                                [
                                                    'name' => array(['text' => 'w* (kN/m/m)']),
                                                    'gravity' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="D103" name="D103" value=""  /',]),
                                                    'seismic' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="J103" name="J103" value=""  /',])
                                                ],
                                                [
                                                    'name' => array(['text' => 'M* (kNm/m)']),
                                                    'gravity' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="D104" name="D104" value=""  /',]),
                                                    'seismic' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="J104" name="J104" value=""  /',])
                                                ],
                                                [
                                                    'name' => array(['text' => 'φM<sub>n</sub> (kNm/m)']),
                                                    'gravity' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="B105" name="B105" value=""  /',]),
                                                    'seismic' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="H105" name="H105" value=""  /',])
                                                ],
                                            )
                                        ],

                                    )
                                ],
                                [
                                    'subMenuTitle' => '6.2 Whalers #2',
                                    'input' => array(
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Number of whaler, #',
                                            'id' => 'J107',
                                            'name' => 'J107',
                                            'value' => '2',
                                            'type' => 'number',
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => '@H',
                                            'id' => 'B107',
                                            'name' => 'B107',
                                            'type' => 'number',
                                            'unit' => 'm',
                                        ],
                                        [
                                            'inputType' => 'dropdown',
                                            'label' => 'Whaler type',
                                            'id' => 'F107',
                                            'name' => 'F107',
                                            'selectOption' => 'Please Select',
                                            'option' => array(
                                                [
                                                    'optionName' => 'Plank',
                                                    'value' => 'plank'
                                                ],
                                                [
                                                    'optionName' => 'Round',
                                                    'value' => 'round'
                                                ]
                                            )
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Thickness',
                                            'id' => 'B108',
                                            'name' => 'B108',
                                            'type' => 'number',
                                            'unit' => 'mm',
                                        ],
                                        [
                                            'inputType' => 'dropdown',
                                            'label' => 'Density',
                                            'id' => 'F108',
                                            'name' => 'F108',
                                            'selectOption' => 'Please Select',
                                            'option' => array(
                                                [
                                                    'optionName' => 'Normal',
                                                    'value' => 'normal'
                                                ],
                                                [
                                                    'optionName' => 'High',
                                                    'value' => 'high'
                                                ]
                                            )
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'f<sub>b</sub>',
                                            'id' => 'J108',
                                            'name' => 'J108',
                                            'type' => 'number',
                                            'disabled' => true,
                                            'unit' => 'Mpa'
                                        ],
                                        [
                                            'inputType' => 'table',
                                            'slot' => 1,
                                            'column' => array(
                                                [
                                                    'id' => 'name',
                                                    'label' => '',
                                                ],
                                                [
                                                    'id' => 'gravity',
                                                    'label' => 'Gravity Case',
                                                ],
                                                [
                                                    'id' => 'seismic',
                                                    'label' => 'Seismic Case'
                                                ]
                                            ),
                                            'row' => array(
                                                [
                                                    'name' => array(['text' => 'w* (kN/m/m)']),
                                                    'gravity' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="D112" name="D112" value=""  /',]),
                                                    'seismic' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="J112" name="J112" value=""  /',])
                                                ],
                                                [
                                                    'name' => array(['text' => 'M* (kNm/m)']),
                                                    'gravity' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="D113" name="D113" value=""  /',]),
                                                    'seismic' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="J113" name="J113" value=""  /',])
                                                ],
                                                [
                                                    'name' => array(['text' => 'φM<sub>n</sub> (kNm/m)']),
                                                    'gravity' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="B114" name="B114" value=""  /',]),
                                                    'seismic' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="H114" name="H114" value=""  /',])
                                                ],
                                            )
                                        ],

                                    )
                                ],
                                [
                                    'subMenuTitle' => '6.3 Whalers #3',
                                    'input' => array(
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Number of whaler, #',
                                            'id' => 'J116',
                                            'name' => 'J116',
                                            'value' => '3',
                                            'type' => 'number',
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => '@H',
                                            'id' => 'B116',
                                            'name' => 'B116',
                                            'type' => 'number',
                                            'unit' => 'm',
                                        ],
                                        [
                                            'inputType' => 'dropdown',
                                            'label' => 'Whaler type',
                                            'id' => 'F116',
                                            'name' => 'F116',
                                            'selectOption' => 'Please Select',
                                            'option' => array(
                                                [
                                                    'optionName' => 'Plank',
                                                    'value' => 'plank'
                                                ],
                                                [
                                                    'optionName' => 'Round',
                                                    'value' => 'round'
                                                ]
                                            )
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Thickness',
                                            'id' => 'B117',
                                            'name' => 'B117',
                                            'type' => 'number',
                                            'unit' => 'mm',
                                        ],
                                        [
                                            'inputType' => 'dropdown',
                                            'label' => 'Density',
                                            'id' => 'F117',
                                            'name' => 'F117',
                                            'selectOption' => 'Please Select',
                                            'option' => array(
                                                [
                                                    'optionName' => 'Normal',
                                                    'value' => 'normal'
                                                ],
                                                [
                                                    'optionName' => 'High',
                                                    'value' => 'high'
                                                ]
                                            )
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'f<sub>b</sub>',
                                            'id' => 'J117',
                                            'name' => 'J117',
                                            'type' => 'number',
                                            'unit' => 'Mpa',
                                            'disabled' => true,
                                        ],
                                        [
                                            'inputType' => 'table',
                                            'slot' => 1,
                                            'column' => array(
                                                [
                                                    'id' => 'name',
                                                    'label' => '',
                                                ],
                                                [
                                                    'id' => 'gravity',
                                                    'label' => 'Gravity Case',
                                                ],
                                                [
                                                    'id' => 'seismic',
                                                    'label' => 'Seismic Case'
                                                ]
                                            ),
                                            'row' => array(
                                                [
                                                    'name' => array(['text' => 'w* (kN/m/m)']),
                                                    'gravity' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="D121" name="D121" value=""  /',]),
                                                    'seismic' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="J121" name="J121" value=""  /',])
                                                ],
                                                [
                                                    'name' => array(['text' => 'M* (kNm/m)']),
                                                    'gravity' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="D122" name="D122" value=""  /',]),
                                                    'seismic' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="J122" name="J122" value=""  /',])
                                                ],
                                                [
                                                    'name' => array(['text' => 'φM<sub>n</sub> (kNm/m)']),
                                                    'gravity' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="B123" name="B123" value=""  /',]),
                                                    'seismic' => array(['text' => '<input type="number" step="any" disabled class="form-control" id="H123" name="H123" value=""  /',])
                                                ],
                                            )
                                        ],

                                    )
                                ]
                            )
                        ],
                        // [
                        //     'menuTitle' => '7. Graphic',
                        //     'canvas' => '<canvas id="renderCanvas" touch-action="none"></canvas>',
                        // ]
                    )
                ]
            )
        ];

        $this->requiredFields = [
            'B10' => $this->inputPrefix . 'Wall height (Hw)',
            'B11' => $this->inputPrefix . 'Pole spacing (Ls)',
            'B12' => $this->inputPrefix . 'backslope degree',
            'B13' => $this->inputPrefix . 'toeslope degree',
            'B14' => $this->inputPrefix . 'Inactive zone (e0)',
            'B15' => $this->inputPrefix . 'Surcharge (ω)',
            'B16' => $this->inputPrefix . 'Distance to surcharge (Lw)',
            'B17' => $this->inputPrefix . 'Diameter of timber pole (d)',
            'B18' => $this->inputPrefix . 'Diameter of concrete (D)',
            'B19' => $this->inputPrefix . 'Depth of rotation (Z0)',
            'B20' => $this->inputPrefix . 'Soil unit weight (Ysoil)',
            'B24' => $this->inputPrefix . 'Soil friction angle for Gravity case',
            'B25' => $this->inputPrefix . 'Soil shear strength for Gravity case',
            'B26' => $this->inputPrefix . 'Load factor for surcharge for Gravity case',
            'B27' => $this->inputPrefix . 'Incorporate effect of backslope for Gravity case',
            'B28' => $this->inputPrefix . 'Passive resistance for Gravity case',
            'B29' => $this->inputPrefix . 'Factor of Safety for Gravity case',
            'B33' => $this->inputPrefix . 'Leveling distance in front of wall (Lrs)',
            'B39' => $this->inputPrefix . 'A (topo)',
            'B40' => $this->inputPrefix . 'W (d)',
            'B41' => $this->inputPrefix . 'a (max)',
            'B72' => $this->inputPrefix . 'Z(bmax) for Gravity case',
            'B84' => $this->inputPrefix . 'Reduction factor',
            'B85' => $this->inputPrefix . 'k8',
            'B98' => $this->inputPrefix . '@H for whalers 6.1',
            'B99' => $this->inputPrefix . 'Thickness for whalers 6.1',
            'B107' => $this->inputPrefix . '@H for whalers 6.2',
            'B108' => $this->inputPrefix . 'Thickness for whalers 6.2',
            'B116' => $this->inputPrefix . '@H for whalers 6.3',
            'B117' => $this->inputPrefix . 'Thickness for whalers 6.3',
            'C86' => $this->selectPrefix . 'Trimming method',
            'C87' => $this->selectPrefix . 'Pole density',
            'F84' => $this->inputPrefix . 'Steaming factor (k21)',
            'F98' => $this->selectPrefix . 'Whaler type for whalers 6.1',
            'F99' => $this->selectPrefix . 'Density for whalers 6.3',
            'F107' => $this->selectPrefix . 'Whaler type for whalers 6.2',
            'F108' => $this->selectPrefix . 'Density for whalers 6.3',
            'F116' => $this->selectPrefix . 'Whaler type for whalers 6.3',
            'F117' => $this->selectPrefix . 'Density for whalers 6.3',
            'G39' => $this->inputPrefix . 'Slope of the wall (β)',
            'G40' => $this->inputPrefix . 'Angle of interface friction (δa)',
            'H24' => $this->inputPrefix . 'Soil friction angle for Seismic case',
            'H25' => $this->inputPrefix . 'Soil shear strength for Seismic case',
            'H26' => $this->inputPrefix . 'Load factor for surcharge for Seismic case',
            'H28' => $this->inputPrefix . 'Passive resistance for Seismic case',
            'H29' => $this->inputPrefix . 'Seismic Safety Load factor for Seismic case',
            'H72' => $this->inputPrefix . 'Z(bmax) for Seismic case',
            'J84' => $this->inputPrefix . 'k1 for Gravity case',
            'J85' => $this->inputPrefix . 'k1 for Seicmic case',
            'J98' => $this->inputPrefix . 'Number of whalers at 6.1',
            'J107' => $this->inputPrefix . 'Number of whalers at 6.2',
            'J116' => $this->inputPrefix . 'Number of whalers at 6.3',
        ];
    }
}
