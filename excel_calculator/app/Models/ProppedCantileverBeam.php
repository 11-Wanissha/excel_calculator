<?php

namespace App\Models;


class ProppedCantileverBeam
{
    
    private $fromProperties;

    public function __construct()
    {
        $this->fromProperties = [
            'title' => 'Timber Beam Calculator',
            'url' => '/timber-beam',
            'importUrl' => '/timber-beam-import',
            'exportUrl' => '/timber-beam-export',
            'lastIndex' => 8,
            'secTion' => array(
                [
                    'menu' => array(
                          
                        [
                            'menuTitle' => '1. LOADS',
                            'subMenu' => array(
                                [
                                    'subMenuTitle' => '1.1 Point loads',
                                    'input' => array(
                                        [
                                            'inputType' => 'text',
                                            'label' => 'a', // required
                                            'name' => 'G27', // required
                                            'unit' => 'm',
                                            'id' => 'G27', // required
                                            'type' => 'number'
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'b', // required
                                            'name' => 'H27', // required
                                            'unit' => 'm',
                                            'id' => 'H27', // required
                                            'type' => 'number'
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'c', // required
                                            'name' => 'I27', // required
                                            'unit' => 'm',
                                            'id' => 'I27', // required
                                            'type' => 'number'
                                        ],
                                        [
                                            'inputType' => 'text',
                                            'label' => 'd', // required
                                            'name' => 'J27', // required
                                            'unit' => 'm',
                                            'id' => 'J27', // required
                                            'type' => 'number'
                                        ],
                                    ),
                                ],
                                [
                                    'subMenuTitle' => '1.2 Point loads: ULS',
                                    'input' => array([
                                        'inputType' => 'table',
                                        'column' => array(
                                            [
                                                'id' => "name",
                                                'label' => "loads",
                                                'width' => '100px',

                                            ],
                                            [
                                                'id' => "wTrib.Width(m)",
                                                'label' => "w Trib. Width(m)",
                                                'unit' => 'm',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P1Trib.Area(m^2)",
                                                'label' => "P1 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P2Trib.Area(m^2)",
                                                'label' => "P2 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P3Trib.Area(m^2)",
                                                'label' => "P3 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P4Trib.Area(m^2)",
                                                'label' => "P4 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                        ), // required
                                        'row' => array(
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'Roof',
                                                    ]
                                                ),
                                                'wTrib.Width(m)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F20" name="F20" value=""  /',
                                                    ]
                                                ),
                                                'P1Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="G20" name="G20" value=""  /',
                                                    ]
                                                ),
                                                'P2Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="H20" name="H20" value=""  /',
                                                    ]
                                                ),
                                                'P3Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="I20" name="I20" value=""  /',
                                                    ]
                                                ),
                                                'P4Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="J20" name="J20" value=""  /',
                                                    ]
                                                ),
                                            ],
                                            
                                        ), // required
                                        'slot' => 1, // ถ้าใส่ มันจะเต็มทั้งแถว
                                    ]
                                        
                                    ),
                                    
                                ],
                                [
                                    'subMenuTitle' => '1.3 Point loads: SLS',
                                    'input' => array([
                                        'inputType' => 'table',
                                        'column' => array(
                                            [
                                                'id' => "name",
                                                'label' => "loads",
                                                'width' => '100px',

                                            ],
                                            [
                                                'id' => "wTrib.Width(m)",
                                                'label' => "w Trib. Width(m)",
                                                'unit' => 'm',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P1Trib.Area(m^2)",
                                                'label' => "P1 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P2Trib.Area(m^2)",
                                                'label' => "P2 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P3Trib.Area(m^2)",
                                                'label' => "P3 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P4Trib.Area(m^2)",
                                                'label' => "P4 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                        ), // required
                                        'row' => array(
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'Roof',
                                                    ]
                                                ),
                                                'wTrib.Width(m)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F20" name="F20" value=""  /',
                                                    ]
                                                ),
                                                'P1Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="G20" name="G20" value=""  /',
                                                    ]
                                                ),
                                                'P2Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="H20" name="H20" value=""  /',
                                                    ]
                                                ),
                                                'P3Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="I20" name="I20" value=""  /',
                                                    ]
                                                ),
                                                'P4Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="J20" name="J20" value=""  /',
                                                    ]
                                                ),
                                            ],
                                            
                                        ), // required
                                        'slot' => 1, // ถ้าใส่ มันจะเต็มทั้งแถว
                                    ]
                                        
                                    ),
                                    
                                ],
                                [
                                    'subMenuTitle' => '1.4 Distributed loads',
                                    'input' => array([
                                        'inputType' => 'table',
                                        'column' => array(
                                            [
                                                'id' => "name",
                                                'label' => "loads",
                                                'width' => '100px',

                                            ],
                                            [
                                                'id' => "wTrib.Width(m)",
                                                'label' => "w Trib. Width(m)",
                                                'unit' => 'm',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P1Trib.Area(m^2)",
                                                'label' => "P1 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P2Trib.Area(m^2)",
                                                'label' => "P2 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P3Trib.Area(m^2)",
                                                'label' => "P3 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P4Trib.Area(m^2)",
                                                'label' => "P4 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                        ), // required
                                        'row' => array(
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'Roof',
                                                    ]
                                                ),
                                                'wTrib.Width(m)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F20" name="F20" value=""  /',
                                                    ]
                                                ),
                                                'P1Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="G20" name="G20" value=""  /',
                                                    ]
                                                ),
                                                'P2Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="H20" name="H20" value=""  /',
                                                    ]
                                                ),
                                                'P3Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="I20" name="I20" value=""  /',
                                                    ]
                                                ),
                                                'P4Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="J20" name="J20" value=""  /',
                                                    ]
                                                ),
                                            ],
                                            
                                        ), // required
                                        'slot' => 1, // ถ้าใส่ มันจะเต็มทั้งแถว
                                    ]
                                        
                                    ),
                                    
                                ],
                                [
                                    'subMenuTitle' => '1.5 Distributed loads: ',
                                    'input' => array([
                                        'inputType' => 'table',
                                        'column' => array(
                                            [
                                                'id' => "name",
                                                'label' => "loads",
                                                'width' => '100px',

                                            ],
                                            [
                                                'id' => "wTrib.Width(m)",
                                                'label' => "w Trib. Width(m)",
                                                'unit' => 'm',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P1Trib.Area(m^2)",
                                                'label' => "P1 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P2Trib.Area(m^2)",
                                                'label' => "P2 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P3Trib.Area(m^2)",
                                                'label' => "P3 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P4Trib.Area(m^2)",
                                                'label' => "P4 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                        ), // required
                                        'row' => array(
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'Roof',
                                                    ]
                                                ),
                                                'wTrib.Width(m)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F20" name="F20" value=""  /',
                                                    ]
                                                ),
                                                'P1Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="G20" name="G20" value=""  /',
                                                    ]
                                                ),
                                                'P2Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="H20" name="H20" value=""  /',
                                                    ]
                                                ),
                                                'P3Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="I20" name="I20" value=""  /',
                                                    ]
                                                ),
                                                'P4Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="J20" name="J20" value=""  /',
                                                    ]
                                                ),
                                            ],
                                            
                                        ), // required
                                        'slot' => 1, // ถ้าใส่ มันจะเต็มทั้งแถว
                                    ]
                                        
                                    ),
                                    
                                ],
                                [
                                    'subMenuTitle' => '1.6 Distributed loads: SLS',
                                    'input' => array([
                                        'inputType' => 'table',
                                        'column' => array(
                                            [
                                                'id' => "name",
                                                'label' => "loads",
                                                'width' => '100px',

                                            ],
                                            [
                                                'id' => "wTrib.Width(m)",
                                                'label' => "w Trib. Width(m)",
                                                'unit' => 'm',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P1Trib.Area(m^2)",
                                                'label' => "P1 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P2Trib.Area(m^2)",
                                                'label' => "P2 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P3Trib.Area(m^2)",
                                                'label' => "P3 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "P4Trib.Area(m^2)",
                                                'label' => "P4 Trib. Area (m^2)",
                                                'unit' => 'm^2',
                                                'width' => '100px',
                                            ],
                                        ), // required
                                        'row' => array(
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'Roof',
                                                    ]
                                                ),
                                                'wTrib.Width(m)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F20" name="F20" value=""  /',
                                                    ]
                                                ),
                                                'P1Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="G20" name="G20" value=""  /',
                                                    ]
                                                ),
                                                'P2Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="H20" name="H20" value=""  /',
                                                    ]
                                                ),
                                                'P3Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="I20" name="I20" value=""  /',
                                                    ]
                                                ),
                                                'P4Trib.Area(m^2)' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="J20" name="J20" value=""  /',
                                                    ]
                                                ),
                                            ],
                                            
                                        ), // required
                                        'slot' => 1, // ถ้าใส่ มันจะเต็มทั้งแถว
                                    ]
                                        
                                    ),
                                    
                                ],
                            ),
                            'input' => array(
                                [
                                    'inputType' => 'table',
                                    'column' => array(
                                        
                                        [
                                            'id' => "C10",
                                            'label' => "Ψs Short term factor",
                                            'width' => '100px',

                                        ],
                                        [
                                            'id' => "C11",
                                            'label' => "Ψl Long term factor",
                                            'width' => '100px',

                                        ],
                                        [
                                            'id' => "C12",
                                            'label' => "Ψc Combination factor",
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => "C13",
                                            'label' => "Ψe Earthquake combination factor",
                                            'width' => '100px',

                                        ],
                                    ), // required
                                    'row' => array(
                                        [
                                        
                                            'C10' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="B20" name="B20" value="0.4"  /',
                                                ]
                                            ),
                                            'C11' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="C20" name="C20" value="0.25"  /',
                                                ]
                                            ),
                                            'C12' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="D20" name="D20" value="0.7"  /',
                                                ]
                                            ),
                                            'C13' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="E20" name="E20" value="0"  /',
                                                ]
                                            ),
                                        ],
                                        
                                    ), // required
                                    'slot' => 1, // ถ้าใส่ มันจะเต็มทั้งแถว
                                ],
                                [
                                    'inputType' => 'table',
                                    'column' => array(
                                        [
                                            'id' => "name",
                                            'label' => "loads",
                                            'width' => '100px',

                                        ],
                                        [
                                            'id' => "wTrib.Width(m)",
                                            'label' => "w Trib. Width(m)",
                                            'unit' => 'm',
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => "P1Trib.Area(m^2)",
                                            'label' => "P1 Trib. Area (m^2)",
                                            'unit' => 'm^2',
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => "P2Trib.Area(m^2)",
                                            'label' => "P2 Trib. Area (m^2)",
                                            'unit' => 'm^2',
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => "P3Trib.Area(m^2)",
                                            'label' => "P3 Trib. Area (m^2)",
                                            'unit' => 'm^2',
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => "P4Trib.Area(m^2)",
                                            'label' => "P4 Trib. Area (m^2)",
                                            'unit' => 'm^2',
                                            'width' => '100px',
                                        ],
                                    ), // required
                                    'row' => array(
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Roof',
                                                ]
                                            ),
                                            'wTrib.Width(m)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="F20" name="F20" value=""  /',
                                                ]
                                            ),
                                            'P1Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="G20" name="G20" value=""  /',
                                                ]
                                            ),
                                            'P2Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="H20" name="H20" value=""  /',
                                                ]
                                            ),
                                            'P3Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="I20" name="I20" value=""  /',
                                                ]
                                            ),
                                            'P4Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="J20" name="J20" value=""  /',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Floor',
                                                ]
                                            ),
                                            'wTrib.Width(m)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="F21" name="F21" value=""  /',
                                                ]
                                            ),
                                            'P1Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="G21" name="G21" value=""  /',
                                                ]
                                            ),
                                            'P2Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="H21" name="H21" value=""  /',
                                                ]
                                            ),
                                            'P3Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="I21" name="I21" value=""  /',
                                                ]
                                            ),
                                            'P4Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="J21" name="J21" value=""  /',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Deck',
                                                ]
                                            ),
                                            'wTrib.Width(m)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="F22" name="F22" value=""  /',
                                                ]
                                            ),
                                            'P1Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="G22" name="G22" value=""  /',
                                                ]
                                            ),
                                            'P2Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="H22" name="H22" value=""  /',
                                                ]
                                            ),
                                            'P3Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="I22" name="I22" value=""  /',
                                                ]
                                            ),
                                            'P4Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="J22" name="J22" value=""  /',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Int Wall',
                                                ]
                                            ),
                                            'wTrib.Width(m)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="F23" name="F23" value=""  /',
                                                ]
                                            ),
                                            'P1Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="G23" name="G23" value=""  /',
                                                ]
                                            ),
                                            'P2Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="H23" name="H23" value=""  /',
                                                ]
                                            ),
                                            'P3Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="I23" name="I23" value=""  /',
                                                ]
                                            ),
                                            'P4Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="J23" name="J23" value=""  /',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Ex Wall',
                                                ]
                                            ),
                                            'wTrib.Width(m)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="F24" name="F24" value=""  /',
                                                ]
                                            ),
                                            'P1Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="G24" name="G24" value=""  /',
                                                ]
                                            ),
                                            'P2Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="H24" name="H24" value=""  /',
                                                ]
                                            ),
                                            'P3Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="I24" name="I24" value=""  /',
                                                ]
                                            ),
                                            'P4Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="J24" name="J24" value=""  /',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Other',
                                                ]
                                            ),
                                            'wTrib.Width(m)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="F25" name="F25" value=""  /',
                                                ]
                                            ),
                                            'P1Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="G25" name="G25" value=""  /',
                                                ]
                                            ),
                                            'P2Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="H25" name="H25" value=""  /',
                                                ]
                                            ),
                                            'P3Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="I25" name="I25" value=""  /',
                                                ]
                                            ),
                                            'P4Trib.Area(m^2)' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="J25" name="J25" value=""  /',
                                                ]
                                            ),
                                        ],
                                    ), // required
                                    'slot' => 1, // ถ้าใส่ มันจะเต็มทั้งแถว
                                ],
                            ),
                        ],
                        [
                            'menuTitle' => '3. ADDITIONAL UNFACTORED LOADS (kN)',
                            'input' => array(
                                [
                                    'inputType' => 'text',
                                    'label' => 'Maximum segment length between Full lateral restraints', // required
                                    'name' => 'I31', // required
                                    'unit' => 'm',
                                    'id' => 'I31', // required
                                    'type' => 'number',
                                    'value' => '1',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k1', // required
                                    'name' => 'I33', // required
                                    'value' => '0.8',
                                    'id' => 'I33', // required
                                    'type' => 'number'
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'is timber wet ?', // required
                                    'id' => 'I34', // required
                                    'name' => 'I34', // required
                                    'type' => 'checkbox',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k2', // required
                                    'name' => 'I35', // required
                                    'id' => 'I35', // required
                                    'disabled' => true,
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'table',
                                    'column' => array(
                                        [
                                            'id' => "name",
                                            'label' => "",
                                        ],
                                        [
                                            'id' => "P1",
                                            'label' => "P1",
                                            'unit' => 'p1'
                                        ],
                                        [
                                            'id' => "P2",
                                            'label' => "P2",
                                            'unit' => 'p2'
                                        ],
                                        [
                                            'id' => "P3",
                                            'label' => "P3",
                                            'unit' => 'p3'
                                        ],
                                        [
                                            'id' => "P4",
                                            'label' => "P4",
                                            'unit' => 'p4'
                                        ],
                                    ), // required
                                    'row' => array(
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'G',
                                                ]
                                            ),
                                            'P1' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="B31" name="B31" value=""  /',
                                                ]
                                            ),
                                            'P2' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="C31" name="C31" value=""  /',
                                                ]
                                            ),
                                            'P3' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="D31" name="D31" value=""  /',
                                                ]
                                            ),
                                            'P4' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="E31" name="E31" value=""  /',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Q (Roof)',
                                                ]
                                            ),
                                            'P1' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="B32" name="B32" value=""  /',
                                                ]
                                            ),
                                            'P2' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="C32" name="C32" value=""  /',
                                                ]
                                            ),
                                            'P3' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="D32" name="D32" value=""  /',
                                                ]
                                            ),
                                            'P4' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="E32" name="E32" value=""  /',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Q (Floor)',
                                                ]
                                            ),
                                            'P1' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="B33" name="B33" value=""  /',
                                                ]
                                            ),
                                            'P2' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="C33" name="C33" value=""  /',
                                                ]
                                            ),
                                            'P3' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="D33" name="D33" value=""  /',
                                                ]
                                            ),
                                            'P4' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="E33" name="E33" value=""  /',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Q (Deck)',
                                                ]
                                            ),
                                            'P1' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="B34" name="B34" value=""  /',
                                                ]
                                            ),
                                            'P2' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="C34" name="C34" value=""  /',
                                                ]
                                            ),
                                            'P3' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="D34" name="D34" value=""  /',
                                                ]
                                            ),
                                            'P4' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="E34" name="E34" value=""  /',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Q (Other)',
                                                ]
                                            ),
                                            'P1' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="B35" name="B35" value=""  /',
                                                ]
                                            ),
                                            'P2' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="C35" name="C35" value=""  /',
                                                ]
                                            ),
                                            'P3' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="D35" name="D35" value=""  /',
                                                ]
                                            ),
                                            'P4' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="E35" name="E35" value=""  /',
                                                ]
                                            ),
                                        ],
                                    ), // required
                                    'slot' => 1, // ถ้าใส่ มันจะเต็มทั้งแถว
                                ],
                            ),
                        ],

                    ),
                ],
                [
                    'menu' => array(
                        [
                            'menuTitle' => '4. RESULTS (kN)',
                            'input' => array(
                                [
                                    'inputType' => 'text',
                                    'label' => 'M*', // required
                                    'name' => 'I38', // required
                                    'id' => 'I38', // required
                                    'disabled' => true,
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => '', // required
                                    'name' => 'I39', // required
                                    'id' => 'I39', // required
                                    'disabled' => true,
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'V*', // required
                                    'name' => 'I40', // required
                                    'id' => 'I40', // required
                                    'disabled' => true,
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => '', // required
                                    'name' => 'I41', // required
                                    'id' => 'I41', // required
                                    'disabled' => true,
                                ],
                                [
                                    'inputType' => 'table',
                                    'column' => array(
                                        [
                                            'id' => "name",
                                            'label' => "",
                                        ],
                                        [
                                            'id' => "G",
                                            'label' => "G",
                                        ],
                                        [
                                            'id' => "Q1",
                                            'label' => "Q1",
                                        ],
                                        [
                                            'id' => "Q2",
                                            'label' => "Q2",
                                        ],
                                        [
                                            'id' => "Q3",
                                            'label' => "Q3",
                                        ],
                                        [
                                            'id' => "Q4",
                                            'label' => "Q4",
                                        ],
                                        [
                                            'id' => "1.2G",
                                            'label' => "1.2G+1.5Q",
                                        ],
                                    ), // required
                                    'row' => array(
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'R1',
                                                ]
                                            ),
                                            'G' => array(
                                                [
                                                    'text' => '<p id="B39" name="B39">0</p>',
                                                ]
                                            ),
                                            'Q1' => array(
                                                [
                                                    'text' => '<p id="C39" name="C39">0</p>',
                                                ]
                                            ),
                                            'Q2' => array(
                                                [
                                                    'text' => '<p id="D39" name="D39">0</p>',
                                                ]
                                            ),
                                            'Q3' => array(
                                                [
                                                    'text' => '<p id="E39" name="E39">0</p>',
                                                ]
                                            ),
                                            'Q4' => array(
                                                [
                                                    'text' => '<p id="F39" name="F39">0</p>',
                                                ]
                                            ),
                                            '1.2G' => array(
                                                [
                                                    'text' => '<p id="G39" name="G39">0</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'R2',
                                                ]
                                            ),
                                            'G' => array(
                                                [
                                                    'text' => '<p id="B40" name="B40">0</p>',
                                                ]
                                            ),
                                            'Q1' => array(
                                                [
                                                    'text' => '<p id="C40" name="C40">0</p>',
                                                ]
                                            ),
                                            'Q2' => array(
                                                [
                                                    'text' => '<p id="D40" name="D40">0</p>',
                                                ]
                                            ),
                                            'Q3' => array(
                                                [
                                                    'text' => '<p id="E40" name="E40">0</p>',
                                                ]
                                            ),
                                            'Q4' => array(
                                                [
                                                    'text' => '<p id="F40" name="F40">0</p>',
                                                ]
                                            ),
                                            '1.2G' => array(
                                                [
                                                    'text' => '<p id="G40" name="G40">0</p>',
                                                ]
                                            ),
                                        ],
                                    ), // required
                                    'slot' => 1, // ถ้าใส่ มันจะเต็มทั้งแถว
                                ],
                            ),
                        ],
                        [
                            'menuTitle' => '5. BEAM ANALYSIS',
                            'input' => array(
                                [
                                    'inputType' => 'text',
                                    'label' => 'φ', // required
                                    'name' => 'B44', // required
                                    'id' => 'B44', // required
                                    'disabled' => true,
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k1', // required
                                    'name' => 'E44', // required
                                    'id' => 'E44', // required
                                    'disabled' => true,
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k8', // required
                                    'name' => 'H44', // required
                                    'id' => 'H44', // required
                                    'disabled' => true,
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k4', // required
                                    'name' => 'B45', // required
                                    'id' => 'B45', // required
                                    'value' => '1',
                                    'type' => 'number'
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k5', // required
                                    'name' => 'E45', // required
                                    'id' => 'E45', // required
                                    'value' => '1',
                                    'type' => 'number'
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'f(b)', // required
                                    'name' => 'B46', // required
                                    'id' => 'B46', // required
                                    'disabled' => true,
                                    'unit' => 'MPa',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'f(s)', // required
                                    'name' => 'E46', // required
                                    'id' => 'E46', // required
                                    'disabled' => true,
                                    'unit' => 'MPa',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'E', // required
                                    'name' => 'H46', // required
                                    'id' => 'H46', // required
                                    'disabled' => true,
                                    'unit' => 'GPa',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'A', // required
                                    'name' => 'B47', // required
                                    'id' => 'B47', // required
                                    'disabled' => true,
                                    'unit' => 'mm^2',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Z', // required
                                    'name' => 'E47', // required
                                    'id' => 'E47', // required
                                    'disabled' => true,
                                    'unit' => 'mm^3',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'I', // required
                                    'name' => 'H47', // required
                                    'id' => 'H47', // required
                                    'disabled' => true,
                                    'type' => 'number',
                                    'slot' => 1,
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'φM(x)', // required
                                    'name' => 'C50', // required
                                    'id' => 'C50', // required
                                    'disabled' => true,
                                    'unit' => 'kNm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => '', // required
                                    'name' => 'E50', // required
                                    'id' => 'E50', // required
                                    'disabled' => true,
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'φV', // required
                                    'name' => 'H50', // required
                                    'id' => 'H50', // required
                                    'disabled' => true,
                                    'unit' => 'kN',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => '', // required
                                    'name' => 'J50', // required
                                    'id' => 'J50', // required
                                    'disabled' => true,
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'SLS δ', // required
                                    'name' => 'C52', // required
                                    'id' => 'C52', // required
                                    'disabled' => true,
                                    'unit' => 'mm^4',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => '', // required
                                    'name' => 'E52', // required
                                    'id' => 'E52', // required
                                    'disabled' => true,
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'Vibration δ', // required
                                    'name' => 'H52', // required
                                    'id' => 'H52', // required
                                    'disabled' => true,
                                    'unit' => 'mm',
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => '', // required
                                    'name' => 'J52', // required
                                    'id' => 'J52', // required
                                    'disabled' => true,
                                ],
                            ),
                        ],
                        [
                            'menuTitle' => '6. TOTAL LOADS',
                            'input' => array(
                                [
                                    'slot' => 1,
                                    'inputType' => 'table',
                                    'row' => array(
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'w',
                                                ],
                                            ),
                                            'Gcol1' => array(
                                                [
                                                    'text' => '<p id="O14" name="O14">0</p>',
                                                ],
                                            ),
                                            'Qroof' => array(
                                                [
                                                    'text' => '<p id="P14" name="P14">0</p>',
                                                ]
                                            ),
                                            'Qfloor' => array(
                                                [
                                                    'text' => '<p id="Q14" name="Q14">0</p>',
                                                ]
                                            ),
                                            'Qdeck' => array(
                                                [
                                                    'text' => '<p id="R14" name="R14">0</p>',
                                                ]
                                            ),
                                            'Qwall' => array(
                                                [
                                                    'text' => '<p id="S14" name="S14">0</p>',
                                                ]
                                            ),
                                            '1.2G' => array(
                                                [
                                                    'text' => '<p id="T14" name="T14">0</p>',
                                                ]
                                            ),
                                            'Mstar-mid' => array(
                                                [
                                                    'text' => '<p id="U14" name="U14">0</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'P1',
                                                ],
                                            ),
                                            'Gcol1' => array(
                                                [
                                                    'text' => '<p id="O15" name="O15">0</p>',
                                                ],
                                            ),
                                            'Qroof' => array(
                                                [
                                                    'text' => '<p id="P15" name="P15">0</p>',
                                                ]
                                            ),
                                            'Qfloor' => array(
                                                [
                                                    'text' => '<p id="Q15" name="Q15">0</p>',
                                                ]
                                            ),
                                            'Qdeck' => array(
                                                [
                                                    'text' => '<p id="R15" name="R15">0</p>',
                                                ]
                                            ),
                                            'Qwall' => array(
                                                [
                                                    'text' => '<p id="S15" name="S15">0</p>',
                                                ]
                                            ),
                                            '1.2G' => array(
                                                [
                                                    'text' => '<p id="T15" name="T15">0</p>',
                                                ]
                                            ),
                                            'Mstar-mid' => array(
                                                [
                                                    'text' => '<p id="U15" name="U15">0</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'P2',
                                                ],
                                            ),
                                            'Gcol1' => array(
                                                [
                                                    'text' => '<p id="O16" name="O16">0</p>',
                                                ],
                                            ),
                                            'Qroof' => array(
                                                [
                                                    'text' => '<p id="P16" name="P16">0</p>',
                                                ]
                                            ),
                                            'Qfloor' => array(
                                                [
                                                    'text' => '<p id="Q16" name="Q16">0</p>',
                                                ]
                                            ),
                                            'Qdeck' => array(
                                                [
                                                    'text' => '<p id="R16" name="R16">0</p>',
                                                ]
                                            ),
                                            'Qwall' => array(
                                                [
                                                    'text' => '<p id="S16" name="S16">0</p>',
                                                ]
                                            ),
                                            '1.2G' => array(
                                                [
                                                    'text' => '<p id="T16" name="T16">0</p>',
                                                ]
                                            ),
                                            'Mstar-mid' => array(
                                                [
                                                    'text' => '<p id="U16" name="U16">0</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'P3',
                                                ],
                                            ),
                                            'Gcol1' => array(
                                                [
                                                    'text' => '<p id="O17" name="O17">0</p>',
                                                ],
                                            ),
                                            'Qroof' => array(
                                                [
                                                    'text' => '<p id="P17" name="P17">0</p>',
                                                    'id' => 'P15',
                                                ]
                                            ),
                                            'Qfloor' => array(
                                                [
                                                    'text' => '<p id="Q17" name="Q17">0</p>',
                                                ]
                                            ),
                                            'Qdeck' => array(
                                                [
                                                    'text' => '<p id="R17" name="R17">0</p>',
                                                ]
                                            ),
                                            'Qwall' => array(
                                                [
                                                    'text' => '<p id="S17" name="S17">0</p>',
                                                ]
                                            ),
                                            '1.2G' => array(
                                                [
                                                    'text' => '<p id="T17" name="T17">0</p>',
                                                ]
                                            ),
                                            'Mstar-mid' => array(
                                                [
                                                    'text' => '<p id="U17" name="U17">0</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'P4',
                                                ],
                                            ),
                                            'Gcol1' => array(
                                                [
                                                    'text' => '<p id="O18" name="O18">0</p>',
                                                ],
                                            ),
                                            'Qroof' => array(
                                                [
                                                    'text' => '<p id="P18" name="P18">0</p>',
                                                ]
                                            ),
                                            'Qfloor' => array(
                                                [
                                                    'text' => '<p id="Q18" name="Q18">0</p>',
                                                ]
                                            ),
                                            'Qdeck' => array(
                                                [
                                                    'text' => '<p id="R18" name="R18">0</p>',
                                                ]
                                            ),
                                            'Qwall' => array(
                                                [
                                                    'text' => '<p id="S18" name="S18">0</p>',
                                                ]
                                            ),
                                            '1.2G' => array(
                                                [
                                                    'text' => '<p id="T18" name="T18">0</p>',
                                                ]
                                            ),
                                            'Mstar-mid' => array(
                                                [
                                                    'text' => '<p id="U18" name="U18">0</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Sum',
                                                ],
                                            ),
                                            'Gcol1' => array(
                                                [
                                                    'text' => '<p id="O19" name="O19">0</p>',
                                                ],
                                            ),
                                            'Qroof' => array(
                                                [
                                                    'text' => '<p id="P19" name="P19">0</p>',
                                                ]
                                            ),
                                            'Qfloor' => array(
                                                [
                                                    'text' => '<p id="Q19" name="Q19">0</p>',
                                                ]
                                            ),
                                            'Qdeck' => array(
                                                [
                                                    'text' => '<p id="R19" name="R19">0</p>',
                                                ]
                                            ),
                                            'Qwall' => array(
                                                [
                                                    'text' => '<p id="S19" name="S19">0</p>',
                                                ]
                                            ),
                                            '1.2G' => array(
                                                [
                                                    'text' => '<p id="T19" name="T19">0</p>',
                                                ]
                                            ),
                                            'Mstar-mid' => array(
                                                [
                                                    'text' => '<p id="U19" name="U19">0</p>',
                                                    'id' => 'U15',
                                                ]
                                            ),
                                        ],
                                    ),
                                    'column' => array(
                                        [
                                            'id' => 'name',
                                            'label' => '',
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => 'Gcol1',
                                            'label' => 'G',
                                            'width' => '100px',

                                        ],
                                        [
                                            'id' => 'Qroof',
                                            'label' => 'QRoof',
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => 'Qfloor',
                                            'label' => 'Qfloor',
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => 'Qdeck',
                                            'label' => 'Qdeck',
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => 'Qwall',
                                            'label' => 'Qwall',
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => '1.2G',
                                            'label' => '1.2G+1.5Q',
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => 'Mstar-mid',
                                            'label' => 'M* (midspan)',
                                            'width' => '100px',
                                        ],
                                    )
                                ],
                                [
                                    'slot' => 1,
                                    'inputType' => 'table',
                                    'row' => array(
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'w',
                                                ],
                                            ),
                                            'Mstar-p1' => array(
                                                [
                                                    'text' => '<p id="V14" name="V14">0</p>',
                                                ]
                                            ),
                                            'Mstar-p2' => array(
                                                [
                                                    'text' => '<p id="W14" name="W14">0</p>',
                                                ]
                                            ),
                                            'Mstar-p3' => array(
                                                [
                                                    'text' => '<p id="X14" name="X14">0</p>',
                                                ]
                                            ),
                                            'Mstar-p4' => array(
                                                [
                                                    'text' => '<p id="Y14" name="Y14">0</p>',
                                                ]
                                            ),
                                            'k2G' => array(
                                                [
                                                    'text' => '<p id="Z14" name="Z14">0</p>',
                                                ]
                                            ),
                                            'defl' => array(
                                                [
                                                    'text' => '<p id="AA14" name="AA14">0</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'P1',
                                                ],
                                            ),
                                            'Mstar-p1' => array(
                                                [
                                                    'text' => '<p id="V15" name="V15">0</p>',
                                                ]
                                            ),
                                            'Mstar-p2' => array(
                                                [
                                                    'text' => '<p id="W15" name="W15">0</p>',
                                                ]
                                            ),
                                            'Mstar-p3' => array(
                                                [
                                                    'text' => '<p id="X15" name="X15">0</p>',
                                                ]
                                            ),
                                            'Mstar-p4' => array(
                                                [
                                                    'text' => '<p id="Y15" name="Y15">0</p>',
                                                ]
                                            ),
                                            'k2G' => array(
                                                [
                                                    'text' => '<p id="Z15" name="Z15">0</p>',
                                                ]
                                            ),
                                            'defl' => array(
                                                [
                                                    'text' => '<p id="AA15" name="AA15">0</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'P2',
                                                ],
                                            ),
                                            'Mstar-p1' => array(
                                                [
                                                    'text' => '<p id="V16" name="V16">0</p>',
                                                ]
                                            ),
                                            'Mstar-p2' => array(
                                                [
                                                    'text' => '<p id="W16" name="W16">0</p>',
                                                ]
                                            ),
                                            'Mstar-p3' => array(
                                                [
                                                    'text' => '<p id="X16" name="X16">0</p>',
                                                ]
                                            ),
                                            'Mstar-p4' => array(
                                                [
                                                    'text' => '<p id="Y16" name="Y16">0</p>',
                                                ]
                                            ),
                                            'k2G' => array(
                                                [
                                                    'text' => '<p id="Z16" name="Z16">0</p>',
                                                ]
                                            ),
                                            'defl' => array(
                                                [
                                                    'text' => '<p id="AA16" name="AA16">0</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'P3',
                                                ],
                                            ),
                                            'Mstar-p1' => array(
                                                [
                                                    'text' => '<p id="V17" name="V17">0</p>',
                                                ]
                                            ),
                                            'Mstar-p2' => array(
                                                [
                                                    'text' => '<p id="W17" name="W17">0</p>',
                                                ]
                                            ),
                                            'Mstar-p3' => array(
                                                [
                                                    'text' => '<p id="X17" name="X17">0</p>',
                                                ]
                                            ),
                                            'Mstar-p4' => array(
                                                [
                                                    'text' => '<p id="Y17" name="Y17">0</p>',
                                                ]
                                            ),
                                            'k2G' => array(
                                                [
                                                    'text' => '<p id="Z17" name="Z15">0</p>',
                                                ]
                                            ),
                                            'defl' => array(
                                                [
                                                    'text' => '<p id="AA17" name="AA17">0</p',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'P4',
                                                ],
                                            ),
                                            'Mstar-p1' => array(
                                                [
                                                    'text' => '<p id="V18" name="V18">0</p>',
                                                ]
                                            ),
                                            'Mstar-p2' => array(
                                                [
                                                    'text' => '<p id="W18" name="W18">0</p>',
                                                ]
                                            ),
                                            'Mstar-p3' => array(
                                                [
                                                    'text' => '<p id="X18" name="X18">0</p>',
                                                ]
                                            ),
                                            'Mstar-p4' => array(
                                                [
                                                    'text' => '<p id="Y18" name="Y18">0</p>',
                                                ]
                                            ),
                                            'k2G' => array(
                                                [
                                                    'text' => '<p id="Z18" name="Z18">0</p>',
                                                ]
                                            ),
                                            'defl' => array(
                                                [
                                                    'text' => '<p id="AA18" name="AA18">0</p>',
                                                ]
                                            ),
                                        ],
                                        [
                                            'name' => array(
                                                [
                                                    'text' => 'Sum',
                                                ],
                                            ),
                                            'Mstar-p1' => array(
                                                [
                                                    'text' => '<p id="V19" name="V19">0</p>',
                                                ]
                                            ),
                                            'Mstar-p2' => array(
                                                [
                                                    'text' => '<p id="W19" name="W19">0</p>',
                                                ]
                                            ),
                                            'Mstar-p3' => array(
                                                [
                                                    'text' => '<p id="X19" name="X19">0</p>',
                                                ]
                                            ),
                                            'Mstar-p4' => array(
                                                [
                                                    'text' => '<p id="Y19" name="Y19">0</p>',
                                                ]
                                            ),
                                            'k2G' => array(
                                                [
                                                    'text' => '<p id="Z19" name="Z19">0</p>',
                                                ]
                                            ),
                                            'defl' => array(
                                                [
                                                    'text' => '<p id="AA19" name="AA19">0</p>',
                                                ]
                                            ),
                                        ],
                                    ),
                                    'column' => array(
                                        [
                                            'id' => 'name',
                                            'label' => '',
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => 'Mstar-p1',
                                            'label' => 'M* (P1)',
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => 'Mstar-p2',
                                            'label' => 'M* (P2)',
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => 'Mstar-p3',
                                            'label' => 'M* (P3)',
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => 'Mstar-p4',
                                            'label' => 'M* (P4)',
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => 'k2G',
                                            'label' => 'k2G+k2ΨlQ+(Ψs-Ψl)Q',
                                            'width' => '100px',
                                        ],
                                        [
                                            'id' => 'defl',
                                            'label' => 'defl mids (mm)',
                                            'width' => '100px',
                                        ],
                                    )
                                ],
                            )
                        ],
                        [
                            'menuTitle' => '7. BEAM INFORMATION',
                            'input' => array(
                                [
                                    'slot' => 1,
                                    'inputType' => 'table',
                                    'column' => array(
                                        [
                                            'id' => 'material',
                                            'label' => 'Material',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'type',
                                            'label' => 'Type',
                                            'width' => '50px',
                                        ],
                                        [
                                            'id' => 'size',
                                            'label' => 'Size',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'fb',
                                            'label' => 'fb',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'fs',
                                            'label' => 'fs',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'E',
                                            'label' => 'E',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'fb-wet',
                                            'label' => 'fb (wet)',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'fs-wet',
                                            'label' => 'fs (wet)',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'E-wet',
                                            'label' => 'E (wet)',
                                            'width' => '50px',

                                        ],
                                    ),
                                    'row' => array(
                                        [
                                            'material' => array(['text' => '<p id="AC14" name="AC14">0</p>']),
                                            'type' => array(['text' => '<p id="AD14" name="AD14">0</p>']),
                                            'size' => array(['text' => '<p id="AE14" name="AE14">0</p>']),
                                            'fb' => array(['text' => '<p id="AF14" name="AF14">0</p>']),
                                            'fs' => array(['text' => '<p id="AG14" name="AG14">0</p>']),
                                            'E' => array(['text' => '<p id="AH14" name="AH14">0</p>']),
                                            'fb-wet' => array(['text' => '<p id="AI14" name="AI14">0</p>']),
                                            'fs-wet' => array(['text' => '<p id="AJ14" name="AJ14">0</p>']),
                                            'E-wet' => array(['text' => '<p id="AK14" name="AK14">0</p>']),
                                        ]
                                    )
                                ],
                                [
                                    'slot' => 1,
                                    'inputType' => 'table',
                                    'column' => array(
                                        [
                                            'id' => 'self-wt',
                                            'label' => 'Self Wt',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'b',
                                            'label' => 'b',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'd',
                                            'label' => 'd',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'A',
                                            'label' => 'A',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'Z',
                                            'label' => 'Z',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'I',
                                            'label' => 'I',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'b-flitch',
                                            'label' => 'b (flitch)',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'd-flitch',
                                            'label' => 'd (flitch)',
                                            'width' => '50px',

                                        ],
                                    ),
                                    'row' => array(
                                        [
                                            'self-wt' => array(['text' => '<p id="AL14" name="AL14">0</p>']),
                                            'b' => array(['text' => '<p id="AM14" name="AM14">0</p>']),
                                            'd' => array(['text' => '<p id="AN14" name="AN14">0</p>']),
                                            'A' => array(['text' => '<p id="AO14" name="AO14">0</p>']),
                                            'Z' => array(['text' => '<p id="AP14" name="AP14">0</p>']),
                                            'I' => array(['text' => '<p id="AQ14" name="AQ14">0</p>']),
                                            'b-flitch' => array(['text' => '<p id="AR14" name="AR14">0</p>']),
                                            'd-flitch' => array(['text' => '<p id="AS14" name="AS14">0</p>']),
                                        ]
                                    )
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'EQ3.5',
                                    'id' => 'AD17',
                                    'name' => 'AD17',
                                    'disabled' => true,
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'S1',
                                    'id' => 'AF17',
                                    'name' => 'AF17',
                                    'disabled' => true,
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k8 - dry',
                                    'id' => 'AI17',
                                    'name' => 'AI17',
                                    'disabled' => true,
                                    'type' => 'number',
                                ],
                                [
                                    'inputType' => 'text',
                                    'label' => 'k8 - wet',
                                    'id' => 'AI18',
                                    'name' => 'AI18',
                                    'disabled' => true,
                                    'type' => 'number',
                                ],
                            )
                        ],
                        [
                            'menuTitle' => '8. Graphic',
                            'canvas' => '<canvas id="renderCanvas" touch-action="none"></canvas>',
                        ]
                    )
                ],
            ),
        ];


    }
    public function getFromProperties()
    {
        return $this->fromProperties;
    }
    // You can add custom methods for specific operations here
}
