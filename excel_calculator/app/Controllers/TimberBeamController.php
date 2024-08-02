<?php

namespace App\Controllers;

class TimberBeamController extends BaseController
{
  public function renderer()
  {
    $formProperties = [
      'title' => 'Calculator',
      'url' => '/timber-beam',
      'secTion' => array(
        [
          'menu' => array(
            [
              'menuTitle' => '1. Variable',
              'input' => array(
                [
                  'inputType' => 'text',
                  'slot' => 1,  // ถ้าใส่ มันจะเต็มทั้งแถว
                  'label' => 'Beam ID', // required
                  'id' => 'C8', // required
                  'name' => 'C8',
                ],
                [
                  'inputType' => 'dropdown',
                  'slot' => 1,
                  'label' => 'Beam Type', // required
                  'selectOption' => "โปรดเลือก",
                  'id' => 'C10', // required
                  'disabled' => false,
                  // required
                  'option' => array(
                    [
                      'optionName' => "Timber - VSG8",
                      'value' => "timber1",
                      'selected' => true,
                    ],
                    [
                      'optionName' => "Timber - VSG10",
                      'value' => "timber2",
                    ],
                    [
                      'optionName' => "Timber - No 1 Framing",
                      'value' => "timber3",
                    ],
                    [
                      'optionName' => "Glulam8",
                      'value' => "glulam1",
                    ],
                    [
                      'optionName' => "Glulam12",
                      'value' => "glulam2",
                    ],
                    [
                      'optionName' => "Glulam17",
                      'value' => "glulam3",
                    ],
                    [
                      'optionName' => "LVL - hySPAN",
                      'value' => "lvl1",
                    ],
                    [
                      'optionName' => "LVL - hy90",
                      'value' => "lvl2",
                    ],
                    [
                      'optionName' => "LVL - hyONE",
                      'value' => "lvl3",
                    ],
                    [
                      'optionName' => "Flitch Beam",
                      'value' => "flitch1",
                    ],
                    [
                      'optionName' => "CUSTOM",
                      'value' => "custom1",
                    ],
                  ),
                ],
                [
                  'inputType' => 'dropdown',
                  'id' => 'C11', // required id กับ name จะใช้ตัวเดียวกัน ใส่เป็น text ได้
                  'label' => "Beam Size",
                  'selectOption' => "โปรดเลือก",
                  'disabled' => false,
                  // required
                  'option' => array(
                    [
                      'optionName' => "90*45",
                      'value' => "1",
                    ],
                    [
                      'optionName' => "140*45",
                      'value' => "2",
                    ],
                    [
                      'optionName' => "190*45",
                      'value' => "3",
                    ],
                    [
                      'optionName' => "240x45",
                      'value' => "4",
                    ],
                    [
                      'optionName' => "290x45",
                      'value' => "5",
                    ],
                    [
                      'optionName' => "2/90x45",
                      'value' => "6",
                    ],
                    [
                      'optionName' => "2/140x45",
                      'value' => "7",
                    ],
                    [
                      'optionName' => "2/190x45",
                      'value' => "8",
                    ],
                    [
                      'optionName' => "2/240x45",
                      'value' => "9",
                    ],
                    [
                      'optionName' => "2/290x45",
                      'value' => "10",
                    ],
                    [
                      'optionName' => "3/90x45",
                      'value' => "11",
                    ],
                    [
                      'optionName' => "3/140x45",
                      'value' => "12",
                    ],
                    [
                      'optionName' => "3/190x45",
                      'value' => "13",
                    ],
                    [
                      'optionName' => "3/240x45",
                      'value' => "14",
                    ],
                    [
                      'optionName' => "3/290x45",
                      'value' => "15",
                    ],
                  ),
                ],
                [
                  'inputType' => 'number',
                  'label' => 'Span L', // required
                  'id' => 'D12', // required
                  'name' => 'D12',
                  'unit' => 'm',
                ],
                [
                  'inputType' => 'number',
                  'label' => 'span/', // required
                  'id' => 'D13', // required
                  'name' => 'D13',
                  'type' => 'number',
                ],
                [
                  'inputType' => 'number',
                  'label' => 'Deflection Limit', // required
                  'id' => 'C14', // required
                  'name' => 'C14',
                  'disabled' => true,
                ],
                [
                  'inputType' => 'number',
                  'label' => 'Vibration Limit', // required
                  'id' => 'C15', // required
                  'name' => 'C15',
                  'unit' => 'mm',
                ],
              ),
            ],
            [
              'menuTitle' => '2. LOADS',
              'subMenu' => array(
                [
                  'subMenuTitle' => '2.1 Distance to P Loads',
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
              ),
              'input' => array(
                [
                  'inputType' => 'text',
                  'label' => 'Self Weight G', // required
                  'id' => 'C27', // required
                  'name' => 'C27',
                  'type' => 'number',
                  'unit' => 'kN/m',
                  'disabled' => true,
                  'slot' => 1,
                ],
                [
                  'inputType' => 'table',
                  'column' => array(
                    [
                      'id' => "name",
                      'label' => "",
                    ],
                    [
                      'id' => "G(kPa)",
                      'label' => "G (kPa)",
                      'unit' => 'kPa',
                      'width' => '100px',
                    ],
                    [
                      'id' => "Q(kPa)",
                      'label' => "Q (kPa)",
                      'unit' => 'kPa',
                      'width' => '100px',
                    ],
                    [
                      'id' => "Ψs",
                      'label' => "Ψs",
                      'width' => '100px',
                    ],
                    [
                      'id' => "Ψl",
                      'label' => "Ψl",
                      'width' => '100px',
                    ],
                    [
                      'id' => "wTrib.Width(m)",
                      'label' => "w Trib. Width(m)",
                      'unit' => 'm'
                    ],
                    [
                      'id' => "P1Trib.Area(m^2)",
                      'label' => "P1 Trib. Area (m^2)",
                      'unit' => 'm^2'
                    ],
                    [
                      'id' => "P2Trib.Area(m^2)",
                      'label' => "P2 Trib. Area (m^2)",
                      'unit' => 'm^2'
                    ],
                    [
                      'id' => "P3Trib.Area(m^2)",
                      'label' => "P3 Trib. Area (m^2)",
                      'unit' => 'm^2'
                    ],
                    [
                      'id' => "P4Trib.Area(m^2)",
                      'label' => "P4 Trib. Area (m^2)",
                      'unit' => 'm^2'
                    ],
                  ), // required
                  'row' => array(
                    [
                      'name' => array(
                        [
                          'text' => 'Roof',
                        ]
                      ),
                      'G(kPa)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="B20" name="B20" value="0.4"  /',
                        ]
                      ),
                      'Q(kPa)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="C20" name="C20" value="0.25"  /',
                        ]
                      ),
                      'Ψs' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="D20" name="D20" value="0.7"  /',
                        ]
                      ),
                      'Ψl' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="E20" name="E20" value="0"  /',
                        ]
                      ),
                      'wTrib.Width(m)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="F20" name="F20" value=""  /',
                        ]
                      ),
                      'P1Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="G20" name="G20" value=""  /',
                        ]
                      ),
                      'P2Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="H20" name="H20" value=""  /',
                        ]
                      ),
                      'P3Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="I20" name="I20" value=""  /',
                        ]
                      ),
                      'P4Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="J20" name="J20" value=""  /',
                        ]
                      ),
                    ],
                    [
                      'name' => array(
                        [
                          'text' => 'Floor',
                        ]
                      ),
                      'G(kPa)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="B21" name="B21" value="0.4"  /',
                        ]
                      ),
                      'Q(kPa)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="C21" name="C21" value="1.5"  /',
                        ]
                      ),
                      'Ψs' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="D21" name="D21" value="0.7"  /',
                        ]
                      ),
                      'Ψl' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="E21" name="E21" value="0.4"  /',
                        ]
                      ),
                      'wTrib.Width(m)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="F21" name="F21" value=""  /',
                        ]
                      ),
                      'P1Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="G21" name="G21" value=""  /',
                        ]
                      ),
                      'P2Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="H21" name="H21" value=""  /',
                        ]
                      ),
                      'P3Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="I21" name="I21" value=""  /',
                        ]
                      ),
                      'P4Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="J21" name="J21" value=""  /',
                        ]
                      ),
                    ],
                    [
                      'name' => array(
                        [
                          'text' => 'Deck',
                        ]
                      ),
                      'G(kPa)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="B22" name="B22" value="0.4"  /',
                        ]
                      ),
                      'Q(kPa)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="C22" name="C22" value="1.5"  /',
                        ]
                      ),
                      'Ψs' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="D22" name="D22" value="0.7"  /',
                        ]
                      ),
                      'Ψl' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="E22" name="E22" value="0.4"  /',
                        ]
                      ),
                      'wTrib.Width(m)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="F22" name="F22" value=""  /',
                        ]
                      ),
                      'P1Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="G22" name="G22" value=""  /',
                        ]
                      ),
                      'P2Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="H22" name="H22" value=""  /',
                        ]
                      ),
                      'P3Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="I22" name="I22" value=""  /',
                        ]
                      ),
                      'P4Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="J22" name="J22" value=""  /',
                        ]
                      ),
                    ],
                    [
                      'name' => array(
                        [
                          'text' => 'Int Wall',
                        ]
                      ),
                      'G(kPa)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="B23" name="B23" value="0.3"  /',
                        ]
                      ),
                      'Q(kPa)' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      'Ψs' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      'Ψl' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      'wTrib.Width(m)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="F23" name="F23" value=""  /',
                        ]
                      ),
                      'P1Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="G23" name="G23" value=""  /',
                        ]
                      ),
                      'P2Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="H23" name="H23" value=""  /',
                        ]
                      ),
                      'P3Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="I23" name="I23" value=""  /',
                        ]
                      ),
                      'P4Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="J23" name="J23" value=""  /',
                        ]
                      ),
                    ],
                    [
                      'name' => array(
                        [
                          'text' => 'Ex Wall',
                        ]
                      ),
                      'G(kPa)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="B24" name="B24" value="0.4"  /',
                        ]
                      ),
                      'Q(kPa)' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      'Ψs' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      'Ψl' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      'wTrib.Width(m)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="F24" name="F24" value=""  /',
                        ]
                      ),
                      'P1Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="G24" name="G24" value=""  /',
                        ]
                      ),
                      'P2Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="H24" name="H24" value=""  /',
                        ]
                      ),
                      'P3Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="I24" name="I24" value=""  /',
                        ]
                      ),
                      'P4Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="J24" name="J24" value=""  /',
                        ]
                      ),
                    ],
                    [
                      'name' => array(
                        [
                          'text' => 'Other',
                        ]
                      ),
                      'G(kPa)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="B25" name="B25" value=""  /',
                        ]
                      ),
                      'Q(kPa)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="C25" name="C25" value=""  /',
                        ]
                      ),
                      'Ψs' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="D25" name="D25" value=""  /',
                        ]
                      ),
                      'Ψl' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="E25" name="E25" value=""  /',
                        ]
                      ),
                      'wTrib.Width(m)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="F25" name="F25" value=""  /',
                        ]
                      ),
                      'P1Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="G25" name="G25" value=""  /',
                        ]
                      ),
                      'P2Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="H25" name="H25" value=""  /',
                        ]
                      ),
                      'P3Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="I25" name="I25" value=""  /',
                        ]
                      ),
                      'P4Trib.Area(m^2)' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="J25" name="J25" value=""  /',
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
                  'inputType' => 'number',
                  'label' => 'Maximum segment length between Full lateral restraints', // required
                  'name' => 'I31', // required
                  'unit' => 'm',
                  'id' => 'I31', // required
                  'type' => 'number',
                  'value' => '1',
                ],
                [
                  'inputType' => 'number',
                  'label' => 'k1', // required
                  'name' => 'I33', // required
                  'value' => '0.8',
                  'id' => 'I33', // required
                  'type' => 'number'
                ],
                [
                  'inputType' => 'number',
                  'label' => 'is timber wet ?', // required
                  'id' => 'I34', // required
                  'name' => 'I34', // required
                  'type' => 'checkbox',
                ],
                [
                  'inputType' => 'number',
                  'label' => 'k2', // required
                  'name' => 'I35', // required
                  'id' => 'I35', // required
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
                          'text' => '<input type="number" class="form-control" id="B31" name="B31" value=""  /',
                        ]
                      ),
                      'P2' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="C31" name="C31" value=""  /',
                        ]
                      ),
                      'P3' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="D31" name="D31" value=""  /',
                        ]
                      ),
                      'P4' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="E31" name="E31" value=""  /',
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
                          'text' => '<input type="number" class="form-control" id="B32" name="B32" value=""  /',
                        ]
                      ),
                      'P2' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="C32" name="C32" value=""  /',
                        ]
                      ),
                      'P3' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="D32" name="D32" value=""  /',
                        ]
                      ),
                      'P4' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="E32" name="E32" value=""  /',
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
                          'text' => '<input type="number" class="form-control" id="B33" name="B33" value=""  /',
                        ]
                      ),
                      'P2' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="C33" name="C33" value=""  /',
                        ]
                      ),
                      'P3' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="D33" name="D33" value=""  /',
                        ]
                      ),
                      'P4' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="E33" name="E33" value=""  /',
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
                          'text' => '<input type="number" class="form-control" id="B34" name="B34" value=""  /',
                        ]
                      ),
                      'P2' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="C34" name="C34" value=""  /',
                        ]
                      ),
                      'P3' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="D34" name="D34" value=""  /',
                        ]
                      ),
                      'P4' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="E34" name="E34" value=""  /',
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
                          'text' => '<input type="number" class="form-control" id="B35" name="B35" value=""  /',
                        ]
                      ),
                      'P2' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="C35" name="C35" value=""  /',
                        ]
                      ),
                      'P3' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="D35" name="D35" value=""  /',
                        ]
                      ),
                      'P4' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="E35" name="E35" value=""  /',
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
                  'inputType' => 'number',
                  'label' => 'M*', // required
                  'name' => 'I38', // required
                  'id' => 'I38', // required
                  'disabled' => true,
                ],
                [
                  'inputType' => 'text',
                  'label' => '', // required
                  'name' => 'I39', // required
                  'id' => 'I39', // required
                  'disabled' => true,
                ],
                [
                  'inputType' => 'number',
                  'label' => 'V*', // required
                  'name' => 'I40', // required
                  'id' => 'I40', // required
                  'disabled' => true,
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
                      'id' => "Q1",
                      'label' => "Q1",
                    ],
                    [
                      'id' => "Q1",
                      'label' => "Q1",
                    ],
                    [
                      'id' => "Q1",
                      'label' => "Q1",
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
                          'text' => '<input type="number" class="form-control" id="B39" name="B39" value=""  disabled/',
                        ]
                      ),
                      'Q1' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="C39" name="C39" value=""  disabled/',
                        ]
                      ),
                      'Q2' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="D39" name="D39" value=""  disabled/',
                        ]
                      ),
                      'Q3' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="E39" name="E39" value=""  disabled/',
                        ]
                      ),
                      'Q4' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="F39" name="F39" value="" disabled /',
                        ]
                      ),
                      '1.2G' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="G39" name="G39" value="" disabled /',
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
                          'text' => '<input type="number" class="form-control" id="B40" name="B40" value=""  disabled/',
                        ]
                      ),
                      'Q1' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="C40" name="C40" value="" disabled /',
                        ]
                      ),
                      'Q2' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="D40" name="D40" value="" disabled /',
                        ]
                      ),
                      'Q3' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="E40" name="E40" value="" disabled /',
                        ]
                      ),
                      'Q4' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="F40" name="F40" value=""  disabled/',
                        ]
                      ),
                      '1.2G' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="G40" name="G40" value="" disabled /',
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
                  'inputType' => 'number',
                  'label' => 'φ', // required
                  'name' => 'B44', // required
                  'id' => 'B44', // required
                  'disabled' => true,
                ],
                [
                  'inputType' => 'number',
                  'label' => 'k1', // required
                  'name' => 'E44', // required
                  'id' => 'E44', // required
                  'disabled' => true,
                ],
                [
                  'inputType' => 'number',
                  'label' => 'k8', // required
                  'name' => 'H44', // required
                  'id' => 'H44', // required
                  'disabled' => true,
                ],
                [
                  'inputType' => 'number',
                  'label' => 'k4', // required
                  'name' => 'B45', // required
                  'id' => 'B45', // required
                  'value' => '1',
                  'type' => 'number'
                ],
                [
                  'inputType' => 'number',
                  'label' => 'k5', // required
                  'name' => 'E45', // required
                  'id' => 'E45', // required
                  'value' => '1',
                  'type' => 'number'
                ],
                [
                  'inputType' => 'number',
                  'label' => 'f(b)', // required
                  'name' => 'B46', // required
                  'id' => 'B46', // required
                  'disabled' => true,
                  'unit' => 'MPa',
                ],
                [
                  'inputType' => 'number',
                  'label' => 'f(s)', // required
                  'name' => 'E46', // required
                  'id' => 'E46', // required
                  'disabled' => true,
                  'unit' => 'MPa',
                ],
                [
                  'inputType' => 'number',
                  'label' => 'E', // required
                  'name' => 'H46', // required
                  'id' => 'H46', // required
                  'disabled' => true,
                  'unit' => 'GPa',
                ],
                [
                  'inputType' => 'number',
                  'label' => 'A', // required
                  'name' => 'B47', // required
                  'id' => 'B47', // required
                  'disabled' => true,
                  'unit' => 'mm^2',
                ],
                [
                  'inputType' => 'number',
                  'label' => 'Z', // required
                  'name' => 'E47', // required
                  'id' => 'E47', // required
                  'disabled' => true,
                  'unit' => 'mm^3',
                ],
                [
                  'inputType' => 'number',
                  'label' => 'I', // required
                  'name' => 'H47', // required
                  'id' => 'H47', // required
                  'disabled' => true,
                ],
                [
                  'inputType' => 'number',
                  'label' => 'φM(x)', // required
                  'name' => 'C50', // required
                  'id' => 'C50', // required
                  'disabled' => true,
                  'unit' => 'kNm',
                ],
                [
                  'inputType' => 'text',
                  'label' => '', // required
                  'name' => 'E50', // required
                  'id' => 'E50', // required
                  'disabled' => true,
                  'unit' => 'kNm',
                ],
                [
                  'inputType' => 'number',
                  'label' => 'φV', // required
                  'name' => 'H50', // required
                  'id' => 'H50', // required
                  'disabled' => true,
                  'unit' => 'kN',
                ],
                [
                  'inputType' => 'text',
                  'label' => '', // required
                  'name' => 'J50', // required
                  'id' => 'J50', // required
                  'disabled' => true,
                  'unit' => 'kNm',
                ],
                [
                  'inputType' => 'number',
                  'label' => 'SLS δ', // required
                  'name' => 'C52', // required
                  'id' => 'C52', // required
                  'disabled' => true,
                  'unit' => 'mm^4',
                ],
                [
                  'inputType' => 'text',
                  'label' => '', // required
                  'name' => 'E52', // required
                  'id' => 'E52', // required
                  'disabled' => true,
                  'unit' => 'kNm',
                ],
                [
                  'inputType' => 'number',
                  'label' => 'Vibration δ', // required
                  'name' => 'H52', // required
                  'id' => 'H52', // required
                  'disabled' => true,
                  'unit' => 'mm',
                ],
                [
                  'inputType' => 'text',
                  'label' => '', // required
                  'name' => 'J52', // required
                  'id' => 'J52', // required
                  'disabled' => true,
                  'unit' => 'kNm',
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
                          'text' => '<input type="number" class="form-control" id="O14" name="O14" value="" disabled /',
                        ],
                      ),
                      'Qroof' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="P14" name="P14" value="" disabled /',
                        ]
                      ),
                      'Qfloor' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Q14" name="Q14" value="" disabled /',
                        ]
                      ),
                      'Qdeck' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="R14" name="R14" value="" disabled /',
                        ]
                      ),
                      'Qwall' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="S14" name="S14" value="" disabled /',
                        ]
                      ),
                      '1.2G' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="T14" name="T14" value="" disabled /',
                        ]
                      ),
                      'Mstar-mid' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="U14" name="U14" value="" disabled /',
                          'id' => 'U14',
                        ]
                      ),
                      'Mstar-p1' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="V14" name="V14" value="" disabled /',
                        ]
                      ),
                      'Mstar-p2' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="W14" name="W14" value="" disabled /',
                        ]
                      ),
                      'Mstar-p3' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="X14" name="X14" value="" disabled /',
                        ]
                      ),
                      'Mstar-p4' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Y14" name="Y14" value="" disabled /',
                        ]
                      ),
                      'k2G' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Z14" name="Z14" value="" disabled /',
                        ]
                      ),
                      'defl' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="AA14" name="AA14" value="" disabled /',
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
                          'text' => '<input type="number" class="form-control" id="O15" name="O15" value="" disabled /',
                        ],
                      ),
                      'Qroof' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="P15" name="P15" value="" disabled /',
                          'id' => 'P15',
                        ]
                      ),
                      'Qfloor' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Q15" name="Q15" value="" disabled /',
                        ]
                      ),
                      'Qdeck' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="R15" name="R15" value="" disabled /',
                        ]
                      ),
                      'Qwall' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="S15" name="S15" value="" disabled /',
                        ]
                      ),
                      '1.2G' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="T15" name="T15" value="" disabled /',
                        ]
                      ),
                      'Mstar-mid' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="U15" name="U15" value="" disabled /',
                          'id' => 'U15',
                        ]
                      ),
                      'Mstar-p1' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="V15" name="V15" value="" disabled /',
                        ]
                      ),
                      'Mstar-p2' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="W15" name="W15" value="" disabled /',
                          'id' => 'W15',
                        ]
                      ),
                      'Mstar-p3' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="X15" name="X15" value="" disabled /',
                        ]
                      ),
                      'Mstar-p4' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Y15" name="Y15" value="" disabled /',
                          'id' => 'Y15',
                        ]
                      ),
                      'k2G' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Z15" name="Z15" value="" disabled /',
                          'id' => 'Z15',
                        ]
                      ),
                      'defl' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="AA15" name="AA15" value="" disabled /',
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
                          'text' => '<input type="number" class="form-control" id="O16" name="O16" value="" disabled /',
                        ],
                      ),
                      'Qroof' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="P16" name="P16" value="" disabled /',
                          'id' => 'P15',
                        ]
                      ),
                      'Qfloor' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Q16" name="Q16" value="" disabled /',
                        ]
                      ),
                      'Qdeck' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="R16" name="R16" value="" disabled /',
                        ]
                      ),
                      'Qwall' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="S16" name="S16" value="" disabled /',
                        ]
                      ),
                      '1.2G' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="T16" name="T16" value="" disabled /',
                        ]
                      ),
                      'Mstar-mid' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="U16" name="U16" value="" disabled /',
                          'id' => 'U15',
                        ]
                      ),
                      'Mstar-p1' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="V16" name="V16" value="" disabled /',
                        ]
                      ),
                      'Mstar-p2' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="W16" name="W16" value="" disabled /',
                          'id' => 'W15',
                        ]
                      ),
                      'Mstar-p3' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="X16" name="X16" value="" disabled /',
                        ]
                      ),
                      'Mstar-p4' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Y16" name="Y16" value="" disabled /',
                          'id' => 'Y15',
                        ]
                      ),
                      'k2G' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Z16" name="Z16" value="" disabled /',
                          'id' => 'Z15',
                        ]
                      ),
                      'defl' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="AA16" name="AA16" value="" disabled /',
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
                          'text' => '<input type="number" class="form-control" id="O17" name="O17" value="" disabled /',
                        ],
                      ),
                      'Qroof' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="P17" name="P17" value="" disabled /',
                          'id' => 'P15',
                        ]
                      ),
                      'Qfloor' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Q17" name="Q17" value="" disabled /',
                        ]
                      ),
                      'Qdeck' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="R17" name="R17" value="" disabled /',
                        ]
                      ),
                      'Qwall' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="S17" name="S17" value="" disabled /',
                        ]
                      ),
                      '1.2G' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="T17" name="T17" value="" disabled /',
                        ]
                      ),
                      'Mstar-mid' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="U17" name="U17" value="" disabled /',
                          'id' => 'U15',
                        ]
                      ),
                      'Mstar-p1' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="V17" name="V17" value="" disabled /',
                        ]
                      ),
                      'Mstar-p2' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="W17" name="W17" value="" disabled /',
                          'id' => 'W15',
                        ]
                      ),
                      'Mstar-p3' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="X17" name="X17" value="" disabled /',
                        ]
                      ),
                      'Mstar-p4' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Y17" name="Y17" value="" disabled /',
                          'id' => 'Y15',
                        ]
                      ),
                      'k2G' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Z17" name="Z15" value="" disabled /',
                          'id' => 'Z15',
                        ]
                      ),
                      'defl' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="AA17" name="AA17" value="" disabled /',
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
                          'text' => '<input type="number" class="form-control" id="O18" name="O18" value="" disabled /',
                        ],
                      ),
                      'Qroof' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="P18" name="P18" value="" disabled /',
                          'id' => 'P15',
                        ]
                      ),
                      'Qfloor' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Q18" name="Q18" value="" disabled /',
                        ]
                      ),
                      'Qdeck' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="R18" name="R18" value="" disabled /',
                        ]
                      ),
                      'Qwall' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="S18" name="S18" value="" disabled /',
                        ]
                      ),
                      '1.2G' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="T18" name="T18" value="" disabled /',
                        ]
                      ),
                      'Mstar-mid' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="U18" name="U18" value="" disabled /',
                          'id' => 'U15',
                        ]
                      ),
                      'Mstar-p1' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="V18" name="V18" value="" disabled /',
                        ]
                      ),
                      'Mstar-p2' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="W18" name="W18" value="" disabled /',
                          'id' => 'W15',
                        ]
                      ),
                      'Mstar-p3' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="X18" name="X18" value="" disabled /',
                        ]
                      ),
                      'Mstar-p4' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Y18" name="Y18" value="" disabled /',
                          'id' => 'Y15',
                        ]
                      ),
                      'k2G' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Z18" name="Z18" value="" disabled /',
                          'id' => 'Z15',
                        ]
                      ),
                      'defl' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="AA18" name="AA18" value="" disabled /',
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
                          'text' => '<input type="number" class="form-control" id="O19" name="O19" value="" disabled /',
                        ],
                      ),
                      'Qroof' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="P19" name="P19" value="" disabled /',
                          'id' => 'P15',
                        ]
                      ),
                      'Qfloor' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Q19" name="Q19" value="" disabled /',
                        ]
                      ),
                      'Qdeck' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="R19" name="R19" value="" disabled /',
                        ]
                      ),
                      'Qwall' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="S19" name="S19" value="" disabled /',
                        ]
                      ),
                      '1.2G' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="T19" name="T19" value="" disabled /',
                        ]
                      ),
                      'Mstar-mid' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="U19" name="U19" value="" disabled /',
                          'id' => 'U15',
                        ]
                      ),
                      'Mstar-p1' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="V19" name="V19" value="" disabled /',
                        ]
                      ),
                      'Mstar-p2' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="W19" name="W19" value="" disabled /',
                          'id' => 'W15',
                        ]
                      ),
                      'Mstar-p3' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="X19" name="X19" value="" disabled /',
                        ]
                      ),
                      'Mstar-p4' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Y19" name="Y19" value="" disabled /',
                          'id' => 'Y15',
                        ]
                      ),
                      'k2G' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="Z19" name="Z19" value="" disabled /',
                          'id' => 'Z15',
                        ]
                      ),
                      'defl' => array(
                        [
                          'text' => '<input type="number" class="form-control" id="AA19" name="AA19" value="" disabled /',
                        ]
                      ),
                    ],
                  ),
                  'column' => array(
                    [
                      'id' => 'name',
                      'label' => '',
                      'width' => '50px',
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
                ]
              )
            ],
          )
        ],
      ),
    ];

    return view('main/mainPage', [
      "formProperties" => $formProperties
    ]);
  }

  public function calculator()
  {
    $req = $this->request->getPost();

    $req["V"] = isset($req["V"]);

    $timberInfo = array(
      "vsG8" => [
        "fb" => 14000,
        "fs" => 3800,
        "E" => 6700000,
        "fb(wet)" => 11700,
        "fs(wet" => 2400,
        "E(wet)" => 5450000
      ],
      "VSG10" => [
        "fb" => 20000,
        "fs" => 3800,
        "E" => 8350000,
        "fb(wet)" => 11700,
        "fs(wet" => 2400,
        "E(wet)" => 5450000
      ],
      "timNo1" => [
        "fb" => 10000,
        "fs" => 3800,
        "E" => 5000000,
        "fb(wet)" => 7500,
        "fs(wet" => 2400,
        "E(wet)" => 4000000
      ],
      "gluLam8" => [
        "fb" => 19000,
        "fs" => 3700,
        "E" => 8000000,
        "fb(wet)" => 15200,
        "fs(wet" => 2500,
        "E(wet)" => 6400000
      ],
      "gluLam12" => [
        "fb" => 25000,
        "fs" => 3700,
        "E" => 11500000,
        "fb(wet)" => 20000,
        "fs(wet" => 2500,
        "E(wet)" => 9200000
      ],
      "gluLam17" => [
        "fb" => 42000,
        "fs" => 3700,
        "E" => 16700000,
        "fb(wet)" => 33600,
        "fs(wet" => 2500,
        "E(wet)" => 13400000
      ],
      "lvlHyspan" => [
        "fb" => 50000,
        "fs" => 4600,
        "E" => 13200000,
        "fb(wet)" => 0,
        "fs(wet" => 0,
        "E(wet)" => 0
      ],
      "LVL - hyONE" => [
        "fb" => 34000,
        "fs" => 4600,
        "E" => 9500000,
        "fb(wet)" => 0,
        "fs(wet" => 0,
        "E(wet)" => 0
      ],
      "lvlOne" => [
        "fb" => 65000,
        "fs" => 4600,
        "E" => 16000000,
        "fb(wet)" => 0,
        "fs(wet" => 0,
        "E(wet)" => 0
      ],
      "flitchBeam" => [
        "fb" => 300000,
        "fs" => 300000,
        "E" => 200000000,
        "fb(wet)" => 300000,
        "fs(wet" => 300000,
        "E(wet)" => 200000000
      ],
    );

    $targetTimberInfo = $timberInfo[$req["B"]];

    $baseTotalLoads = array(
      "G" => array(
        "w" => $req["hgkPa"] * $req["hTrib"] + $req["igkPa"] * $req["iTrib"] + $req["jgkPa"] * $req["jTrib"] + $req["kgkPa"] * $req["kTrib"] + $req["lgkPa"] * $req["lTrib"] + $req["mgkPa"] * $req["mTrib"] + 0,
        'P1' => $req["hgkPa"] * $req["hP1"] + $req["igkPa"] * $req["iP1"] + $req["jgkPa"] * $req["jP1"] + $req["kgkPa"] * $req["kP1"] + $req["lgkPa"] * $req["lP1"] + $req["mgkPa"] * $req["mP1"] + 0,
        'P2' => $req["hgkPa"] * $req["hP2"] + $req["igkPa"] * $req["iP2"] + $req["jgkPa"] * $req["jP2"] + $req["kgkPa"] * $req["kP2"] + $req["lgkPa"] * $req["lP2"] + $req["mgkPa"] * $req["mP2"] + 0,
        'P3' => $req["hgkPa"] * $req["hP3"] + $req["igkPa"] * $req["iP3"] + $req["jgkPa"] * $req["jP3"] + $req["kgkPa"] * $req["kP3"] + $req["lgkPa"] * $req["lP3"] + $req["mgkPa"] * $req["mP3"] + 0,
        'P4' => $req["hgkPa"] * $req["hP4"] + $req["igkPa"] * $req["iP4"] + $req["jgkPa"] * $req["jP4"] + $req["kgkPa"] * $req["kP4"] + $req["lgkPa"] * $req["lP4"] + $req["mgkPa"] * $req["mP4"] + 0,
      ),
      "Qroof" => array(
        "w" => $req["hqkPa"] * $req["hTrib"],
        'P1' => $req["hqkPa"] * $req["hP1"] + $req["q1"],
        'P2' => $req["hqkPa"] * $req["hP2"] + $req["q2"],
        'P3' => $req["hqkPa"] * $req["hP3"] + $req["q3"],
        'P4' => $req["hqkPa"] * $req["hP4"] + $req["q4"]
      ),
      "Qfloor" => array(
        "w" => $req["iqkPa"] * $req["iTrib"],
        'P1' => $req["iqkPa"] * $req["iP1"] + $req["r1"],
        'P2' => $req["iqkPa"] * $req["iP2"] + $req["r2"],
        'P3' => $req["iqkPa"] * $req["iP3"] + $req["r3"],
        'P4' => $req["iqkPa"] * $req["iP4"] + $req["r4"]
      ),
      "Qdeck" => array(
        "w" => $req["jgkPa"] * $req["jTrib"],
        'P1' => $req["jgkPa"] * $req["jP1"] + $req["s1"],
        'P2' => $req["jgkPa"] * $req["jP2"] + $req["s2"],
        'P3' => $req["jgkPa"] * $req["jP3"] + $req["s3"],
        'P4' => $req["jgkPa"] * $req["jP4"] + $req["s4"]
      ),
      "Qwall" => array(
        "w" => $req["mqkPa"] * $req["mTrib"],
        'P1' => $req["mqkPa"] * $req["mP1"] + $req["qO1"],
        'P2' => $req["mqkPa"] * $req["mP2"] + $req["qO2"],
        'P3' => $req["mqkPa"] * $req["mP3"] + $req["qO3"],
        'P4' => $req["mqkPa"] * $req["mP4"] + $req["qO4"]
      ),
    );

    $totalLoads1G = array(
      "w" => 1.2 * $baseTotalLoads["G"]["w"] + 1.5 * ($baseTotalLoads["Qroof"]["w"] + $baseTotalLoads["Qfloor"]["w"] + $baseTotalLoads["Qdeck"]["w"] + $baseTotalLoads["Qwall"]["w"]),
      "P1" => 1.2 * $baseTotalLoads["G"]["P1"] + 1.5 * ($baseTotalLoads["Qroof"]["P1"] + $baseTotalLoads["Qfloor"]["P1"] + $baseTotalLoads["Qdeck"]["P1"] + $baseTotalLoads["Qwall"]["P1"]),
      "P2" => 1.2 * $baseTotalLoads["G"]["P2"] + 1.5 * ($baseTotalLoads["Qroof"]["P2"] + $baseTotalLoads["Qfloor"]["P2"] + $baseTotalLoads["Qdeck"]["P2"] + $baseTotalLoads["Qwall"]["P2"]),
      "P3" => 1.2 * $baseTotalLoads["G"]["P3"] + 1.5 * ($baseTotalLoads["Qroof"]["P3"] + $baseTotalLoads["Qfloor"]["P3"] + $baseTotalLoads["Qdeck"]["P3"] + $baseTotalLoads["Qwall"]["P3"]),
      "P4" => 1.2 * $baseTotalLoads["G"]["P4"] + 1.5 * ($baseTotalLoads["Qroof"]["P4"] + $baseTotalLoads["Qfloor"]["P4"] + $baseTotalLoads["Qdeck"]["P4"] + $baseTotalLoads["Qwall"]["P4"]),
    );

    $W = (in_array($req["B"], ["VSG8", "VSG10", "timNo1", "gluLam8", "gluLam12", "gluLam17"]) && $req["V"] == "No") ? 2 : ((in_array($req["B"], ["VSG8", "VSG10", "timNo1", "gluLam8", "gluLam12", "gluLam17"]) && $req["V"] == "Yes") ? 3 : ((in_array($req["B"], ["lvlHyspan", "LVL - hyONE", "lvlOne"]) && $req["V"] == "Yes") ? "ERROR" : ($req["B"] == "flitchBeam" ? 1.3 : 2)));

    $mStar = array(
      "midspan" => array(
        "w" => $totalLoads1G["w"] * ($req["D"] * $req["D"]) / 8,
        "P1" => isset($req["a"]) ? 0 : ($totalLoads1G["P1"] / 2) * $req["a"],
        "P2" => isset($req["b"]) ? 0 : ($totalLoads1G["P2"] / 2) * $req["b"],
        "P3" => isset($req["c"]) ? 0 : ($totalLoads1G["P3"] / 2) * $req["c"],
        "P4" => isset($req["d"]) ? 0 : ($totalLoads1G["P4"] / 2) * $req["d"],
      ),
      "P1" => array(
        "w" => $totalLoads1G["w"] * $req["a"] * ($req["D"] - $req["a"]) / 2,
        "P1" => isset($req["D"]) ? 0 : ($totalLoads1G["P1"] * $req["a"] * ($req["D"] - $req["a"]) / $req["D"]),
        "P2" => isset($req["D"]) ? 0 : (($req["a"] <= $req["b"]) ? ($totalLoads1G["P2"] * ($req["D"] - $req["b"]) * $req["a"] / $req["D"]) : (($req["a"] > $req["b"]) ? ($totalLoads1G["P2"] * $req["b"] * ($req["D"] - $req["a"]) / $req["D"]) : "ERROR")),
        "P3" => isset($req["D"]) ? 0 : (($req["a"] <= $req["c"]) ? ($totalLoads1G["P3"] * ($req["D"] - $req["c"]) * $req["a"] / $req["D"]) : (($req["a"] > $req["c"]) ? ($totalLoads1G["P3"] * $req["c"] * ($req["D"] - $req["a"]) / $req["D"]) : "ERROR")),
        "P4" => isset($req["D"]) ? 0 : (($req["a"] <= $req["c"]) ? ($totalLoads1G["P4"] * ($req["D"] - $req["d"]) * $req["a"] / $req["D"]) : (($req["a"] > $req["d"]) ? ($totalLoads1G["P4"] * $req["d"] * ($req["D"] - $req["a"]) / $req["D"]) : "ERROR")),
      ),
      "P2" => array(
        "w" => $totalLoads1G["w"] * $req["b"] * ($req["D"] - $req["b"]) / 2,
        "P1" => ($req["D"] == 0) ? 0 : (($req["b"] <= $req["a"]) ? ($totalLoads1G["P1"] * ($req["D"] - $req["a"]) * $req["b"] / $req["D"]) : (($req["b"] > $req["a"]) ? ($totalLoads1G["P1"] * $req["a"] * ($req["D"] - $req["b"]) / $req["D"]) : "ERROR")),
        "P2" => ($req["D"] == 0) ? 0 : ($totalLoads1G["P2"] * $req["b"] * ($req["D"] - $req["b"]) / $req["D"]),
        "P3" => ($req["D"] == 0) ? 0 : (($req["b"] <= $req["c"]) ? ($totalLoads1G["P3"] * ($req["D"] - $req["c"]) * $req["b"] / $req["D"]) : (($req["b"] > $req["c"]) ? ($totalLoads1G["P3"] * $req["c"] * ($req["D"] - $req["b"]) / $req["D"]) : "ERROR")),
        "P4" => ($req["D"] == 0) ? 0 : (($req["b"] <= $req["d"]) ? ($totalLoads1G["P4"] * ($req["D"] - $req["d"]) * $req["b"] / $req["D"]) : (($req["b"] > $req["d"]) ? ($totalLoads1G["P4"] * $req["d"] * ($req["D"] - $req["b"]) / $req["D"]) : "ERROR")),
      ),
      "P3" => array(
        "w" => $totalLoads1G["w"] * $req["c"] * ($req["D"] - $req["c"]) / 2,
        "P1" => ($req["D"] == 0) ? 0 : (($req["c"] <= $req["a"]) ? ($totalLoads1G["P1"] * ($req["D"] - $req["a"]) * $req["c"] / $req["D"]) : (($req["c"] > $req["a"]) ? ($totalLoads1G["P1"] * $req["a"] * ($req["D"] - $req["c"]) / $req["D"]) : "ERROR")),
        "P2" => ($req["D"] == 0) ? 0 : (($req["c"] <= $req["b"]) ? ($totalLoads1G["P2"] * ($req["D"] - $req["b"]) * $req["c"] / $req["D"]) : (($req["c"] > $req["b"]) ? ($totalLoads1G["P2"] * $req["b"] * ($req["D"] - $req["c"]) / $req["D"]) : "ERROR")),
        "P3" => ($req["D"] == 0) ? 0 : ($totalLoads1G["P3"] * $req["c"] * ($req["D"] - $req["c"]) / $req["D"]),
        "P4" => ($req["D"] == 0) ? 0 : (($req["c"] <= $req["d"]) ? ($totalLoads1G["P4"] * ($req["D"] - $req["d"]) * $req["c"] / $req["D"]) : (($req["c"] > $req["d"]) ? ($totalLoads1G["P4"] * $req["d"] * ($req["D"] - $req["c"]) / $req["D"]) : "ERROR")),
      ),
      "P4" => array(
        "w" => $totalLoads1G["w"] * $req["d"] * ($req["D"] - $req["d"]) / 2,
        "P1" => ($req["D"] == 0) ? 0 : (($req["d"] <= $req["a"]) ? ($totalLoads1G["P1"] * ($req["D"] - $req["a"]) * $req["d"] / $req["D"]) : (($req["d"] > $req["a"]) ? ($totalLoads1G["P1"] * $req["a"] * ($req["D"] - $req["d"]) / $req["D"]) : "ERROR")),
        "P2" => ($req["D"] == 0) ? 0 : (($req["d"] <= $req["b"]) ? ($totalLoads1G["P2"] * ($req["D"] - $req["b"]) * $req["d"] / $req["D"]) : (($req["d"] > $req["b"]) ? ($totalLoads1G["P2"] * $req["b"] * ($req["D"] - $req["d"]) / $req["D"]) : "ERROR")),
        "P3" => ($req["D"] == 0) ? 0 : (($req["d"] <= $req["c"]) ? ($totalLoads1G["P3"] * ($req["D"] - $req["c"]) * $req["d"] / $req["D"]) : (($req["d"] > $req["c"]) ? ($totalLoads1G["P3"] * $req["c"] * ($req["D"] - $req["d"]) / $req["D"]) : "ERROR")),
        "P4" => ($req["D"] == 0) ? 0 : ($totalLoads1G["P4"] * $req["d"] * ($req["D"] - $req["d"]) / $req["D"]),
      ),
      "k2G" => array(
        "w" => (in_array($req["B"], ["VSG8", "VSG10", "timNo1", "gluLam8", "gluLam12", "gluLam17"]) && $req["V"] == "No") ? 2 : ((in_array($req["B"], ["VSG8", "VSG10", "timNo1", "gluLam8", "gluLam12", "gluLam17"]) && $req["V"] == "Yes") ? 3 : ((in_array($req["B"], ["lvlHyspan", "LVL - hyONE", "lvlOne"]) && $req["V"] == "Yes") ? "ERROR" : ($req["B"] == "flitchBeam" ? 1.3 : 2))),
        "P1" => ($req["W"] * $baseTotalLoads["G"]["w"] +
          $req["W"] * $req["h(l)"] * $baseTotalLoads["Qroof"]["P1"] +
          ($req["h(s)"] - $req["h(l)"]) * $baseTotalLoads["Qroof"]["P1"] +
          $req["W"] * $req["i(l)"] * $baseTotalLoads["Qfloor"]["P1"] +
          ($req["i(s)"] - $req["i(l)"]) * $baseTotalLoads["Qfloor"]["P1"] +
          $req["W"] * $req["j(l)"] * $baseTotalLoads["Qdeck"]["P1"] +
          ($req["j(s)"] - $req["j(l)"]) * $baseTotalLoads["Qdeck"]["P1"] +
          $req["W"] * $req["m(l)"] * $baseTotalLoads["Qwall"]["P1"] +
          ($req["m(s)"] - $req["m(l)"]) * $baseTotalLoads["Qwall"]["P1"]),

        "P2" => $req["W"] * $baseTotalLoads["G"]["P1"] +
          $req["W"] * $req["h(l)"] * $baseTotalLoads["Qroof"]["P2"] +
          ($req["h(s)"] - $req["h(l)"]) * $baseTotalLoads["Qroof"]["P2"] +
          $req["W"] * $req["i(l)"] * $baseTotalLoads["Qfloor"]["P2"] +
          ($req["i(s)"] - $req["i(l)"]) * $baseTotalLoads["Qfloor"]["P2"] +
          $req["W"] * $req["j(l)"] * $baseTotalLoads["Qdeck"]["P2"] +
          ($req["j(s)"] - $req["j(l)"]) * $baseTotalLoads["Qdeck"]["P2"] +
          $req["W"] * $req["m(l)"] * $baseTotalLoads["Qwall"]["P2"] +
          ($req["m(s)"] - $req["m(l)"]) * $$baseTotalLoads["Qwall"]["P2"],

        "P3" => $req["W"] * $req["h(l)"] * $baseTotalLoads["Qroof"]["P2"] +
          ($req["h(s)"] - $req["h(l)"]) * $baseTotalLoads["Qroof"]["P2"] +
          $req["W"] * $req["i(l)"] * $baseTotalLoads["Qfloor"]["P3"] +
          ($req["i(s)"] - $req["i(l)"]) * $baseTotalLoads["Qfloor"]["P3"] +
          $req["W"] * $req["j(l)"] * $baseTotalLoads["Qdeck"]["P3"] +
          ($req["j(s)"] - $req["j(l)"]) * $baseTotalLoads["Qdeck"]["P3"] +
          $req["W"] * $req["m(l)"] * $baseTotalLoads["Qwall"]["P3"] +
          ($req["m(s)"] - $req["m(l)"]) * $$baseTotalLoads["Qwall"]["P3"],

        "P4" => $req["W"] * $req["h(l)"] * $baseTotalLoads["Qroof"]["P4"] +
          ($req["h(s)"] - $req["h(l)"]) * $baseTotalLoads["Qroof"]["P4"] +
          $req["W"] * $req["i(l)"] * $baseTotalLoads["Qfloor"]["P4"] +
          ($req["i(s)"] - $req["i(l)"]) * $baseTotalLoads["Qfloor"]["P4"] +
          $req["W"] * $req["j(l)"] * $baseTotalLoads["Qdeck"]["P4"] +
          ($req["j(s)"] - $req["j(l)"]) * $baseTotalLoads["Qdeck"]["P4"] +
          $req["W"] * $req["m(l)"] * $baseTotalLoads["Qwall"]["P4"] +
          ($req["m(s)"] - $req["m(l)"]) * $$baseTotalLoads["Qwall"]["P4"],
      ),
    );

    $defl = array(

    );

    $totalLoads = array(
      [
        'Gcol1' => array(
          ['text' => 'qwe',],
          ['text' => '12321',],
          ['text' => 'asd',],
          ['text' => 'qwewq',],
          ['text' => 'qwewq',],
        ),
        'Qroof' => array(
          ['text' => 'qwe',],
          ['text' => '12321',],
          ['text' => 'asd',],
          ['text' => 'qwewq',],
          ['text' => 'qwewq',],
        ),
        'Qfloor' => array(
          ['text' => 'qwe',],
          ['text' => '12321',],
          ['text' => 'asd',],
          ['text' => 'qwewq',],
          ['text' => 'qwewq',],
        ),
        'Qdeck' => array(
          ['text' => 'qwe',],
          ['text' => '12321',],
          ['text' => 'asd',],
          ['text' => 'qwewq',],
          ['text' => 'qwewq',],
        ),
        'Qwall' => array(
          ['text' => 'qwe',],
          ['text' => '12321',],
          ['text' => 'asd',],
          ['text' => 'qwewq',],
          ['text' => 'qwewq',],
        ),
        '1.2G' => array(
          ['text' => 'qwe',],
          ['text' => '12321',],
          ['text' => 'asd',],
          ['text' => 'qwewq',],
          ['text' => 'qwewq',],
        ),
        'Mstar-mid' => array(
          ['text' => 'qwe',],
          ['text' => '12321',],
          ['text' => 'asd',],
          ['text' => 'qwewq',],
          ['text' => 'qwewq',],
        ),
        'Mstar-p1' => array(
          ['text' => 'qwe',],
          ['text' => '12321',],
          ['text' => 'asd',],
          ['text' => 'qwewq',],
          ['text' => 'qwewq',],
        ),
        'Mstar-p2' => array(
          ['text' => 'qwe',],
          ['text' => '12321',],
          ['text' => 'asd',],
          ['text' => 'qwewq',],
          ['text' => 'qwewq',],
        ),
        'Mstar-p3' => array(
          ['text' => 'qwe',],
          ['text' => '12321',],
          ['text' => 'asd',],
          ['text' => 'qwewq',],
          ['text' => 'qwewq',],
        ),
        'Mstar-p4' => array(
          ['text' => 'qwe',],
          ['text' => '12321',],
          ['text' => 'asd',],
          ['text' => 'qwewq',],
          ['text' => 'qwewq',],
        ),
        'k2G' => array(
          ['text' => 'qwe',],
          ['text' => '12321',],
          ['text' => 'asd',],
          ['text' => 'qwewq',],
          ['text' => 'qwewq',],
        ),
        'defl' => array(
          ['text' => 'qwe',],
          ['text' => '12321',],
          ['text' => 'asd',],
          ['text' => 'qwewq',],
          ['text' => 'qwewq',],
        ),
      ]
    );

    $F = isset($req["E"]) ? "" : ($req["D"] * 1000) / $req["E"];

    $W = (($req["B"] == "VSG8" || $req["B"] == "VSG10" || $req["B"] == "timNo1" || $req["B"] == "gluLam8" || $req["B"] == "gluLam12" || $req["B"] == "gluLam17") && isset($req["V"])) ? 2 : ((($req["B"] == "VSG8" || $req["B"] == "VSG10" || $req["B"] == "timNo1" || $req["B"] == "gluLam8" || $req["B"] == "gluLam12" || $req["B"] == "gluLam17") && isset($req["V"])) ? 3 : ((($req["B"] == "lvlHyspan" || $req["B"] == "LVL - hyONE" || $req["B"] == "lvlOne" || $req["B"] == "flitchBeam") && isset($req["V"])) ? "ERROR" : ($req["B"] == isset($req["V"]))));

    return $this->response->setJSON($this->request->getPost());
  }
}
