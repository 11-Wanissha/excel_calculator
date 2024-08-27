<?php

namespace App\Controllers;

use App\Models\TimberBeam;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class TimberBeamController extends BaseController
{
  public function renderer()
  {
    $formProperties = [
      'title' => 'Timber Beam Calculator',
      'url' => '/timber-beam',
      'importUrl' => '/timber-beam-import',
      'secTion' => array(
        [
          'menu' => array(
            [
              'menuTitle' => '1. Variable',
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

                  'label' => 'Beam ID', // required
                  'id' => 'C8', // required
                  'name' => 'C8',
                ],
                [
                  'inputType' => 'dropdown',
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
                  'inputType' => 'text',
                  'label' => 'Span L', // required
                  'id' => 'C12', // required
                  'name' => 'C12',
                  'unit' => 'm',
                  'type' => 'number',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'span/', // required
                  'id' => 'D13', // required
                  'name' => 'D13',
                  'type' => 'number',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'Deflection Limit', // required
                  'id' => 'C14', // required
                  'name' => 'C14',
                  'disabled' => true,
                  'type' => 'number',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'Vibration Limit', // required
                  'id' => 'C15', // required
                  'name' => 'C15',
                  'unit' => 'mm',
                  'type' => 'number',
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
                      'width' => '100px',

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
                      'G(kPa)' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="B20" name="B20" value="0.4"  /',
                        ]
                      ),
                      'Q(kPa)' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="C20" name="C20" value="0.25"  /',
                        ]
                      ),
                      'Ψs' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="D20" name="D20" value="0.7"  /',
                        ]
                      ),
                      'Ψl' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="E20" name="E20" value="0"  /',
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
                      'G(kPa)' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="B21" name="B21" value="0.4"  /',
                        ]
                      ),
                      'Q(kPa)' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="C21" name="C21" value="1.5"  /',
                        ]
                      ),
                      'Ψs' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="D21" name="D21" value="0.7"  /',
                        ]
                      ),
                      'Ψl' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="E21" name="E21" value="0.4"  /',
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
                      'G(kPa)' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="B22" name="B22" value="0.4"  /',
                        ]
                      ),
                      'Q(kPa)' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="C22" name="C22" value="1.5"  /',
                        ]
                      ),
                      'Ψs' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="D22" name="D22" value="0.7"  /',
                        ]
                      ),
                      'Ψl' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="E22" name="E22" value="0.4"  /',
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
                      'G(kPa)' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="B23" name="B23" value="0.3"  /',
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
                      'G(kPa)' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="B24" name="B24" value="0.4"  /',
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
                      'G(kPa)' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="B25" name="B25" value=""  /',
                        ]
                      ),
                      'Q(kPa)' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="C25" name="C25" value=""  /',
                        ]
                      ),
                      'Ψs' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="D25" name="D25" value=""  /',
                        ]
                      ),
                      'Ψl' => array(
                        [
                          'text' => '<input type="number" step="any"  class="form-control" id="E25" name="E25" value=""  /',
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
                      'width' =>'100px',
                    ],
                    [
                      'id' => 'Gcol1',
                      'label' => 'G',
                      'width' =>'100px',

                    ],
                    [
                      'id' => 'Qroof',
                      'label' => 'QRoof',
                     'width' =>'100px',
                    ],
                    [
                      'id' => 'Qfloor',
                      'label' => 'Qfloor',
                      'width' =>'100px',
                    ],
                    [
                      'id' => 'Qdeck',
                      'label' => 'Qdeck',
                      'width' =>'100px',
                    ],
                    [
                      'id' => 'Qwall',
                      'label' => 'Qwall',
                      'width' =>'100px',
                    ],
                    [
                      'id' => '1.2G',
                      'label' => '1.2G+1.5Q',
                     'width' =>'100px',
                    ],
                    [
                      'id' => 'Mstar-mid',
                      'label' => 'M* (midspan)',
                     'width' =>'100px',
                    ],
                    [
                      'id' => 'Mstar-p1',
                      'label' => 'M* (P1)',
                      'width' =>'100px',
                    ],
                    [
                      'id' => 'Mstar-p2',
                      'label' => 'M* (P2)',
                      'width' =>'100px',
                    ],
                    [
                      'id' => 'Mstar-p3',
                      'label' => 'M* (P3)',
                      'width' =>'100px',
                    ],
                    [
                      'id' => 'Mstar-p4',
                      'label' => 'M* (P4)',
                      'width' =>'100px',
                    ],
                    [
                      'id' => 'k2G',
                      'label' => 'k2G+k2ΨlQ+(Ψs-Ψl)Q',
                      'width' =>'100px',
                    ],
                    [
                      'id' => 'defl',
                      'label' => 'defl mids (mm)',
                      'width' =>'100px',
                    ],
                  )
                ]
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
                  'row' => array([
                    'material' => array(['text' => '<p id="AC14" name="AC14">0</p>']),
                    'type' => array(['text' => '<p id="AD14" name="AD14">0</p>']),
                    'size' => array(['text' => '<p id="AE14" name="AE14">0</p>']),
                    'fb' => array(['text' => '<p id="AF14" name="AF14">0</p>']),
                    'fs' => array(['text' => '<p id="AG14" name="AG14">0</p>']),
                    'E' => array(['text' => '<p id="AH14" name="AH14">0</p>']),
                    'fb-wet' => array(['text' => '<p id="AI14" name="AI14">0</p>']),
                    'fs-wet' => array(['text' => '<p id="AJ14" name="AJ14">0</p>']),
                    'E-wet' => array(['text' => '<p id="AK14" name="AK14">0</p>']),
                    'self-wt' => array(['text' => '<p id="AL14" name="AL14">0</p>']),
                    'b' => array(['text' => '<p id="AM14" name="AM14">0</p>']),
                    'd' => array(['text' => '<p id="AN14" name="AN14">0</p>']),
                    'A' => array(['text' => '<p id="AO14" name="AO14">0</p>']),
                    'Z' => array(['text' => '<p id="AP14" name="AP14">0</p>']),
                    'I' => array(['text' => '<p id="AQ14" name="AQ14">0</p>']),
                    'b-flitch' => array(['text' => '<p id="AR14" name="AR14">0</p>']),
                    'd-flitch' => array(['text' => '<p id="AS14" name="AS14">0</p>']),
                  ])
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
            ]
          )
        ],
      ),
    ];

    $model = new TimberBeam();

    return view('pages/timber_beam', [
      "formProperties" => $formProperties,
      "beamSize" => $model->getBeamSize()
    ]);
  }

  public function calculator()
  {
    $req = $this->request->getPost();
    $res = [];
    $model = new TimberBeam();

    $req['I34'] = isset($req['I34']) ? "Yes" : "No";

    /* dd($req); */

    foreach ($req as $key => $val) {
      if (empty($val) || $val == "") {
        $req[$key] = 0;
      }
    }

    $targetBeam = $model->getTargetBeamType($req['C10'], $req['C11']);
    $beamType = $targetBeam['beamType'];

    $res['C27'] = $targetBeam['beamSize']->selfWt;
    $res['I35'] = ($beamType->beamClass == "timber" || $beamType->beamClass == "glulam") && $req['I34'] == "No" ? 2
      : (($beamType->beamClass == "timber" || $beamType->beamClass == "glulam") && $req['I34'] == "Yes" ? 3
        : ((str_contains($beamType->beamClass, 'lvl') || $beamType->beamClass == "flitch") && $req['I34'] == "Yes" ? "ERROR"
          : (($beamType->beamClass == "fltch") ? 1.3
            : 2)));

    $res['H46'] =  $req['I34'] == "No" ? $beamType->E / 1000000 : ($req['I34'] == "Yes" ? $beamType->EW / 1000000 : "");

    /* G - Qwall */
    $res['O14'] = $req['B20'] * $req['F20'] + $req['B21'] * $req['F21'] + $req['B22'] * $req['F22'] + $req['B23'] * $req['F23'] + $req['B24'] * $req['F24'] + $req['B25'] * $req['F25'] + $res['C27'];
    $res['P14'] = $req['C20'] * $req['F20'];
    $res['Q14'] = $req['C21'] * $req['F21'];
    $res['R14'] = $req['C22'] * $req['F22'];
    $res['S14'] = $req['C25'] * $req['F25'];

    /* ============================================= */

    $res['O15'] = $req['B20'] * $req['G20'] + $req['B21'] * $req['G21'] + $req['B22'] * $req['G22'] + $req['B23'] * $req['G23'] + $req['B24'] * $req['G24'] + $req['B25'] * $req['G25'] + $req['B31'];
    $res['P15'] = $req['C20'] * $req['G20'] + $req['B32'];
    $res['Q15'] = $req['C21'] * $req['G21'] + $req['B33'];
    $res['R15'] = $req['C22'] * $req['G22'] + $req['B34'];
    $res['S15'] = $req['C25'] * $req['G25'] + $req['B35'];

    /* ============================================= */

    $res['O16'] = $req['B20'] * $req['H20'] + $req['B21'] * $req['H21'] + $req['B22'] * $req['H22'] + $req['B23'] * $req['H23'] + $req['B24'] * $req['H24'] + $req['B25'] * $req['H25'] + $req['C31'];
    $res['P16'] = $req['C20'] * $req['H20'] + $req['C32'];
    $res['Q16'] = $req['C21'] * $req['H21'] + $req['C33'];
    $res['R16'] = $req['C22'] * $req['H22'] + $req['C34'];;
    $res['S16'] = $req['C25'] * $req['H25'] + $req['C35'];

    /* ============================================= */

    $res['O17'] = $req['B20'] * $req['I20'] + $req['B21'] * $req['I21'] + $req['B22'] * $req['I22'] + $req['B23'] * $req['I23'] + $req['B24'] * $req['I24'] + $req['B25'] * $req['I25'] + $req['D31'];
    $res['P17'] = $req['C20'] * $req['I20'] + $req['D32'];
    $res['Q17'] = $req['C21'] * $req['I21'] + $req['D33'];
    $res['R17'] = $req['C22'] * $req['I22'] + $req['D34'];;
    $res['S17'] = $req['C25'] * $req['I25'] + $req['D35'];

    /* ============================================= */

    $res['O18'] = $req['B20'] * $req['J20'] + $req['B21'] * $req['J21'] + $req['B22'] * $req['J22'] + $req['B23'] * $req['J23'] + $req['B24'] * $req['J24'] + $req['B25'] * $req['J25'] + $req['E31'];
    $res['P18'] = $req['C20'] * $req['J20'] + $req['E32'];
    $res['Q18'] = $req['C21'] * $req['J21'] + $req['E33'];
    $res['R18'] = $req['C22'] * $req['J22'] + $req['E34'];;
    $res['S18'] = $req['C25'] * $req['J25'] + $req['E35'];

    /* 12G + 1.5Q */
    $res['T14'] = 1.2 * $res['O14'] + 1.5 * ($res['P14'] + $res['Q14'] + $res['R14'] + $res['S14']);
    $res['T15'] = 1.2 * $res['O15'] + 1.5 * ($res['P15'] + $res['Q15'] + $res['R15'] + $res['S15']);
    $res['T16'] = 1.2 * $res['O16'] + 1.5 * ($res['P16'] + $res['Q16'] + $res['R16'] + $res['S16']);
    $res['T17'] = 1.2 * $res['O17'] + 1.5 * ($res['P17'] + $res['Q17'] + $res['R17'] + $res['S17']);
    $res['T18'] = 1.2 * $res['O18'] + 1.5 * ($res['P18'] + $res['Q18'] + $res['R18'] + $res['S18']);

    /* M star - k2G */
    $res["U14"] = $res['T14'] * pow($req['C12'], 2) / 8;
    $res["V14"] = $res['T14'] * $req['G27'] * ($req['C12'] - $req['G27']) / 2;
    $res["W14"] = $res['T14'] * $req['H27'] * ($req['C12'] - $req['H27']) / 2;
    $res["X14"] = $res['T14'] * $req['I27'] * ($req['C12'] - $req['I27']) / 2;
    $res["Y14"] = $res['T14'] * $req['J27'] * ($req['C12'] - $req['J27']) / 2;

    $res["Z14"] = $res['I35'] * $res['O14'] +
      $res['I35'] * $req['E20'] * $res['P14'] +
      ($req['D20'] - $req['E20']) * $res['P14'] +
      $res['I35'] * $req['E21'] * $res['Q14'] +
      ($req['D21'] - $req['E21']) * $res['Q14'] +
      $res['I35'] * $req['E22'] * $res['R14'] +
      ($req['D22'] - $req['E22']) * $res['R14'] +
      $res['I35'] * $req['E25'] * $res['S14'] +
      ($req['D25'] - $req['E25']) * $res['S14'];

    /* ============================================= */

    $res["U15"] = empty($req['G27']) ? 0 : ($res['T15'] / 2) * min($req['G27'], $req['C12'] - $req['G27']);
    $res["V15"] = ($req['C12'] == 0) ? 0 : ($res['T15'] * $req['G27'] * ($req['C12'] - $req['G27']) / $req['C12']);
    $res["W15"] = ($req['C12'] == 0) ? 0
      : (($req['H27'] <= $req['G27']) ? $res['T15'] * ($req['C12'] - $req['G27']) * $req['H27'] / $req['C12']
        : (($req['H27'] > $req['G27']) ? $res['T15'] * $req['G27'] * ($req['C12'] - $req['H27']) / $req['C12'] :
          "ERROR"));
    $res["X15"] = ($req['C12'] == 0) ? 0
      : (($req['I27'] <= $req['G27']) ? $res['T15'] * ($req['C12'] - $req['G27']) * $req['I27'] / $req['C12']
        : (($req['I27'] > $req['G27']) ? $res['T15'] * $req['G27'] * ($req['C12'] - $req['I27']) / $req['C12'] :
          "ERROR"));
    $res["Y15"] = ($req['C12'] == 0) ? 0
      : (($req['J27'] <= $req['G27']) ? $res['T15'] * ($req['C12'] - $req['G27']) * $req['J27'] / $req['C12']
        : (($req['J27'] > $req['G27']) ? $res['T15'] * $req['G27'] * ($req['C12'] - $req['J27']) / $req['C12'] :
          "ERROR"));
    $res["Z15"] = $res['I35'] * $res['O15'] +
      $res['I35'] * $req['E20'] * $res['P15'] +
      ($req['D20'] - $req['E20']) * $res['P15'] +
      $res['I35'] * $req['E21'] * $res['Q15'] +
      ($req['D21'] - $req['E21']) * $res['Q15'] +
      $res['I35'] * $req['E22'] * $res['R15'] +
      ($req['D22'] - $req['E22']) * $res['R15'] +
      $res['I35'] * $req['E25'] * $res['S15'] +
      ($req['D25'] - $req['E25']) * $res['S15'];

    /* ============================================= */

    $res['AD17'] = ($req['C11'] == "") ? ""
      : (($req['C10'] == "flitch1")
        ? 1.35 * sqrt($req['I31'] / $targetBeam['beamSize']->bT * sqrt(pow($targetBeam['beamSize']->dT / $targetBeam['beamSize']->bT, 2) - 1))
        : 1.35 * sqrt($req['I31'] / $targetBeam['beamSize']->b * sqrt(pow($targetBeam['beamSize']->d / $targetBeam['beamSize']->b, 2) - 1))
      );
    $res['AF17'] = $res['AD17'] > 10 ? $res['AD17'] : 10;
    $res['AI17'] = ($res['AF17'] > 25) ? 235.5 * ($res['AF17'] ** -1.937)
      : (($res['AF17'] >= 10 && $res['AF17'] <= 25)
        ? 0.21 + 0.175 * $res['AF17'] - 0.0116 * ($res['AF17'] ** 2) + ($res['AF17'] ** 3) / 5000
        : "ERROR");
    $res['AI18'] = ($res['AF17'] > 25) ? 251.4 * ($res['AF17'] ** -1.933)
      : (($res['AF17'] >= 10 && $res['AF17'] <= 25)
        ? 0.45 + 0.1237 * $res['AF17'] - 0.0082 * ($res['AF17'] ** 2) + ($res['AF17'] ** 3) / 7500
        : "ERROR");

    /* ============================================= */

    $res["U16"] = empty($req['H27']) ? 0 : ($res['T16'] / 2) * min($req['H27'], $req['C12'] - $req['H27']);
    $res["V16"] = ($req['C12'] == 0) ? 0
      : (($req['G27'] <= $req['H27']) ? $res['T16'] * ($req['C12'] - $req['H27']) * $req['G27'] / $req['C12']
        : (($req['G27'] > $req['H27']) ? $res['T16'] * $req['H27'] * ($req['C12'] - $req['G27']) / $req['C12'] :
          "ERROR"));
    $res["W16"] = ($req['C12'] == 0) ? 0 : ($res['T16'] * $req['H27'] * ($req['C12'] - $req['H27']) / $req['C12']);
    $res["X16"] = ($req['C12'] == 0) ? 0
      : (($req['I27'] <= $req['H27']) ? $res['T16'] * ($req['C12'] - $req['H27']) * $req['I27'] / $req['C12']
        : (($req['I27'] > $req['H27']) ? $res['T16'] * $req['H27'] * ($req['C12'] - $req['I27']) / $req['C12'] :
          "ERROR"));
    $res["Y16"] = ($req['C12'] == 0) ? 0
      : (($req['J27'] <= $req['H27']) ? $res['T16'] * ($req['C12'] - $req['H27']) * $req['J27'] / $req['C12']
        : (($req['J27'] > $req['H27']) ? $res['T16'] * $req['H27'] * ($req['C12'] - $req['J27']) / $req['C12'] :
          "ERROR"));
    $res["Z16"] = $res['I35'] * $res['O16'] +
      $res['I35'] * $req['E20'] * $res['P16'] +
      ($req['D20'] - $req['E20']) * $res['P16'] +
      $res['I35'] * $req['E21'] * $res['Q16'] +
      ($req['D21'] - $req['E21']) * $res['Q16'] +
      $res['I35'] * $req['E22'] * $res['R16'] +
      ($req['D22'] - $req['E22']) * $res['R16'] +
      $res['I35'] * $req['E25'] * $res['S16'] +
      ($req['D25'] - $req['E25']) * $res['S16'];

    /* ============================================= */

    $res["U17"] = empty($req['I27']) ? 0 : ($res['T17'] / 2) * min($req['I27'], $req['C12'] - $req['I27']);
    $res["V17"] = ($req['C12'] == 0) ? 0
      : (($req['G27'] <= $req['I27']) ? $res['T17'] * ($req['C12'] - $req['I27']) * $req['G27'] / $req['C12']
        : (($req['G27'] > $req['I27']) ? $res['T17'] * $req['I27'] * ($req['C12'] - $req['G27']) / $req['C12'] :
          "ERROR"));
    $res["W17"] = ($req['C12'] == 0) ? 0
      : (($req['H27'] <= $req['I27']) ? $res['T17'] * ($req['C12'] - $req['I27']) * $req['H27'] / $req['C12']
        : (($req['H27'] > $req['I27']) ? $res['T17'] * $req['I27'] * ($req['C12'] - $req['H27']) / $req['C12'] :
          "ERROR"));
    $res["X17"] = ($req['C12'] == 0) ? 0 : ($res['T17'] * $req['I27'] * ($req['C12'] - $req['I27']) / $req['C12']);
    $res["Y17"] = ($req['C12'] == 0) ? 0
      : (($req['J27'] <= $req['I27']) ? $res['T17'] * ($req['C12'] - $req['I27']) * $req['J27'] / $req['C12']
        : (($req['J27'] > $req['I27']) ? $res['T17'] * $req['I27'] * ($req['C12'] - $req['J27']) / $req['C12'] :
          "ERROR"));
    $res["Z17"] = $res['I35'] * $res['O17'] +
      $res['I35'] * $req['E20'] * $res['P17'] +
      ($req['D20'] - $req['E20']) * $res['P17'] +
      $res['I35'] * $req['E21'] * $res['Q17'] +
      ($req['D21'] - $req['E21']) * $res['Q17'] +
      $res['I35'] * $req['E22'] * $res['R17'] +
      ($req['D22'] - $req['E22']) * $res['R17'] +
      $res['I35'] * $req['E25'] * $res['S17'] +
      ($req['D25'] - $req['E25']) * $res['S17'];

    /* ============================================= */

    $res["U18"] = empty($req['J27']) ? 0 : ($res['T18'] / 2) * min($req['J27'], $req['C12'] - $req['J27']);
    $res["V18"] = ($req['C12'] == 0) ? 0
      : (($req['G27'] <= $req['J27']) ? $res['T18'] * ($req['C12'] - $req['J27']) * $req['G27'] / $req['C12']
        : (($req['G27'] > $req['J27']) ? $res['T18'] * $req['J27'] * ($req['C12'] - $req['G27']) / $req['C12'] :
          "ERROR"));
    $res["W18"] = ($req['C12'] == 0) ? 0
      : (($req['H27'] <= $req['J27']) ? $res['T18'] * ($req['C12'] - $req['J27']) * $req['H27'] / $req['C12']
        : (($req['H27'] > $req['J27']) ? $res['T18'] * $req['J27'] * ($req['C12'] - $req['H27']) / $req['C12'] :
          "ERROR"));
    $res["X18"] = ($req['C12'] == 0) ? 0
      : (($req['I27'] <= $req['J27']) ? $res['T18'] * ($req['C12'] - $req['J27']) * $req['I27'] / $req['C12']
        : (($req['I27'] > $req['J27']) ? $res['T18'] * $req['J27'] * ($req['C12'] - $req['I27']) / $req['C12'] :
          "ERROR"));
    $res["Y18"] = ($req['C12'] == 0) ? 0 : ($res['T18'] * $req['J27'] * ($req['C12'] - $req['J27']) / $req['C12']);
    $res["Z18"] = $res['I35'] * $res['O18'] +
      $res['I35'] * $req['E20'] * $res['P18'] +
      ($req['D20'] - $req['E20']) * $res['P18'] +
      $res['I35'] * $req['E21'] * $res['Q18'] +
      ($req['D21'] - $req['E21']) * $res['Q18'] +
      $res['I35'] * $req['E22'] * $res['R18'] +
      ($req['D22'] - $req['E22']) * $res['R18'] +
      $res['I35'] * $req['E25'] * $res['S18'] +
      ($req['D25'] - $req['E25']) * $res['S18'];

    /* ============================================= */
    /* defl mids */
    $res['AA14'] = $req['C12'] == "" ? 0 : (5 * $res['Z14'] * pow($req['C12'], 4) / (384 * $res['H46'] * 1000000 * $targetBeam['beamSize']->I)) * 1000;
    $res['AA15'] = $req['C12'] == "" ? 0 : ($res['Z15'] * min($req['G27'], $req['C12'] - $req['G27']) *
      (3 * pow($req['C12'], 2) - 4 * pow(min($req['G27'], $req['C12'] - $req['G27']), 2)) * 1000 /
      (48 * $res['H46'] * 1000000 * $targetBeam['beamSize']->I));
    $res['AA16'] = $req['C12'] == "" ? 0 : ($res['Z16'] * min($req['H27'], $req['C12'] - $req['H27']) *
      (3 * pow($req['C12'], 2) - 4 * pow(min($req['H27'], $req['C12'] - $req['H27']), 2)) * 1000 /
      (48 * $res['H46'] * 1000000 * $targetBeam['beamSize']->I));
    $res['AA17'] = $req['C12'] == "" ? 0 : ($res['Z17'] * min($req['I27'], $req['C12'] - $req['I27']) *
      (3 * pow($req['C12'], 2) - 4 * pow(min($req['I27'], $req['C12'] - $req['I27']), 2)) * 1000 /
      (48 * $res['H46'] * 1000000 * $targetBeam['beamSize']->I));
    $res['AA18'] = $req['C12'] == "" ? 0 : ($res['Z18'] * min($req['J27'], $req['C12'] - $req['J27']) *
      (3 * pow($req['C12'], 2) - 4 * pow(min($req['J27'], $req['C12'] - $req['J27']), 2)) * 1000 /
      (48 * $res['H46'] * 1000000 * $targetBeam['beamSize']->I));

    /* ============================================= */

    /* sum m-star */

    $res['U19'] = array_sum(array($res['U14'], $res['U15'], $res['U16'], $res['U17'], $res['U18']));
    $res['V19'] = array_sum(array($res['V14'], $res['V15'], $res['V16'], $res['V17'], $res['V18']));
    $res['W19'] = array_sum(array($res['W14'], $res['W15'], $res['W16'], $res['W17'], $res['W18']));
    $res['X19'] = array_sum(array($res['X14'], $res['X15'], $res['X16'], $res['X17'], $res['X18']));
    $res['Y19'] = array_sum(array($res['Y14'], $res['Y15'], $res['Y16'], $res['Y17'], $res['Y18']));

    /* ============================================= */

    $res['C14'] = ($req['D13'] === "") ? "" : ($req['C12'] * 1000 / $req['D13']);

    $res['B39'] = (isset($req['C12']) && $req['C12'] != "") ? $res['O14'] * $req['C12'] / 2 +
      $res['O15'] * ($req['C12'] - $req['G27']) / $req['C12'] +
      $res['O16'] * ($req['C12'] - $req['H27']) / $req['C12'] +
      $res['O17'] * ($req['C12'] - $req['I27']) / $req['C12'] +
      $res['O18'] * ($req['C12'] - $req['J27']) / $req['C12'] : 0;

    /* ============================================= */

    $res['C39'] = (isset($req['C12']) && $req['C12'] != "") ? $res['P14'] * $req['C12'] / 2 +
      $res['P15'] * ($req['C12'] - $req['G27']) / $req['C12'] +
      $res['P16'] * ($req['C12'] - $req['H27']) / $req['C12'] +
      $res['P17'] * ($req['C12'] - $req['I27']) / $req['C12'] +
      $res['P18'] * ($req['C12'] - $req['J27']) / $req['C12'] : 0;

    /* ============================================= */

    $res['D39'] = (isset($req['C12']) && $req['C12'] != "") ? $res['Q14'] * $req['C12'] / 2 +
      $res['Q15'] * ($req['C12'] - $req['G27']) / $req['C12'] +
      $res['Q16'] * ($req['C12'] - $req['H27']) / $req['C12'] +
      $res['Q17'] * ($req['C12'] - $req['I27']) / $req['C12'] +
      $res['Q18'] * ($req['C12'] - $req['J27']) / $req['C12'] : 0;

    /* ============================================= */

    $res['E39'] = (isset($req['C12']) && $req['C12'] != "") ? $res['R14'] * $req['C12'] / 2 +
      $res['R15'] * ($req['C12'] - $req['G27']) / $req['C12'] +
      $res['R16'] * ($req['C12'] - $req['H27']) / $req['C12'] +
      $res['R17'] * ($req['C12'] - $req['I27']) / $req['C12'] +
      $res['R18'] * ($req['C12'] - $req['J27']) / $req['C12'] : 0;

    /* ============================================= */

    $res['F39'] = (isset($req['C12']) && $req['C12'] != "") ? $res['S14'] * $req['C12'] / 2 +
      $res['S15'] * ($req['C12'] - $req['G27']) / $req['C12'] +
      $res['S16'] * ($req['C12'] - $req['H27']) / $req['C12'] +
      $res['S17'] * ($req['C12'] - $req['I27']) / $req['C12'] +
      $res['S18'] * ($req['C12'] - $req['J27']) / $req['C12'] : 0;

    /* ============================================= */

    $res['B40'] = $res['O14'] * $req['C12'] / 2 +
      $res['O15'] * $req['G27'] / $req['C12'] +
      $res['O16'] * $req['H27'] / $req['C12'] +
      $res['O17'] * $req['I27'] / $req['C12'] +
      $res['O18'] * $req['J27'] / $req['C12'];

    /* ============================================= */

    $res['C40'] = $res['P14'] * $req['C12'] / 2 +
      $res['P15'] * $req['G27'] / $req['C12'] +
      $res['P16'] * $req['H27'] / $req['C12'] +
      $res['P17'] * $req['I27'] / $req['C12'] +
      $res['P18'] * $req['J27'] / $req['C12'];

    /* ============================================= */

    $res['D40'] = $res['Q14'] * $req['C12'] / 2 +
      $res['Q15'] * $req['G27'] / $req['C12'] +
      $res['Q16'] * $req['H27'] / $req['C12'] +
      $res['Q17'] * $req['I27'] / $req['C12'] +
      $res['Q18'] * $req['J27'] / $req['C12'];

    /* ============================================= */

    $res['E40'] = $res['R14'] * $req['C12'] / 2 +
      $res['R15'] * $req['G27'] / $req['C12'] +
      $res['R16'] * $req['H27'] / $req['C12'] +
      $res['R17'] * $req['I27'] / $req['C12'] +
      $res['R18'] * $req['J27'] / $req['C12'];

    /* ============================================= */

    $res['F40'] = $res['S14'] * $req['C12'] / 2 +
      $res['S15'] * $req['G27'] / $req['C12'] +
      $res['S16'] * $req['H27'] / $req['C12'] +
      $res['S17'] * $req['I27'] / $req['C12'] +
      $res['S18'] * $req['J27'] / $req['C12'];

    /* ============================================= */

    $res['H43'] = (str_contains($req['C10'], 'lvl'))
      ? (95 / (1000 * $targetBeam['beamSize']->d)) ** 0.154
      : "";

    $res['G39'] = 1.2 * $res['B39'] + 1.5 * ($res['C39'] + $res['D39'] + $res['E39'] + $res['F39']);
    $res['G40'] = 1.2 * $res['B40'] + 1.5 * ($res['C40'] + $res['D40'] + $res['E40'] + $res['F40']);

    $res['I38'] = max(array($res['U19'], $res['V19'], $res['W19'], $res['X19'], $res['Y19']));
    $res['I39'] = $res['I38'] == $res['U19'] ? "at midspan" : ($res['I38'] == $res['V19'] ? "at P1" : ($res['I38'] == $res['W19'] ? "at P2" : ($res['I38'] == $res['X19'] ? "at P3" : ($res['I38'] == $res['Y19'] ? "at P4" : "ERROR"))));

    $res['I40'] = max(array($res['G39'], $res['G40']));
    $res['I41'] = "at support";

    $res['B44'] = (str_contains($req['C10'], 'lvl') || str_contains($req['C10'], 'flitch')) ? 0.9 : ($req['C10'] == 'custom' ? $req['AE22'] : 0.8);
    $res['E44'] = $req['I33'];
    $res['H44'] = $req['I34'] == "No" ? $res['AI17'] : ($req['I34'] == "Yes" ? $res['AI18'] : "");

    $res['B45'] = 1;
    $res['E45'] = 1;

    $res['B46'] = $req['I34'] == "No" ? $beamType->fb / 1000 : ($req['I34'] == "Yes" ? $beamType->fbW / 1000 : "");
    $res['E46'] = $req['I34'] == "No" ? $beamType->fs / 1000 : ($req['I34'] == "Yes" ? $beamType->fsW / 1000 : "");
    $res['H46'] = ($req['I34'] == "No")
      ? $beamType->E / 1000000
      : (($req['I34'] == "Yes")
        ? $beamType->EW / 1000000
        : ""
      );

    $res['B47'] = $targetBeam['beamSize']->A * pow(1000, 2);
    $res['E47'] = $targetBeam['beamSize']->Z * pow(1000, 3);
    $res['H47'] = $targetBeam['beamSize']->I * pow(1000, 4);

    $res['C50'] = ($res['H43'] == "")
      ? ($res['B44'] * $res['E44'] * $res['B45'] * $res['E45'] * $res['H44'] * $res['B46'] * $res['E47'] / (1000 * 1000))
      : ($res['B44'] * $res['E44'] * $res['B45'] * $res['E45'] * $res['H44'] * $res['H43'] * $res['B46'] * $res['E47'] / (1000 * 1000));
    $res['E50'] = $res['C50'] > $res['I38'] ? "OK" : "NOT OK";

    $res['H50'] = ($beamType->beamClass == 'flitch')
      ? ($res['B44'] * $res['E44'] * $res['E46'] * $res['B47'] / 1000)
      : ($res['B44'] * $res['E44'] * $res['B45'] * $res['E45'] * $res['E46'] * $res['B47'] * 2 / 3000);
    $res['J50'] = $res['H50'] > $res['I40'] ? 'OK' : 'NOT OK';

    $res['C52'] = array_sum([
      $res['AA14'],
      $res['AA15'],
      $res['AA16'],
      $res['AA17'],
      $res['AA18']
    ]);
    $res['E52'] = $res['C52'] < $res['C14'] ? 'OK' : 'NOT OK';

    $res['H52'] = ($req['C12'] == 0)
      ? 0
      : 1000 * (($req['C12'] * 1000) ** 3) / (48 * $res['H46'] * 1000 * $res['H47']);
    $res['J52'] = $res['H52'] < $req['C15'] ? 'OK' : 'NOT OK';

    $res['AC14'] = $targetBeam['beamType']->beamClass;
    $res['AD14'] = $targetBeam['beamType']->name;
    $res['AE14'] = $targetBeam['beamSize']->size;
    $res['AF14'] = $targetBeam['beamType']->fb;
    $res['AG14'] = $targetBeam['beamType']->fs;
    $res['AH14'] = $targetBeam['beamType']->E;
    $res['AI14'] = $targetBeam['beamType']->fbW;
    $res['AJ14'] = $targetBeam['beamType']->fsW;
    $res['AK14'] = $targetBeam['beamType']->EW;

    $res['AL14'] = $targetBeam['beamSize']->selfWt;
    $res['AM14'] = $targetBeam['beamSize']->b;
    $res['AN14'] = $targetBeam['beamSize']->d;
    $res['AO14'] = $targetBeam['beamSize']->A;
    $res['AP14'] = $targetBeam['beamSize']->Z;
    $res['AQ14'] = $targetBeam['beamSize']->I;
    $res['AR14'] = $targetBeam['beamSize']->bT;
    $res['AS14'] = $targetBeam['beamSize']->dT;

    foreach ($res as $key => $val) {
      if (is_numeric($val)) {
        $res[$key] =  number_format((float)$val, 3, '.', '');
      }
    }

    return $this->response->setJSON($res);
  }

  public function import()
  {
    $file = $this->request->getFile('file');

    if (!$file || !$file->isValid() || $file->hasMoved()) {
      return $this->response->setJSON(['success' => false, 'message' => 'No file was uploaded.']);
    }

    $reader = new Xlsx();
    $sheet = $reader->load($file->getTempName());
    $worksheet = $sheet->getActiveSheet();

    $fields = ['C8', 'C12', 'B23', 'B24', 'D13', 'C15', 'I31', 'I33', 'B45', 'E45'];

    $rangeFields = [
      $worksheet->rangeToArray('B20:E22', null, true, true, true),
      $worksheet->rangeToArray('B25:E25', null, true, true, true),
      $worksheet->rangeToArray('F20:J25', null, true, true, true),
      $worksheet->rangeToArray('G27:J27', null, true, true, true),
      $worksheet->rangeToArray('B31:E35', null, true, true, true),
    ];

    $cells = [];

    foreach ($fields as $field) {
      $cell = $worksheet->getCell($field)->getValue();
      $cells[$field] = $cell;
    }

    foreach ($rangeFields as $range) {
      foreach ($range as $row => $columns) {
        foreach ($columns as $col => $value) {
          $cellReference = $col . $row;
          $cells[$cellReference] = $value;
        }
      }
    }

    return $this->response->setJSON($cells);
  }
}
