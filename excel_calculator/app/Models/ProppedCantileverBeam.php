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
                                    'input' => array([
                                        'inputType' => 'table',
                                        'column' => array(
                                            [
                                                'id' => "name",
                                                'label' => "loads",
                                                'width' => '100px',

                                            ],
                                            [
                                                'id' => "C17",
                                                'label' => "G",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "D17",
                                                'label' => "Q",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "E17",
                                                'label' => "Wu",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "F17",
                                                'label' => "Eu",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "G17",
                                                'label' => "Su",
                                                'width' => '100px',
                                            ],
                                        ), // required
                                        'row' => array(
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'P1',
                                                    ]
                                                ),
                                                'C17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C18" name="C18" value=""  /',
                                                    ]
                                                ),
                                                'D17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="D18" name="D18" value=""  /',
                                                    ]
                                                ),
                                                'E17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="E18" name="E18" value=""  /',
                                                    ]
                                                ),
                                                'F17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F18" name="F18" value=""  /',
                                                    ]
                                                ),
                                                'G17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="G18" name="G18" value=""  /',
                                                    ]
                                                ),
                                            ],
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'P2',
                                                    ]
                                                ),
                                                'C17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C19" name="C19" value=""  /',
                                                    ]
                                                ),
                                                'D17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="D19" name="D19" value=""  /',
                                                    ]
                                                ),
                                                'E17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="E19" name="E19" value=""  /',
                                                    ]
                                                ),
                                                'F17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F19" name="F19" value=""  /',
                                                    ]
                                                ),
                                                'G17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="G19" name="G19" value=""  /',
                                                    ]
                                                ),
                                            ],
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'P3',
                                                    ]
                                                ),
                                                'C17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C20" name="C20" value=""  /',
                                                    ]
                                                ),
                                                'D17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="D20" name="D20" value=""  /',
                                                    ]
                                                ),
                                                'E17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="E20" name="E20" value=""  /',
                                                    ]
                                                ),
                                                'F17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F20" name="F20" value=""  /',
                                                    ]
                                                ),
                                                'G17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="G20" name="G20" value=""  /',
                                                    ]
                                                ),
                                            ],
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'P4',
                                                    ]
                                                ),
                                                'C17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C21" name="C21" value=""  /',
                                                    ]
                                                ),
                                                'D17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="D21" name="D21" value=""  /',
                                                    ]
                                                ),
                                                'E17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="E21" name="E21" value=""  /',
                                                    ]
                                                ),
                                                'F17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F21" name="F21" value=""  /',
                                                    ]
                                                ),
                                                'G17' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="G21" name="G21" value=""  /',
                                                    ]
                                                ),
                                            ],
                                            
                                        ), // required
                                        'slot' => 1, // ถ้าใส่ มันจะเต็มทั้งแถว
                                    ]
                                        
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
                                                'id' => "C25",
                                                'label' => "1.35G",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "D25",
                                                'label' => "1.2G+1.5Q",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "E25",
                                                'label' => "1.2G+1.5ψlQ",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "F25",
                                                'label' => "1.2G+ψcQ+Wu",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "G25",
                                                'label' => "0.9G+Wu",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "H25",
                                                'label' => "G+ψEQ+Eu",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "I25",
                                                'label' => "1.2G+ψcQ+Su",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "J25",
                                                'label' => "Puls",
                                                'width' => '100px',
                                            ],
                                        ), // required
                                        'row' => array(
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'P1',
                                                    ]
                                                ),
                                                'C25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C26" name="C26" value=""  /',
                                                    ]
                                                ),
                                                'D25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="D26" name="D26" value=""  /',
                                                    ]
                                                ),
                                                'E25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="E26" name="E26" value=""  /',
                                                    ]
                                                ),
                                                'F25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F26" name="F26" value=""  /',
                                                    ]
                                                ),
                                                'G25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="G26" name="G26" value=""  /',
                                                    ]
                                                ),
                                                'H25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="H26" name="H26" value=""  /',
                                                    ]
                                                ),
                                                'I25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="I26" name="I26" value=""  /',
                                                    ]
                                                ),
                                                'J25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="J26" name="J26" value=""  /',
                                                    ]
                                                ),
                                            ],
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'P2',
                                                    ]
                                                ),
                                                'C25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C27" name="C27" value=""  /',
                                                    ]
                                                ),
                                                'D25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="D27" name="D27" value=""  /',
                                                    ]
                                                ),
                                                'E25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="E27" name="E27" value=""  /',
                                                    ]
                                                ),
                                                'F25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F27" name="F27" value=""  /',
                                                    ]
                                                ),
                                                'G25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="G27" name="G27" value=""  /',
                                                    ]
                                                ),
                                                'H25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="H27" name="H27" value=""  /',
                                                    ]
                                                ),
                                                'I25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="I27" name="I27" value=""  /',
                                                    ]
                                                ),
                                                'J25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="J27" name="J27" value=""  /',
                                                    ]
                                                ),
                                            ],
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'P3',
                                                    ]
                                                ),
                                                'C25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C28" name="C28" value=""  /',
                                                    ]
                                                ),
                                                'D25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="D28" name="D28" value=""  /',
                                                    ]
                                                ),
                                                'E25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="E28" name="E28" value=""  /',
                                                    ]
                                                ),
                                                'F25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F28" name="F28" value=""  /',
                                                    ]
                                                ),
                                                'G25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="G28" name="G28" value=""  /',
                                                    ]
                                                ),
                                                'H25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="H28" name="H28" value=""  /',
                                                    ]
                                                ),
                                                'I25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="I28" name="I28" value=""  /',
                                                    ]
                                                ),
                                                'J25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="J28" name="J28" value=""  /',
                                                    ]
                                                ),
                                            ],
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'P4',
                                                    ]
                                                ),
                                                'C25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C29" name="C29" value=""  /',
                                                    ]
                                                ),
                                                'D25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="D29" name="D29" value=""  /',
                                                    ]
                                                ),
                                                'E25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="E29" name="E29" value=""  /',
                                                    ]
                                                ),
                                                'F25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F29" name="F29" value=""  /',
                                                    ]
                                                ),
                                                'G25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="G29" name="G29" value=""  /',
                                                    ]
                                                ),
                                                'H25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="H29" name="H29" value=""  /',
                                                    ]
                                                ),
                                                'I25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="I29" name="I29" value=""  /',
                                                    ]
                                                ),
                                                'J25' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="J29" name="J29" value=""  /',
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
                                                'label' => "Psls",
                                                'width' => '100px',

                                            ],
                                            [
                                                'id' => "C32",
                                                'label' => "G+ψlQ",
                                                'width' => '100px',
                                            ],
                                            
                                        ), // required
                                        'row' => array(
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'P1',
                                                    ]
                                                ),
                                                'C32' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C33" name="C33" value=""  /',
                                                    ]
                                                ),
                                                
                                            ],
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'P2',
                                                    ]
                                                ),
                                                'C32' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C34" name="C34" value=""  /',
                                                    ]
                                                ),
                                                
                                            ],
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'P3',
                                                    ]
                                                ),
                                                'C32' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C35" name="C35" value=""  /',
                                                    ]
                                                ),
                                                
                                            ],
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'P4',
                                                    ]
                                                ),
                                                'C32' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C36" name="C36" value=""  /',
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
                                                'id' => "C40",
                                                'label' => "G",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "D40",
                                                'label' => "Q",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "E40",
                                                'label' => "Wu",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "F40",
                                                'label' => "Eu",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "G40",
                                                'label' => "Su",
                                                'width' => '100px',
                                            ],
                                        ), // required
                                        'row' => array(
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'q',
                                                    ]
                                                ),
                                                'C40' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C41" name="C41" value=""  /',
                                                    ]
                                                ),
                                                'D40' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="D41" name="D41" value=""  /',
                                                    ]
                                                ),
                                                'E40' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="E41" name="E41" value=""  /',
                                                    ]
                                                ),
                                                'F40' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F41" name="F41" value=""  /',
                                                    ]
                                                ),
                                                'G40' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="G41" name="G41" value=""  /',
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
                                                'label' => "case",
                                                'width' => '100px',

                                            ],
                                            [
                                                'id' => "C46",
                                                'label' => "1.35G",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "D46",
                                                'label' => "1.2G+1.5Q",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "E46",
                                                'label' => "1.2G+1.5ψlQ",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "F46",
                                                'label' => "1.2G+ψcQ+Wu",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "G46",
                                                'label' => "0.9G+Wu",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "H46",
                                                'label' => "G+ψEQ+Eu",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "I46",
                                                'label' => "1.2G+ψcQ+Su",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "J46",
                                                'label' => "quls",
                                                'width' => '100px',
                                            ],
                                        ), // required
                                        'row' => array(
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => '',
                                                    ]
                                                ),
                                                'C46' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C47" name="C47" value=""  /',
                                                    ]
                                                ),
                                                'D46' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="D47" name="D47" value=""  /',
                                                    ]
                                                ),
                                                'E46' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="E47" name="E47" value=""  /',
                                                    ]
                                                ),
                                                'F46' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F47" name="F47" value=""  /',
                                                    ]
                                                ),
                                                'G46' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="G47" name="G47" value=""  /',
                                                    ]
                                                ),
                                                'H46' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="H47" name="H47" value=""  /',
                                                    ]
                                                ),
                                                'I46' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="I47" name="I47" value=""  /',
                                                    ]
                                                ),
                                                'J46' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="J47" name="J47" value=""  /',
                                                    ]
                                                ),
                                            ],
                                            
                                        ), // required
                                        'slot' => 1, // ถ้าใส่ มันจะเต็มทั้งแถว
                                    ]
                                        
                                    ),
                                    
                                ],
                                [
                                    'subMenuTitle' => '1.6 Distributed loads',
                                    'input' => array([
                                        'inputType' => 'table',
                                        'column' => array(
                                            [
                                                'id' => "name",
                                                'label' => "qsls",
                                                'width' => '100px',

                                            ],
                                            [
                                                'id' => "C51",
                                                'label' => "G+ψlQ",
                                                'width' => '100px',
                                            ],
                                            
                                        ), // required
                                        'row' => array(
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => '',
                                                    ]
                                                ),
                                                'C51' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C52" name="C52" value=""  /',
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
                                
                            ),
                        ],
                        [
                            'menuTitle' => '2. Any',
                            'subMenu' => array(
                                [
                                    'subMenuTitle' => '2.1 Point loads',
                                    'input' => array([
                                        'inputType' => 'table',
                                        'column' => array(
                                            
                                            [
                                                'id' => "C14any",
                                                'label' => "Puls",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "D14any",
                                                'label' => "Psls",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "E14any",
                                                'label' => "a(m)",
                                                'width' => '100px',
                                            ],
                                            [
                                                'id' => "F14any",
                                                'label' => "b(m)",
                                                'width' => '100px',
                                            ],
                                            
                                        ), // required
                                        'row' => array(
                                            [
                                                
                                                'C14any' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C15any" name="C15any" value=""  /',
                                                    ]
                                                ),
                                                'D14any' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="D15any" name="D15any" value=""  /',
                                                    ]
                                                ),
                                                'E14any' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="E15any" name="E15any" value=""  /',
                                                    ]
                                                ),
                                                'F14any' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F15any" name="F15any" value=""  /',
                                                    ]
                                                ),
                                                
                                            ],
                                            [
                                                
                                                'C14any' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C16any" name="C16any" value=""  /',
                                                    ]
                                                ),
                                                'D14any' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="D16any" name="D16any" value=""  /',
                                                    ]
                                                ),
                                                'E14any' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="E16any" name="E16any" value=""  /',
                                                    ]
                                                ),
                                                'F14any' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F16any" name="F16any" value=""  /',
                                                    ]
                                                ),
                                                
                                            ],
                                            [
                                                
                                                'C14any' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C17any" name="C17any" value=""  /',
                                                    ]
                                                ),
                                                'D14any' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="D17any" name="D17any" value=""  /',
                                                    ]
                                                ),
                                                'E14any' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="E17any" name="E17any" value=""  /',
                                                    ]
                                                ),
                                                'F14any' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F17any" name="F17any" value=""  /',
                                                    ]
                                                ),
                                                
                                            ],
                                            [
                                                
                                                'C14any' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="C18any" name="C18any" value=""  /',
                                                    ]
                                                ),
                                                'D14any' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="D18any" name="D18any" value=""  /',
                                                    ]
                                                ),
                                                'E14any' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="E18any" name="E18any" value=""  /',
                                                    ]
                                                ),
                                                'F14any' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="F18any" name="F18any" value=""  /',
                                                    ]
                                                ),
                                                
                                            ],
                                            
                                        ), // required
                                        'slot' => 1, // ถ้าใส่ มันจะเต็มทั้งแถว
                                    ]
                                        
                                    ),
                                    
                                ],
                                [
                                    'subMenuTitle' => '2.2 Distributed loads',
                                    'input' => array([
                                        'inputType' => 'table',
                                        'column' => array(
                                            [
                                                'id' => "name",
                                                'label' => "",
                                                'width' => '100px',

                                            ],
                                            [
                                                'id' => "D20",
                                                'label' => "(kN/m)",
                                                'width' => '100px',
                                            ],
                                            
                                            
                                        ), // required
                                        'row' => array(
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'quls',
                                                    ]
                                                ),
                                                'D20' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="D21" name="D21" value=""  /',
                                                    ]
                                                ),
                                                
                                            ],
                                            [
                                                'name' => array(
                                                    [
                                                        'text' => 'qsls',
                                                    ]
                                                ),
                                                'D20' => array(
                                                    [
                                                        'text' => '<input type="number" step="any"  class="form-control" id="D22" name="D22" value=""  /',
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
                                            'id' => "D7",
                                            'label' => "Length of span (m)",
                                            'width' => '100px',

                                        ],
                                        [
                                            'id' => "D8",
                                            'label' => "Inertia (mm4)",
                                            'width' => '100px',

                                        ],
                                        [
                                            'id' => "D9",
                                            'label' => "Elasticity modulus (MPa)",
                                            'width' => '100px',
                                        ],
                                        
                                    ), // required
                                    'row' => array(
                                        [
                                        
                                            'D7' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="C7" name="C7" value="0.4"  /',
                                                ]
                                            ),
                                            'D8' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="C8" name="C8" value="0.25"  /',
                                                ]
                                            ),
                                            'D9' => array(
                                                [
                                                    'text' => '<input type="number" step="any"  class="form-control" id="C9" name="C9" value="0.7"  /',
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
                            'menuTitle' => '3. result',
                            'input' => array(
                                [
                                    'slot' => 1,
                                    'inputType' => 'table',
                                    'column' => array(
                                        [
                                            'id' => 'mmaxuls',
                                            'label' => 'Mmax(ULS)',
                                            'width' => '150px',

                                        ],
                                        [
                                            'id' => 'mminuls',
                                            'label' => 'Mmin(ULS)',
                                            'width' => '150px',
                                        ],
                                        [
                                            'id' => 'mauls',
                                            'label' => 'Ma(ULS)',
                                            'width' => '150px',

                                        ],
                                        [
                                            'id' => 'mal4uls',
                                            'label' => 'M at L/4(ULS)',
                                            'width' => '150px',

                                        ],
                                        [
                                            'id' => 'mal2uls',
                                            'label' => 'M at L/2(ULS)',
                                            'width' => '150px',

                                        ],
                                        [
                                            'id' => 'ma3l4uls',
                                            'label' => 'M ar 3L/4(ULS)',
                                            'width' => '150px',

                                        ],
                                        [
                                            'id' => 'mmaxsls',
                                            'label' => 'Mmax(SLS)',
                                            'width' => '150px',

                                        ],
                                        [
                                            'id' => 'mminsls',
                                            'label' => 'Mmin(SLS)',
                                            'width' => '150px',
                                        ],
                                        [
                                            'id' => 'masls',
                                            'label' => 'Ma(SLS)',
                                            'width' => '150px',

                                        ],
                                        [
                                            'id' => 'mal4sls',
                                            'label' => 'M at L/4(SLS)',
                                            'width' => '150px',

                                        ],
                                        [
                                            'id' => 'mal2sls',
                                            'label' => 'M at L/2(SLS)',
                                            'width' => '150px',

                                        ],
                                        [
                                            'id' => 'ma3l4sls',
                                            'label' => 'M ar 3L/4(SLS)',
                                            'width' => '150px',

                                        ],
                                    ),
                                    'row' => array(
                                        [
                                            'mmaxuls' => array(['text' => '<p id="L25" name="L25">0</p>']),
                                            'mminuls' => array(['text' => '<p id="L26" name="L26">0</p>']),
                                            'mauls' => array(['text' => '<p id="L27" name="L27">0</p>']),
                                            'mal4uls' => array(['text' => '<p id="L28" name="L28">0</p>']),
                                            'mal2uls' => array(['text' => '<p id="L29" name="L29">0</p>']),
                                            'ma3l4uls' => array(['text' => '<p id="L29" name="L29">0</p>']),
                                            'mmaxsls' => array(['text' => '<p id="M25" name="M25">0</p>']),
                                            'mminsls' => array(['text' => '<p id="M26" name="M26">0</p>']),
                                            'masls' => array(['text' => '<p id="M27" name="M27">0</p>']),
                                            'mal4sls' => array(['text' => '<p id="M28" name="M28">0</p>']),
                                            'mal2sls' => array(['text' => '<p id="M29" name="M29">0</p>']),
                                            'ma3l4sls' => array(['text' => '<p id="M30" name="M30">0</p>']),
                                        ]
                                    )
                                ],
                                [
                                    'slot' => 1,
                                    'inputType' => 'table',
                                    'column' => array(
                                        [
                                            'id' => 'vmaxuls',
                                            'label' => 'Vmax(ULS)',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'vminuls',
                                            'label' => 'Vmin(ULS)',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'rauls',
                                            'label' => 'Ra(ULS)',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'rbuls',
                                            'label' => 'Rb(ULS)',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'vmaxsls',
                                            'label' => 'Vmax(SLS)',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'vminsls',
                                            'label' => 'Vmin(SLS)',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'rasls',
                                            'label' => 'Ra(SLS)',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'rbsls',
                                            'label' => 'Rb(SLS)',
                                            'width' => '50px',

                                        ],
                                    ),
                                    'row' => array(
                                        [
                                            'vmaxuls' => array(['text' => '<p id="L37" name="L37">0</p>']),
                                            'vminuls' => array(['text' => '<p id="L38" name="L38">0</p>']),
                                            'rauls' => array(['text' => '<p id="L39" name="L39">0</p>']),
                                            'rbuls' => array(['text' => '<p id="L40" name="L40">0</p>']),
                                            'vmaxsls' => array(['text' => '<p id="M37" name="M37">0</p>']),
                                            'vminsls' => array(['text' => '<p id="M38" name="M38">0</p>']),
                                            'rasls' => array(['text' => '<p id="M39" name="M39">0</p>']),
                                            'rbsls' => array(['text' => '<p id="M40" name="M40">0</p>']),
                                        ]
                                    )
                                ],
                                [
                                    'slot' => 1,
                                    'inputType' => 'table',
                                    'column' => array(
                                        [
                                            'id' => 'deflectionuls',
                                            'label' => 'Deflection(ULS)',
                                            'width' => '50px',

                                        ],
                                        [
                                            'id' => 'deflectionsls',
                                            'label' => 'Deflection(SLS)',
                                            'width' => '50px',

                                        ],
                                        
                                    ),
                                    'row' => array(
                                        [
                                            'deflectionuls' => array(['text' => '<p id="L51" name="L51">0</p>']),
                                            'deflectionsls' => array(['text' => '<p id="M51" name="M51">0</p>']),
                                            
                                        ]
                                    )
                                ],
                                
                            )
                        ],
                        
                        [
                            'menuTitle' => '4. Graphic',
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
