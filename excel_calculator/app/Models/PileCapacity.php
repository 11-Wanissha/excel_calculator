<?php

namespace app\Models;

class CapacityType
{
    public $vbmin;
    public $vbmax;
    public $N;
    public $ka;
    public $kn;
    public $acv;
    public $vb;
}

class PileCapacity
{
    private $fromProperties;

    public function __construct()
    {
        $this->fromProperties;
    }

    public function getFromProperties()
    {
        $this->fromProperties = [
            'title' => 'PileCapacity Calculator',
            'url' => '/pile-capacity',
            'importUrl' => '/pile-capacity-import',
            'exportUrl' => '/pile-capacity-export',
            'lastIndex' => 0,
            'secTion' => array(
                [
                    'menu' => array(
                        [
                            'menuTitle' => '1. Input',
                            'input' => array(
                                [
                                    'inputType' => 'file',
                                    'slot' => 1,
                                    'label' => 'Import File',
                                    'id' => 'file',
                                    'name' => 'file',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Diameter',
                                    'id' => 'G9',
                                    'name' => 'G9',
                                    'unit' => 'mm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Bell Diameter',
                                    'id' => 'G10',
                                    'name' => 'G10',
                                    'unit' => 'mm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Embedment to firm bearing',
                                    'id' => 'G11',
                                    'name' => 'G11',
                                    'unit' => 'm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Geotech Ultimate End Bearing',
                                    'id' => 'G12',
                                    'name' => 'G12',
                                    'unit' => 'MPa',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'End bearing reduction factor',
                                    'id' => 'G13',
                                    'name' => 'G13',
                                    'unit' => '-',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Geotech Ultimate Skin friction',
                                    'id' => 'G14',
                                    'name' => 'G14',
                                    'unit' => 'kPa',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Skin friction reduction factor',
                                    'id' => 'G15',
                                    'name' => 'G15',
                                    'unit' => '-',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Combination factor',
                                    'id' => 'G16',
                                    'name' => 'G16',
                                    'unit' => '-',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Main Bar yield stress',
                                    'id' => 'G18',
                                    'name' => 'G18',
                                    'unit' => 'MPa',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'spiral yield stress',
                                    'id' => 'G19',
                                    'name' => 'G19',
                                    'unit' => 'MPa',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Concrete strength',
                                    'id' => 'G20',
                                    'name' => 'G20',
                                    'unit' => 'MPa',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Aggregate size',
                                    'id' => 'G21',
                                    'name' => 'G21',
                                    'unit' => 'mm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Number of main bars',
                                    'id' => 'G23',
                                    'name' => 'G23',
                                    'unit' => 'bars',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Diameter of main bars',
                                    'id' => 'G24',
                                    'name' => 'G24',
                                    'unit' => 'mm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Area steel',
                                    'id' => 'G25',
                                    'name' => 'G25',
                                    'unit' => 'mm2',
                                    'type' => 'number',
                                    'disabled' => true
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Diameter of spiral',
                                    'id' => 'G27',
                                    'name' => 'G27',
                                    'unit' => 'mm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Cover',
                                    'id' => 'G28',
                                    'name' => 'G28',
                                    'unit' => 'mm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Spacing/pitch in PPHZ',
                                    'id' => 'G29',
                                    'name' => 'G29',
                                    'unit' => 'mm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Spacing/pitch outside PPHZ',
                                    'id' => 'G30',
                                    'name' => 'G30',
                                    'unit' => 'mm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Area spiral',
                                    'id' => 'G31',
                                    'name' => 'G31',
                                    'unit' => 'mm^2',
                                    'type' => 'number',
                                    'disabled' => true,
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Comp. strength reduction factor',
                                    'id' => 'G43',
                                    'name' => 'G43',
                                    'unit' => '-',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Tension strength reduction factor',
                                    'id' => 'G58',
                                    'name' => 'G58',
                                    'unit' => '-',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Shear strength reduction factor',
                                    'id' => 'G63',
                                    'name' => 'G63',
                                    'unit' => '-',
                                    'type' => 'number',
                                ],
                            )
                        ],
                        [
                            'menuTitle' => '2. Load',
                            'subMenu' => array(
                                [
                                    'subMenuTitle' => '2.1 Axial Load - Gravity Load Cases (1.2G+1.5Q, 1.35G)',
                                    'input' => array(
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Max Axial Load (N*)',
                                            'name' => 'N12',
                                            'unit' => 'kN',
                                            'id' => 'N12',
                                            'type' => 'number'
                                        ],
                                    ),
                                ],
                                [
                                    'subMenuTitle' => '2.2 Axial Load - Lateral Load Cases (G+Q+Eu)',
                                    'input' => array(
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Max Axial Load (N*)',
                                            'name' => 'N15',
                                            'unit' => 'kN',
                                            'id' => 'N15',
                                            'type' => 'number'
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Min Axial Load (N*)',
                                            'name' => 'N16',
                                            'unit' => 'kN',
                                            'id' => 'N16',
                                            'type' => 'number'
                                        ]
                                    ),
                                ],
                                [
                                    'subMenuTitle' => '2.3 Shear Force - All Load Cases',
                                    'input' => array(
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Max Shear Force (V*)',
                                            'name' => 'N20',
                                            'unit' => 'kN',
                                            'id' => 'N20',
                                            'type' => 'number'
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Corresponding min axial load (N*)',
                                            'name' => 'N23',
                                            'unit' => 'kN',
                                            'id' => 'N23',
                                            'type' => 'number'
                                        ],
                                    )
                                ],
                            )
                        ]
                    ),
                ],
                [
                    'menu' => array(
                        [
                            'menuTitle' => '3. Check Pile Geotechnical Capacity',
                            'subMenu' => array(
                                [
                                    'subMenuTitle' => '3.1 Pile Geotechnical Capacity',
                                    'input' => array(
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Pile end bearing capacity', // required
                                            'id' => 'G35', // required
                                            'name' => 'G35',
                                            'type' => 'number',
                                            'unit' => 'kN',
                                            'value' => 0,
                                            'disabled' => true,
                                            'slot' => 1,
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Pile skin friction capacity', // required
                                            'id' => 'G36', // required
                                            'name' => 'G36',
                                            'type' => 'number',
                                            'unit' => 'kN',
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
                                                    'label' => "OK/NOT OK",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mstatic' => array(
                                                        [
                                                            'text' => 'Total Pile Compression Capacity',
                                                        ]
                                                    ),
                                                    'Mn,static' => array(
                                                        [
                                                            'text' => '<p id="G38" name="G38">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p id="I38" name="I38">-</p>',
                                                        ]
                                                    ),
                                                ],
                                            )
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
                                                    'label' => "OK/NOT OK",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mstatic' => array(
                                                        [
                                                            'text' => 'Total Pile Tension Capacity',
                                                        ]
                                                    ),
                                                    'Mn,static' => array(
                                                        [
                                                            'text' => '<p id="G39" name="G39">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p id="I39" name="I39">-</p>',
                                                        ]
                                                    ),
                                                ],
                                            )
                                        ]
                                    ),
                                ],
                                [
                                    'subMenuTitle' => '3.2 Pile Axial Capacity',
                                    'input' => array(
                                        (
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
                                                        'label' => "OK/NOT OK",
                                                    ],
                                                ),
                                                'row' => array(
                                                    [
                                                        'mstatic' => array(
                                                            [
                                                                'text' => 'Compression Capacity',
                                                            ]
                                                        ),
                                                        'Mn,static' => array(
                                                            [
                                                                'text' => '<p id="G44" name="G44">0</p>',
                                                            ]
                                                        ),
                                                        'ok' => array(
                                                            [
                                                                'text' => '<p id="I44" name="I44">-</p>',
                                                            ]
                                                        ),
                                                    ],
                                                )
                                            ]
                                        ),
                                    )
                                ],
                                [
                                    'subMenuTitle' => '3.3 Compression Capacity within PPHZ',
                                    'input' => array(
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
                                                    'unit' => "-",
                                                ],
                                                [
                                                    'id' => "ok",
                                                    'label' => "OK/NOT OK",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mstatic' => array(
                                                        [
                                                            'text' => 'ps (provided)',
                                                        ]
                                                    ),
                                                    'Mn,static' => array(
                                                        [
                                                            'text' => '<p id="G47" name="G47">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p id="I47" name="I47">-</p>',
                                                        ]
                                                    ),
                                                ],
                                            )
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
                                                    'unit' => "-",
                                                ],
                                                [
                                                    'id' => "ok",
                                                    'label' => "OK/NOT OK",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mstatic' => array(
                                                        [
                                                            'text' => 'pT (provided)',
                                                        ]
                                                    ),
                                                    'Mn,static' => array(
                                                        [
                                                            'text' => '<p id="G48" name="G48">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p id="I48" name="I48">-</p>',
                                                        ]
                                                    ),
                                                ],
                                            )
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
                                                    'unit' => "-",
                                                ],
                                                [
                                                    'id' => "ok",
                                                    'label' => "OK/NOT OK",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mstatic' => array(
                                                        [
                                                            'text' => 'ps min',
                                                        ]
                                                    ),
                                                    'Mn,static' => array(
                                                        [
                                                            'text' => '<p id="G49" name="G49">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p>as per 10.3.10.5.1 (a)</p>',
                                                        ]
                                                    ),
                                                ],
                                            )
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
                                                    'unit' => "-",
                                                ],
                                                [
                                                    'id' => "ok",
                                                    'label' => "OK/NOT OK",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mstatic' => array(
                                                        [
                                                            'text' => 'ps min',
                                                        ]
                                                    ),
                                                    'Mn,static' => array(
                                                        [
                                                            'text' => '<p id="G50" name="G50">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p>as per 10.3.10.5.1 (b)</p>',
                                                        ]
                                                    ),
                                                ],
                                            )
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
                                                    'unit' => "-",
                                                ],
                                                [
                                                    'id' => "ok",
                                                    'label' => "OK/NOT OK",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mstatic' => array(
                                                        [
                                                            'text' => 'pt min',
                                                        ]
                                                    ),
                                                    'Mn,static' => array(
                                                        [
                                                            'text' => '<p id="G51" name="G51">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p>as per 10.3.8.1</p>',
                                                        ]
                                                    ),
                                                ],
                                            )
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
                                                    'unit' => "-",
                                                ],
                                                [
                                                    'id' => "ok",
                                                    'label' => "OK/NOT OK",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mstatic' => array(
                                                        [
                                                            'text' => 'pt max',
                                                        ]
                                                    ),
                                                    'Mn,static' => array(
                                                        [
                                                            'text' => '<p id="G52" name="G52">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p>as per 14.3.6.6</p>',
                                                        ]
                                                    ),
                                                ],
                                            )
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
                                                    'unit' => "-",
                                                ],
                                                [
                                                    'id' => "ok",
                                                    'label' => "OK/NOT OK",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mstatic' => array(
                                                        [
                                                            'text' => 'pt max',
                                                        ]
                                                    ),
                                                    'Mn,static' => array(
                                                        [
                                                            'text' => '<p id="G53" name="G53">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p>as per 10.4.6.2</p>',
                                                        ]
                                                    ),
                                                ],
                                            )
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
                                                    'unit' => "-",
                                                ],
                                                [
                                                    'id' => "ok",
                                                    'label' => "OK/NOT OK",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mstatic' => array(
                                                        [
                                                            'text' => 'pt max',
                                                        ]
                                                    ),
                                                    'Mn,static' => array(
                                                        [
                                                            'text' => '<p id="G54" name="G54">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p>as per 10.4.6.2</p>',
                                                        ]
                                                    ),
                                                ],
                                            )
                                        ],
                                    )
                                ],
                                [
                                    'subMenuTitle' => '3.4 Tension',
                                    'input' => array(
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
                                                    'label' => "OK/NOT OK",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mstatic' => array(
                                                        [
                                                            'text' => 'Tensile capacity',
                                                        ]
                                                    ),
                                                    'Mn,static' => array(
                                                        [
                                                            'text' => '<p id="G59" name="G59">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p id="I59" name="I59">-</p>',
                                                        ]
                                                    ),
                                                ],
                                            )
                                        ]
                                    )
                                ],
                                [
                                    'subMenuTitle' => '3.5 Pile shear capacity',
                                    'input' => array(
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Nominal shear stress', // required
                                            'id' => 'G64', // required
                                            'name' => 'G64',
                                            'type' => 'number',
                                            'unit' => 'MPa',
                                            'value' => 0,
                                            'disabled' => true,
                                            'slot' => 1,
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Max nominal shear stress', // required
                                            'id' => 'G65', // required
                                            'name' => 'G65',
                                            'type' => 'number',
                                            'unit' => 'MPa',
                                            'value' => 0,
                                            'disabled' => true,
                                            'slot' => 1,
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Shear resisted by concrete', // required
                                            'id' => 'G66', // required
                                            'name' => 'G66',
                                            'type' => 'number',
                                            'unit' => 'Kn',
                                            'value' => 0,
                                            'disabled' => true,
                                            'slot' => 1,
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Shear resisted by reinforcing', // required
                                            'id' => 'G67', // required
                                            'name' => 'G67',
                                            'type' => 'number',
                                            'unit' => 'Kn',
                                            'value' => 0,
                                            'disabled' => true,
                                            'slot' => 1,
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'Min shear reinforcement', // required
                                            'id' => 'G69', // required
                                            'name' => 'G69',
                                            'type' => 'number',
                                            'unit' => 'mm*2',
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
                                                    'label' => "OK/NOT OK",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mstatic' => array(
                                                        [
                                                            'text' => 'Shear reinforcement provided',
                                                        ]
                                                    ),
                                                    'Mn,static' => array(
                                                        [
                                                            'text' => '<p id="G70" name="G70">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p id="I70" name="I70">-</p>',
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
                                                    'label' => "OK/NOT OK",
                                                ],
                                            ),
                                            'row' => array(
                                                [
                                                    'mstatic' => array(
                                                        [
                                                            'text' => 'Section shear capacity',
                                                        ]
                                                    ),
                                                    'Mn,static' => array(
                                                        [
                                                            'text' => '<p id="G71" name="G71">0</p>',
                                                        ]
                                                    ),
                                                    'ok' => array(
                                                        [
                                                            'text' => '<p id="I71" name="I71">-</p>',
                                                        ]
                                                    ),
                                                ],
                                            ),
                                        ],
                                    )
                                ]
                            )
                        ],
                        [
                            'menuTitle' => '4. Result',
                            'input' => array(
                                [
                                    'inputType' => 'table',
                                    'slot' => 1,
                                    'column' => array(
                                        [
                                            'id' => "smin",
                                            'label' => "smin",
                                        ],
                                        [
                                            'id' => "s1",
                                            'label' => "s1"
                                        ],
                                        [
                                            'id' => "smax",
                                            'label' => "smax"
                                        ],
                                        [
                                            'id' => "ok",
                                            'label' => "OK/NOT OK",
                                        ],
                                    ),
                                    'row' => array(
                                        [
                                            'smin' => array(
                                                [
                                                    'text' => '<p id="O29" name="O29">0</p>',
                                                ]
                                            ),
                                            's1' => array(
                                                [
                                                    'text' => '<p id="O30" name="O30">0</p>',
                                                ]
                                            ),
                                            'smax' => array(
                                                [
                                                    'text' => '<p id="O31" name="O31">-</p>',
                                                ]
                                            ),
                                            'ok' => array(
                                                [
                                                    'text' => '<p id="Q30" name="Q30">-</p>',
                                                ]
                                            ),
                                        ],
                                    ),
                                ]
                            )
                        ]
                    ),
                ],
            ),
        ];
        return $this->fromProperties;
    }
}
