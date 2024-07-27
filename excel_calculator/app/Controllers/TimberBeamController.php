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
                  'id' => 'A', // required
                  'name' => 'A',
                ],
                [
                  'inputType' => 'dropdown',
                  'slot' => 1,
                  'label' => 'Beam Type', // required
                  'selectOption' => "โปรดเลือก",
                  'id' => 'B', // required
                  'disabled' => false,
                  // required
                  'option' => array(
                    [
                      'optionName' => "Timber - VSG8",
                      'value' => "VSG8",
                      'selected' => true,
                    ],
                    [
                      'optionName' => "Timber - VSG10",
                      'value' => "VSG10",
                    ],
                    [
                      'optionName' => "Timber - No 1 Framing",
                      'value' => "timNo1",
                    ],
                    [
                      'optionName' => "Glulam8",
                      'value' => "gluLam8",
                    ],
                    [
                      'optionName' => "Glulam12",
                      'value' => "gluLam12",
                    ],
                    [
                      'optionName' => "Glulam17",
                      'value' => "gluLam17",
                    ],
                    [
                      'optionName' => "LVL - hySPAN",
                      'value' => "lvlHyspan",
                    ],
                    [
                      'optionName' => "LVL - hy90",
                      'value' => "LVL - hyONE",
                    ],
                    [
                      'optionName' => "LVL - hyONE",
                      'value' => "lvlOne",
                    ],
                    [
                      'optionName' => "Flitch Beam",
                      'value' => "flitchBeam",
                    ],
                    [
                      'optionName' => "CUSTOM",
                      'value' => "custom",
                    ],
                  ),
                ],
                [
                  'inputType' => 'dropdown',
                  'id' => 'C', // required id กับ name จะใช้ตัวเดียวกัน ใส่เป็น text ได้
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
                  'label' => 'Span', // required
                  'id' => 'D', // required
                  'name' => 'D',
                  'unit' => 'm',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'span/', // required
                  'id' => 'E', // required
                  'name' => 'E',
                  'type' => 'number',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'Deflection Limit', // required
                  'id' => 'F', // required
                  'name' => 'F',
                  'disabled' => true,
                ],
                [
                  'inputType' => 'text',
                  'label' => 'Vibration Limit', // required
                  'id' => 'G', // required
                  'name' => 'G',
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
                      'name' => 'hgkPa', // required
                      'id' => 'hgkPa', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q (kPa)', // required
                      'name' => 'hqkPa', // required
                      'id' => 'hqkPa', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'h(s)', // required
                      'name' => 'h(s)', // required
                      'id' => 'h(s)', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'h(l)', // required
                      'name' => 'h(l)', // required
                      'id' => 'h(l)', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'w Trib. Width', // required
                      'name' => 'hTrib', // required
                      'id' => 'hTrib', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P1 Trib. area', // required
                      'name' => 'hP1', // required
                      'id' => 'hP1', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2 Trib. Area', // required
                      'name' => 'hP2', // required
                      'id' => 'hP2', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3 Trib. Area', // required
                      'name' => 'hP3', // required
                      'id' => 'hP3', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4 Trib. Area', // required
                      'name' => 'hP3', // required
                      'id' => 'hP3', // required
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
                      'name' => 'igkPa', // required
                      'id' => 'igkPa', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q (kPa)', // required
                      'name' => 'iqkPa', // required
                      'id' => 'iqkPa', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(s)', // required
                      'name' => 'i(s)', // required
                      'id' => 'i(s)', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(l)', // required
                      'name' => 'i(l)', // required
                      'id' => 'i(l)', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'w Trib. Width', // required
                      'name' => 'iTrib', // required
                      'id' => 'iTrib', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P1 Trib. area', // required
                      'name' => 'iP1', // required
                      'id' => 'iP1', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2 Trib. Area', // required
                      'name' => 'iP2', // required
                      'id' => 'iP2', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3 Trib. Area', // required
                      'name' => 'iP3', // required
                      'id' => 'iP3', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4 Trib. Area', // required
                      'name' => 'iP3', // required
                      'id' => 'iP3', // required
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
                      'name' => 'jgkPa', // required
                      'id' => 'jgkPa', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q (kPa)', // required
                      'name' => 'jqkPa', // required
                      'id' => 'jqkPa', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(s)', // required
                      'name' => 'j(s)', // required
                      'id' => 'j(s)', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(l)', // required
                      'name' => 'j(l)', // required
                      'id' => 'j(l)', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'w Trib. Width', // required
                      'name' => 'jTrib', // required
                      'id' => 'jTrib', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P1 Trib. area', // required
                      'name' => 'jP1', // required
                      'id' => 'jP1', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2 Trib. Area', // required
                      'name' => 'jP2', // required
                      'id' => 'jP2', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3 Trib. Area', // required
                      'name' => 'jP3', // required
                      'id' => 'jP3', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4 Trib. Area', // required
                      'name' => 'jP3', // required
                      'id' => 'jP3', // required
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
                      'name' => 'kgkPa', // required
                      'id' => 'kgkPa', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q (kPa)', // required
                      'name' => 'kqkPa', // required
                      'id' => 'kqkPa', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(s)', // required
                      'name' => 'k(s)', // required
                      'id' => 'k(s)', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(l)', // required
                      'name' => 'k(l)', // required
                      'id' => 'k(l)', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'w Trib. Width', // required
                      'name' => 'kTrib', // required
                      'id' => 'kTrib', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P1 Trib. area', // required
                      'name' => 'kP1', // required
                      'id' => 'kP1', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2 Trib. Area', // required
                      'name' => 'kP2', // required
                      'id' => 'kP2', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3 Trib. Area', // required
                      'name' => 'kP3', // required
                      'id' => 'kP3', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4 Trib. Area', // required
                      'name' => 'kP3', // required
                      'id' => 'kP3', // required
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
                      'name' => 'lgkPa', // required
                      'id' => 'lgkPa', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q (kPa)', // required
                      'name' => 'lqkPa', // required
                      'id' => 'lqkPa', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(s)', // required
                      'name' => 'l(s)', // required
                      'id' => 'l(s)', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(l)', // required
                      'name' => 'l(l)', // required
                      'id' => 'l(l)', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'w Trib. Width', // required
                      'name' => 'lTrib', // required
                      'id' => 'lTrib', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P1 Trib. area', // required
                      'name' => 'lP1', // required
                      'id' => 'lP1', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2 Trib. Area', // required
                      'name' => 'lP2', // required
                      'id' => 'lP2', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3 Trib. Area', // required
                      'name' => 'lP3', // required
                      'id' => 'lP3', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4 Trib. Area', // required
                      'name' => 'lP3', // required
                      'id' => 'lP3', // required
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
                      'name' => 'mgkPa', // required
                      'id' => 'mgkPa', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q (kPa)', // required
                      'name' => 'mqkPa', // required
                      'id' => 'mqkPa', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(s)', // required
                      'name' => 'm(s)', // required
                      'id' => 'm(s)', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(l)', // required
                      'name' => 'm(l)', // required
                      'id' => 'm(l)', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'w Trib. Width', // required
                      'name' => 'mTrib', // required
                      'id' => 'mTrib', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P1 Trib. area', // required
                      'name' => 'mP1', // required
                      'id' => 'mP1', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2 Trib. Area', // required
                      'name' => 'mP2', // required
                      'id' => 'mP2', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3 Trib. Area', // required
                      'name' => 'mP3', // required
                      'id' => 'mP3', // required
                      'type' => 'number',
                      'unit' => 'm^2',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4 Trib. Area', // required
                      'name' => 'mP3', // required
                      'id' => 'mP3', // required
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
                      'name' => 'a', // required
                      'id' => 'a', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'b', // required
                      'name' => 'b', // required
                      'id' => 'b', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'c', // required
                      'name' => 'c', // required
                      'id' => 'c', // required
                      'type' => 'number',
                      'unit' => 'm',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'd', // required
                      'name' => 'd', // required
                      'id' => 'd', // required
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
                      'name' => 'o', // required
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
                      'name' => 'p2', // required
                      'unit' => 'p2',
                      'id' => 'kuy', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2', // required
                      'name' => 'p2', // required
                      'unit' => 'p2',
                      'id' => 'kuy', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3', // required
                      'name' => 'p3', // required
                      'unit' => 'p3',
                      'id' => 'kuy', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4', // required
                      'name' => 'p4', // required
                      'unit' => 'p4',
                      'id' => 'kuy', // required
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
                      'name' => 'q2', // required
                      'unit' => 'q2',
                      'id' => 'kuy', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2', // required
                      'name' => 'q2', // required
                      'unit' => 'q2',
                      'id' => 'kuy', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3', // required
                      'name' => 'q3', // required
                      'unit' => 'q3',
                      'id' => 'kuy', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4', // required
                      'name' => 'q4', // required
                      'unit' => 'q4',
                      'id' => 'kuy', // required
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
                      'name' => 'r2', // required
                      'unit' => 'r2',
                      'id' => 'kuy', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2', // required
                      'name' => 'r2', // required
                      'unit' => 'r2',
                      'id' => 'kuy', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3', // required
                      'name' => 'r3', // required
                      'unit' => 'r3',
                      'id' => 'kuy', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4', // required
                      'name' => 'r4', // required
                      'unit' => 'r4',
                      'id' => 'kuy', // required
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
                      'name' => 's2', // required
                      'unit' => 's2',
                      'id' => 'kuy', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2', // required
                      'name' => 's2', // required
                      'unit' => 's2',
                      'id' => 'kuy', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3', // required
                      'name' => 's3', // required
                      'unit' => 's3',
                      'id' => 'kuy', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4', // required
                      'name' => 's4', // required
                      'unit' => 's4',
                      'id' => 'kuy', // required
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
                      'name' => 'qO2', // required
                      'unit' => 'qO2',
                      'id' => 'kuy', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P2', // required
                      'name' => 'qO2', // required
                      'unit' => 'qO2',
                      'id' => 'kuy', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P3', // required
                      'name' => 'qO3', // required
                      'unit' => 'qO3',
                      'id' => 'kuy', // required
                      'type' => 'number'
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'P4', // required
                      'name' => 'qO4', // required
                      'unit' => 'qO4',
                      'id' => 'kuy', // required
                      'type' => 'number'
                    ],
                  ),
                ],
              ),
              'input' => array(
                [
                  'inputType' => 'text',
                  'label' => 'Maximum segment length between Full lateral restraints', // required
                  'name' => 'T ', // required
                  'unit' => 'm',
                  'id' => 'T', // required
                  'type' => 'number'
                ],
                [
                  'inputType' => 'text',
                  'label' => 'k1', // required
                  'name' => 'U', // required
                  'value' => '0.8',
                  'id' => 'U', // required
                  'type' => 'number'
                ],
                [
                  'inputType' => 'text',
                  'label' => 'is timber wet ?', // required
                  'id' => 'V', // required
                  'name' => 'V', // required
                  'type' => 'checkbox',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'k2', // required
                  'name' => 'W', // required
                  'id' => 'W', // required
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
                  'name' => 'AL', // required
                  'id' => 'AL', // required
                  'disabled' => true,
                ],
                [
                  'inputType' => 'text',
                  'label' => 'V*', // required
                  'name' => 'AM', // required
                  'id' => 'AM', // required
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
                      'name' => 'xG', // required
                      'id' => 'xG', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q1', // required
                      'name' => 'xQ1', // required
                      'id' => 'xQ1', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q2', // required
                      'name' => 'xQ2', // required
                      'id' => 'xQ2', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q3', // required
                      'name' => 'xQ3', // required
                      'id' => 'xQ3', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q4', // required
                      'name' => 'xQ4', // required
                      'id' => 'xQ4', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => '1.2G+1.5Q', // required
                      'name' => 'xQ', // required
                      'id' => 'xQ', // required
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
                      'name' => 'yG', // required
                      'id' => 'yG', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q1', // required
                      'name' => 'yQ1', // required
                      'id' => 'yQ1', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q2', // required
                      'name' => 'yQ2', // required
                      'id' => 'yQ2', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q3', // required
                      'name' => 'yQ3', // required
                      'id' => 'yQ3', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Q4', // required
                      'name' => 'yQ4', // required
                      'id' => 'yQ4', // required
                      'disabled' => true,
                    ],
                    [
                      'inputType' => 'text',
                      'label' => '1.2G+1.5Q', // required
                      'name' => 'yQ', // required
                      'id' => 'yQ', // required
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
                  'name' => 'Z', // required
                  'id' => 'Z', // required
                  'disabled' => true,
                ],
                [
                  'inputType' => 'text',
                  'label' => 'k1', // required
                  'name' => 'AA', // required
                  'id' => 'AA', // required
                  'disabled' => true,
                ],
                [
                  'inputType' => 'text',
                  'label' => 'k4', // required
                  'name' => 'AB', // required
                  'id' => 'AB', // required
                  'value' => '1',
                  'type' => 'number'
                ],
                [
                  'inputType' => 'text',
                  'label' => 'k5', // required
                  'name' => 'AC', // required
                  'id' => 'AC', // required
                  'value' => '1',
                  'type' => 'number'
                ],
                [
                  'inputType' => 'text',
                  'label' => 'k8', // required
                  'name' => 'AD', // required
                  'id' => 'AD', // required
                  'disabled' => true,
                ],
                [
                  'inputType' => 'text',
                  'label' => 'f(b)', // required
                  'name' => 'AE', // required
                  'id' => 'AE', // required
                  'disabled' => true,
                  'unit' => 'MPa',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'f(s)', // required
                  'name' => 'AF', // required
                  'id' => 'AF', // required
                  'disabled' => true,
                  'unit' => 'MPa',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'A', // required
                  'name' => 'AG', // required
                  'id' => 'AG', // required
                  'disabled' => true,
                  'unit' => 'mm^2',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'Z', // required
                  'name' => 'AH', // required
                  'id' => 'AH', // required
                  'disabled' => true,
                  'unit' => 'mm^3',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'k8', // required
                  'name' => 'AI', // required
                  'id' => 'AI', // required
                  'disabled' => true,
                ],
                [
                  'inputType' => 'text',
                  'label' => 'E', // required
                  'name' => 'AJ', // required
                  'id' => 'AJ', // required
                  'disabled' => true,
                  'unit' => 'GPa',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'I', // required
                  'name' => 'AK', // required
                  'id' => 'AK', // required
                  'disabled' => true,
                  'unit' => 'mm^4',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'φM(x)', // required
                  'name' => 'AN', // required
                  'id' => 'AN', // required
                  'disabled' => true,
                  'unit' => 'kNm',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'SLS δ', // required
                  'name' => 'AO', // required
                  'id' => 'AO', // required
                  'disabled' => true,
                  'unit' => 'mm^4',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'φV', // required
                  'name' => 'AP', // required
                  'id' => 'AP', // required
                  'disabled' => true,
                  'unit' => 'kN',
                ],
                [
                  'inputType' => 'text',
                  'label' => 'Vibration δ', // required
                  'name' => 'AQ', // required
                  'id' => 'AQ', // required
                  'disabled' => true,
                  'unit' => 'mm',
                ],
              ),
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
    return $this->response->setJSON($this->request->getPost());
  }
}
