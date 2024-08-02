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
                  'inputType' => 'text',
                  'label' => 'Span L', // required
                  'id' => 'D12', // required
                  'name' => 'D12',
                  'unit' => 'm',
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
                ],
                [
                  'inputType' => 'text',
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
                  'subMenuTitle' => '2.1 Roof',
                  'input' => array(
                    [
                      'inputType' => 'text',
                      'label' => 'G (kPa)', // required
                      'name' => 'B20', // required
                      'id' => 'B20', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q (kPa)', // required
                      'name' => 'C20', // required
                      'id' => 'C20', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(s)', // required
                      'name' => 'D20', // required
                      'id' => 'D20', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(l)', // required
                      'name' => 'E20', // required
                      'id' => 'E20', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'w Trib. Width', // required
                      'name' => 'F20', // required
                      'id' => 'F20', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P1 Trib. area', // required
                      'name' => 'G20', // required
                      'id' => 'G20', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2 Trib. Area', // required
                      'name' => 'H20', // required
                      'id' => 'H20', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3 Trib. Area', // required
                      'name' => 'I20', // required
                      'id' => 'I20', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4 Trib. Area', // required
                      'name' => 'J20', // required
                      'id' => 'J20', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                  ),
                ],
                [
                  'subMenuTitle' => '2.2 Floor',
                  'input' => array(
                    [
                      'inputType' => 'text',
                      'label' => 'G (kPa)', // required
                      'name' => 'B21', // required
                      'id' => 'B21', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q (kPa)', // required
                      'name' => 'C21', // required
                      'id' => 'C21', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(s)', // required
                      'name' => 'D21', // required
                      'id' => 'D21', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(l)', // required
                      'name' => 'E21', // required
                      'id' => 'E21', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'w Trib. Width', // required
                      'name' => 'F21', // required
                      'id' => 'F21', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P1 Trib. area', // required
                      'name' => 'G21', // required
                      'id' => 'G21', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2 Trib. Area', // required
                      'name' => 'H21', // required
                      'id' => 'H21', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3 Trib. Area', // required
                      'name' => 'I21', // required
                      'id' => 'I21', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4 Trib. Area', // required
                      'name' => 'J21', // required
                      'id' => 'J21', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                  ),
                ],
                [
                  'subMenuTitle' => '2.3 Deck',
                 'input' => array(
                    [
                      'inputType' => 'text',
                      'label' => 'G (kPa)', // required
                      'name' => 'B22', // required
                      'id' => 'B22', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q (kPa)', // required
                      'name' => 'C22', // required
                      'id' => 'C22', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(s)', // required
                      'name' => 'D22', // required
                      'id' => 'D22', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(l)', // required
                      'name' => 'E22', // required
                      'id' => 'E22', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'w Trib. Width', // required
                      'name' => 'F22', // required
                      'id' => 'F22', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P1 Trib. area', // required
                      'name' => 'G22', // required
                      'id' => 'G22', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2 Trib. Area', // required
                      'name' => 'H22', // required
                      'id' => 'H22', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3 Trib. Area', // required
                      'name' => 'I22', // required
                      'id' => 'I22', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4 Trib. Area', // required
                      'name' => 'J22', // required
                      'id' => 'J22', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                  ),
                ],
                [
                  'subMenuTitle' => '2.4 Wall',
                  'input' => array(
                    [
                      'inputType' => 'text',
                      'label' => 'G (kPa)', // required
                      'name' => 'B23', // required
                      'id' => 'B23', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q (kPa)', // required
                      'name' => 'C23', // required
                      'id' => 'C23', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(s)', // required
                      'name' => 'D23', // required
                      'id' => 'D23', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(l)', // required
                      'name' => 'E23', // required
                      'id' => 'E23', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'w Trib. Width', // required
                      'name' => 'F23', // required
                      'id' => 'F23', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P1 Trib. area', // required
                      'name' => 'G23', // required
                      'id' => 'G23', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2 Trib. Area', // required
                      'name' => 'H23', // required
                      'id' => 'H23', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3 Trib. Area', // required
                      'name' => 'I23', // required
                      'id' => 'I23', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4 Trib. Area', // required
                      'name' => 'J23', // required
                      'id' => 'J23', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                  ),
                ],
                [
                  'subMenuTitle' => '2.5 Ex Wall',
                  'input' => array(
                    [
                      'inputType' => 'text',
                      'label' => 'G (kPa)', // required
                      'name' => 'B24', // required
                      'id' => 'B24', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q (kPa)', // required
                      'name' => 'C24', // required
                      'id' => 'C24', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(s)', // required
                      'name' => 'D24', // required
                      'id' => 'D24', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(l)', // required
                      'name' => 'E24', // required
                      'id' => 'E24', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'w Trib. Width', // required
                      'name' => 'F24', // required
                      'id' => 'F24', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P1 Trib. area', // required
                      'name' => 'G24', // required
                      'id' => 'G24', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2 Trib. Area', // required
                      'name' => 'H24', // required
                      'id' => 'H24', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3 Trib. Area', // required
                      'name' => 'I24', // required
                      'id' => 'I24', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4 Trib. Area', // required
                      'name' => 'J24', // required
                      'id' => 'J24', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                  ),
                ],
                [
                  'subMenuTitle' => '2.6 Ex Other',
                 'input' => array(
                    [
                      'inputType' => 'text',
                      'label' => 'G (kPa)', // required
                      'name' => 'B25', // required
                      'id' => 'B25', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q (kPa)', // required
                      'name' => 'C25', // required
                      'id' => 'C25', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(s)', // required
                      'name' => 'D25', // required
                      'id' => 'D25', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(l)', // required
                      'name' => 'E25', // required
                      'id' => 'E25', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'w Trib. Width', // required
                      'name' => 'F25', // required
                      'id' => 'F25', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P1 Trib. area', // required
                      'name' => 'G25', // required
                      'id' => 'G25', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2 Trib. Area', // required
                      'name' => 'H25', // required
                      'id' => 'H25', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3 Trib. Area', // required
                      'name' => 'I25', // required
                      'id' => 'I25', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4 Trib. Area', // required
                      'name' => 'J25', // required
                      'id' => 'J25', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                  ),
                ],
                [
                  'subMenuTitle' => '2.7 Distance to P Loads',
                  'input' => array(
                    [
                      'inputType' => 'text',
                      'label' => 'a', // required
                      'name' => 'G27', // required
                      'id' => 'G27', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'b', // required
                      'name' => 'H27', // required
                      'id' => 'H27', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'c', // required
                      'name' => 'I27', // required
                      'id' => 'I27', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'd', // required
                      'name' => 'J27', // required
                      'id' => 'J27', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                  ),
                ],
                [
                  'subMenuTitle' => '2.8 Self Weight G',
                  'input' => array(
                    [
                      'inputType' => 'text',
                      'label' => 'Self Weight G', // required
                      'name' => 'C27', // required
                      'unit' => 'kN/m',
                      'id' => 'o', // required
                      'disabled' => true,
                    ],
                  ),
                ],
              ),
            ],
            [
              'menuTitle' => '3. Cal3',
              'subMenu' => array(
                [
                  'subMenuTitle' => '3.1 G',
                  'input' => array(
                    [
                      'inputType' => 'text',
                      'label' => 'P1', // required
                      'name' => 'B31', // required
                      'unit' => 'p1',
                      'id' => 'B31', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2', // required
                      'name' => 'C31', // required
                      'unit' => 'p2',
                      'id' => 'C31', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3', // required
                      'name' => 'D31', // required
                      'unit' => 'p3',
                      'id' => 'D31', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4', // required
                      'name' => 'E31', // required
                      'unit' => 'p4',
                      'id' => 'E31', // required
                      'type' => 'number'
                    ],
                  ),
                ],
                [
                  'subMenuTitle' => '3.2 Q (Roof)',
                  'input' => array(
                    [
                      'inputType' => 'text',
                      'label' => 'P1', // required
                      'name' => 'B32', // required
                      'unit' => 'p1',
                      'id' => 'B32', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2', // required
                      'name' => 'C32', // required
                      'unit' => 'p2',
                      'id' => 'C32', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3', // required
                      'name' => 'D32', // required
                      'unit' => 'p3',
                      'id' => 'D32', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4', // required
                      'name' => 'E32', // required
                      'unit' => 'p4',
                      'id' => 'E32', // required
                      'type' => 'number'
                    ],
                  ),
                ],
                [
                  'subMenuTitle' => '3.3 Q (Floor)',
                  'input' => array(
                    [
                      'inputType' => 'text',
                      'label' => 'P1', // required
                      'name' => 'B33', // required
                      'unit' => 'p1',
                      'id' => 'B33', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2', // required
                      'name' => 'C33', // required
                      'unit' => 'p2',
                      'id' => 'C33', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3', // required
                      'name' => 'D33', // required
                      'unit' => 'p3',
                      'id' => 'D33', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4', // required
                      'name' => 'E33', // required
                      'unit' => 'p4',
                      'id' => 'E33', // required
                      'type' => 'number'
                    ],
                  ),
                ],
                [
                  'subMenuTitle' => '3.4 Q (Deck)',
                 'input' => array(
                    [
                      'inputType' => 'text',
                      'label' => 'P1', // required
                      'name' => 'B34', // required
                      'unit' => 'p1',
                      'id' => 'B34', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2', // required
                      'name' => 'C34', // required
                      'unit' => 'p2',
                      'id' => 'C34', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3', // required
                      'name' => 'D34', // required
                      'unit' => 'p3',
                      'id' => 'D34', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4', // required
                      'name' => 'E34', // required
                      'unit' => 'p4',
                      'id' => 'E34', // required
                      'type' => 'number'
                    ],
                  ),
                ],
                [
                  'subMenuTitle' => '3.4 Q (Other)',
                 'input' => array(
                    [
                      'inputType' => 'text',
                      'label' => 'P1', // required
                      'name' => 'B35', // required
                      'unit' => 'p1',
                      'id' => 'B35', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2', // required
                      'name' => 'C35', // required
                      'unit' => 'p2',
                      'id' => 'C35', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3', // required
                      'name' => 'D35', // required
                      'unit' => 'p3',
                      'id' => 'D35', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4', // required
                      'name' => 'E35', // required
                      'unit' => 'p4',
                      'id' => 'E35', // required
                      'type' => 'number'
                    ],
                  ),
                ],
              ),
              'input' => array(
                [
                  'inputType' => 'text',
                  'label' => 'Maximum segment length between Full lateral restraints', // required
                  'name' => 'I31', // required
                  'unit' => 'm',
                  'id' => 'I31', // required
                  'type' => 'number'
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
                ],
                [
                  'inputType' => 'text',
                  'label' => 'V*', // required
                  'name' => 'I40', // required
                  'id' => 'I40', // required
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
                  'inputType' => 'text',
                  'label' => '', // required
                  'name' => 'I41', // required
                  'id' => 'I41', // required
                  'disabled' => true,
                ],
              ),
              'subMenu' => array(
                [
                  'subMenuTitle' => '3.4 R1',
                  'input' => array(
                    [
                      'inputType' => 'text',
                      'label' => 'G', // required
                      'name' => 'B39', // required
                      'id' => 'B39', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q1', // required
                      'name' => 'C39', // required
                      'id' => 'C39', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q2', // required
                      'name' => 'D39', // required
                      'id' => 'D39', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q3', // required
                      'name' => 'E39', // required
                      'id' => 'E39', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q4', // required
                      'name' => 'F39', // required
                      'id' => 'F39', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => '1.2G+1.5Q', // required
                      'name' => 'G39', // required
                      'id' => 'G39', // required
                      'disabled' => true,
                    ],
                  ),
                ],
                [
                  'subMenuTitle' => '3.4 R2',
                  'input' => array(
                    [
                      'inputType' => 'text',
                      'label' => 'G', // required
                      'name' => 'B40', // required
                      'id' => 'B40', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q1', // required
                      'name' => 'C40', // required
                      'id' => 'C40', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q2', // required
                      'name' => 'D40', // required
                      'id' => 'D40', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q3', // required
                      'name' => 'E40', // required
                      'id' => 'E40', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q4', // required
                      'name' => 'F40', // required
                      'id' => 'F40', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => '1.2G+1.5Q', // required
                      'name' => 'G40', // required
                      'id' => 'G40', // required
                      'disabled' => true,
                    ],
                  ),
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
                ],
                [
                  'inputType' => 'text',
                  'label' => 'k1', // required
                  'name' => 'E44', // required
                  'id' => 'E44', // required
                  'disabled' => true,
                ],
                [
                  'inputType' => 'text',
                  'label' => 'k8', // required
                  'name' => 'H44', // required
                  'id' => 'H44', // required
                  'disabled' => true,
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
                ],
                [
                  'inputType' => 'text',
                  'label' => 'f(s)', // required
                  'name' => 'E46', // required
                  'id' => 'E46', // required
                  'disabled' => true,
                  'unit' => 'MPa',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'E', // required
                  'name' => 'H46', // required
                  'id' => 'H46', // required
                  'disabled' => true,
                  'unit' => 'GPa',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'A', // required
                  'name' => 'B47', // required
                  'id' => 'B47', // required
                  'disabled' => true,
                  'unit' => 'mm^2',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'Z', // required
                  'name' => 'E47', // required
                  'id' => 'E47', // required
                  'disabled' => true,
                  'unit' => 'mm^3',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'I', // required
                  'name' => 'H47', // required
                  'id' => 'H47', // required
                  'disabled' => true,
                ],
                [
                  'inputType' => 'text',
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
                  'inputType' => 'text',
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
                  'inputType' => 'text',
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
                  'inputType' => 'text',
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
                          'text' => '<input type="text" class="form-control" id="O14" name="O14" value="" disabled /',
                        ],
                      ),
                      'Qroof' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="P14" name="P14" value="" disabled /',
                        ]
                      ),
                      'Qfloor' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Q14" name="Q14" value="" disabled /',
                        ]
                      ),
                      'Qdeck' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="R14" name="R14" value="" disabled /',
                        ]
                      ),
                      'Qwall' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="S14" name="S14" value="" disabled /',
                        ]
                      ),
                      '1.2G' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="T14" name="T14" value="" disabled /',
                        ]
                      ),
                      'Mstar-mid' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="U14" name="U14" value="" disabled /',
                          'id' => 'U14',
                        ]
                      ),
                      'Mstar-p1' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="V14" name="V14" value="" disabled /',
                        ]
                      ),
                      'Mstar-p2' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="W14" name="W14" value="" disabled /',
                        ]
                      ),
                      'Mstar-p3' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="X14" name="X14" value="" disabled /',
                        ]
                      ),
                      'Mstar-p4' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Y14" name="Y14" value="" disabled /',
                        ]
                      ),
                      'k2G' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="Z14" name="Z14" value="" disabled /',
                        ]
                      ),
                      'defl' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="AA14" name="AA14" value="" disabled /',
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
                         'text' => '<input type="text" class="form-control" id="O15" name="O15" value="" disabled /',
                        ],
                      ),
                      'Qroof' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="P15" name="P15" value="" disabled /',
                          'id' => 'P15',
                        ]
                      ),
                      'Qfloor' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Q15" name="Q15" value="" disabled /',
                        ]
                      ),
                      'Qdeck' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="R15" name="R15" value="" disabled /',
                        ]
                      ),
                      'Qwall' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="S15" name="S15" value="" disabled /',
                        ]
                      ),
                      '1.2G' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="T15" name="T15" value="" disabled /',
                        ]
                      ),
                      'Mstar-mid' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="U15" name="U15" value="" disabled /',
                          'id' => 'U15',
                        ]
                      ),
                      'Mstar-p1' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="V15" name="V15" value="" disabled /',
                        ]
                      ),
                      'Mstar-p2' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="W15" name="W15" value="" disabled /',
                          'id' => 'W15',
                        ]
                      ),
                      'Mstar-p3' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="X15" name="X15" value="" disabled /',
                        ]
                      ),
                      'Mstar-p4' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Y15" name="Y15" value="" disabled /',
                          'id' => 'Y15',
                        ]
                      ),
                      'k2G' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Z15" name="Z15" value="" disabled /',
                          'id' => 'Z15',
                        ]
                      ),
                      'defl' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="AA15" name="AA15" value="" disabled /',
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
                         'text' => '<input type="text" class="form-control" id="O16" name="O16" value="" disabled /',
                        ],
                      ),
                      'Qroof' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="P16" name="P16" value="" disabled /',
                          'id' => 'P15',
                        ]
                      ),
                      'Qfloor' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Q16" name="Q16" value="" disabled /',
                        ]
                      ),
                      'Qdeck' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="R16" name="R16" value="" disabled /',
                        ]
                      ),
                      'Qwall' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="S16" name="S16" value="" disabled /',
                        ]
                      ),
                      '1.2G' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="T16" name="T16" value="" disabled /',
                        ]
                      ),
                      'Mstar-mid' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="U16" name="U16" value="" disabled /',
                          'id' => 'U15',
                        ]
                      ),
                      'Mstar-p1' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="V16" name="V16" value="" disabled /',
                        ]
                      ),
                      'Mstar-p2' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="W16" name="W16" value="" disabled /',
                          'id' => 'W15',
                        ]
                      ),
                      'Mstar-p3' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="X16" name="X16" value="" disabled /',
                        ]
                      ),
                      'Mstar-p4' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Y16" name="Y16" value="" disabled /',
                          'id' => 'Y15',
                        ]
                      ),
                      'k2G' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Z16" name="Z16" value="" disabled /',
                          'id' => 'Z15',
                        ]
                      ),
                      'defl' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="AA16" name="AA16" value="" disabled /',
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
                         'text' => '<input type="text" class="form-control" id="O17" name="O17" value="" disabled /',
                        ],
                      ),
                      'Qroof' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="P17" name="P17" value="" disabled /',
                          'id' => 'P15',
                        ]
                      ),
                      'Qfloor' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Q17" name="Q17" value="" disabled /',
                        ]
                      ),
                      'Qdeck' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="R17" name="R17" value="" disabled /',
                        ]
                      ),
                      'Qwall' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="S17" name="S17" value="" disabled /',
                        ]
                      ),
                      '1.2G' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="T17" name="T17" value="" disabled /',
                        ]
                      ),
                      'Mstar-mid' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="U17" name="U17" value="" disabled /',
                          'id' => 'U15',
                        ]
                      ),
                      'Mstar-p1' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="V17" name="V17" value="" disabled /',
                        ]
                      ),
                      'Mstar-p2' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="W17" name="W17" value="" disabled /',
                          'id' => 'W15',
                        ]
                      ),
                      'Mstar-p3' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="X17" name="X17" value="" disabled /',
                        ]
                      ),
                      'Mstar-p4' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Y17" name="Y17" value="" disabled /',
                          'id' => 'Y15',
                        ]
                      ),
                      'k2G' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Z17" name="Z15" value="" disabled /',
                          'id' => 'Z15',
                        ]
                      ),
                      'defl' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="AA17" name="AA17" value="" disabled /',
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
                         'text' => '<input type="text" class="form-control" id="O18" name="O18" value="" disabled /',
                        ],
                      ),
                      'Qroof' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="P18" name="P18" value="" disabled /',
                          'id' => 'P15',
                        ]
                      ),
                      'Qfloor' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Q18" name="Q18" value="" disabled /',
                        ]
                      ),
                      'Qdeck' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="R18" name="R18" value="" disabled /',
                        ]
                      ),
                      'Qwall' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="S18" name="S18" value="" disabled /',
                        ]
                      ),
                      '1.2G' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="T18" name="T18" value="" disabled /',
                        ]
                      ),
                      'Mstar-mid' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="U18" name="U18" value="" disabled /',
                          'id' => 'U15',
                        ]
                      ),
                      'Mstar-p1' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="V18" name="V18" value="" disabled /',
                        ]
                      ),
                      'Mstar-p2' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="W18" name="W18" value="" disabled /',
                          'id' => 'W15',
                        ]
                      ),
                      'Mstar-p3' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="X18" name="X18" value="" disabled /',
                        ]
                      ),
                      'Mstar-p4' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Y18" name="Y18" value="" disabled /',
                          'id' => 'Y15',
                        ]
                      ),
                      'k2G' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Z18" name="Z18" value="" disabled /',
                          'id' => 'Z15',
                        ]
                      ),
                      'defl' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="AA18" name="AA18" value="" disabled /',
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
                         'text' => '<input type="text" class="form-control" id="O19" name="O19" value="" disabled /',
                        ],
                      ),
                      'Qroof' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="P19" name="P19" value="" disabled /',
                          'id' => 'P15',
                        ]
                      ),
                      'Qfloor' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Q19" name="Q19" value="" disabled /',
                        ]
                      ),
                      'Qdeck' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="R19" name="R19" value="" disabled /',
                        ]
                      ),
                      'Qwall' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="S19" name="S19" value="" disabled /',
                        ]
                      ),
                      '1.2G' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="T19" name="T19" value="" disabled /',
                        ]
                      ),
                      'Mstar-mid' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="U19" name="U19" value="" disabled /',
                          'id' => 'U15',
                        ]
                      ),
                      'Mstar-p1' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="V19" name="V19" value="" disabled /',
                        ]
                      ),
                      'Mstar-p2' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="W19" name="W19" value="" disabled /',
                          'id' => 'W15',
                        ]
                      ),
                      'Mstar-p3' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="X19" name="X19" value="" disabled /',
                        ]
                      ),
                      'Mstar-p4' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Y19" name="Y19" value="" disabled /',
                          'id' => 'Y15',
                        ]
                      ),
                      'k2G' => array(
                        [
                          'text' => '<input type="text" class="form-control" id="Z19" name="Z19" value="" disabled /',
                          'id' => 'Z15',
                        ]
                      ),
                      'defl' => array(
                        [
                         'text' => '<input type="text" class="form-control" id="AA19" name="AA19" value="" disabled /',
                        ]
                      ),
                    ],
                  ),
                  'column' => array(
                    [
                      'id' => 'name',
                      'label' => '',
                      'width'=> '50px',
                    ],
                    [
                      'id' => 'Gcol1',
                      'label' => 'G',
                      'width'=> '100px',
                    ],
                    [
                      'id' => 'Qroof',
                      'label' => 'QRoof',
                      'width'=> '100px',
                    ],
                    [
                      'id' => 'Qfloor',
                      'label' => 'Qfloor',
                      'width'=> '100px',
                    ],
                    [
                      'id' => 'Qdeck',
                      'label' => 'Qdeck',
                      'width'=> '100px',
                    ],
                    [
                      'id' => 'Qwall',
                      'label' => 'Qwall',
                      'width'=> '100px',
                    ],
                    [
                      'id' => '1.2G',
                      'label' => '1.2G+1.5Q',
                      'width'=> '100px',
                    ],
                    [
                      'id' => 'Mstar-mid',
                      'label' => 'M* (midspan)',
                      'width'=> '100px',
                    ],
                    [
                      'id' => 'Mstar-p1',
                      'label' => 'M* (P1)',
                      'width'=> '100px',
                    ],
                    [
                      'id' => 'Mstar-p2',
                      'label' => 'M* (P2)',
                      'width'=> '100px',
                    ],
                    [
                      'id' => 'Mstar-p3',
                      'label' => 'M* (P3)',
                      'width'=> '100px',
                    ],
                    [
                      'id' => 'Mstar-p4',
                      'label' => 'M* (P4)',
                      'width'=> '100px',
                    ],
                    [
                      'id' => 'k2G',
                      'label' => 'k2G+k2ΨlQ+(Ψs-Ψl)Q',
                      'width'=> '100px',
                    ],
                    [
                      'id' => 'defl',
                      'label' => 'defl mids (mm)',
                      'width'=> '100px',
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
        "P1" => isset($req["D"]) ? 0 : ($totalLoads1G["P1"] * $req["a"] * ($req["D"] -  $req["a"]) / $req["D"]),
        "P2" => isset($req["D"]) ? 0 : (($req["a"] <= $req["b"]) ? ($totalLoads1G["P2"] * ($req["D"] - $req["b"]) * $req["a"] / $req["D"]) : (($req["a"] > $req["b"]) ? ($totalLoads1G["P2"] * $req["b"] * ($req["D"] - $req["a"]) / $req["D"]) : "ERROR")),
        "P3" => isset($req["D"]) ? 0 : (($req["a"] <= $req["c"]) ? ($totalLoads1G["P3"] * ($req["D"] - $req["c"]) * $req["a"] / $req["D"]) : (($req["a"] > $req["c"]) ? ($totalLoads1G["P3"] * $req["c"] * ($req["D"] - $req["a"]) / $req["D"]) : "ERROR")),
        "P4" => isset($req["D"]) ? 0 : (($req["a"] <= $req["c"]) ? ($totalLoads1G["P4"] * ($req["D"] - $req["d"]) * $req["a"] / $req["D"]) : (($req["a"] > $req["d"]) ? ($totalLoads1G["P4"] * $req["d"] * ($req["D"] - $req["a"]) / $req["D"]) : "ERROR")),
      ),
      "P2" => array(
        "w" => $totalLoads1G["w"] * $req["b"] * ($req["D"] - $req["b"]) / 2,
        "P1" => ($req["D"] == 0) ? 0 : (($req["b"] <= $req["a"]) ? ($totalLoads1G["P1"]  * ($req["D"] - $req["a"]) * $req["b"] / $req["D"]) : (($req["b"] > $req["a"]) ? ($totalLoads1G["P1"]  * $req["a"] * ($req["D"] - $req["b"]) / $req["D"]) : "ERROR")),
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
