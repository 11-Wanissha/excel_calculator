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
                  'label' => 'Span L', // required
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
                      'label' => 'Ψ(s)', // required
                      'name' => 'h(s)', // required
                      'id' => 'h(s)', // required
                      'type' => 'number',
                    ],
                    [
                      'inputType' => 'text',
                      'label' => 'Ψ(l)', // required
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
                      'name' => 'p1', // required
                      'unit' => 'p1',
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
                      'name' => 'q1', // required
                      'unit' => 'q1',
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
                      'name' => 'r1', // required
                      'unit' => 'r1',
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
                      'name' => 's1', // required
                      'unit' => 's1',
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
                      'name' => 'qO1', // required
                      'unit' => 'qO1',
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
            [
              'menuTitle' => '6. TOTAL LOADS',
              'input' => array(
                [
                  'slot' => 1,
                  'inputType' => 'table',
                  'row' => array(
                    [
                      'Gcol1' => array(
                        [
                          'text' => 'qwe',
                        ],
                        [
                          'text' => '12321',
                        ],
                        [
                          'text' => 'asd',
                        ],
                        [
                          'text' => 'qwewq',
                        ],
                      ),
                      'Qroof' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      'Qfloor' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      'Qdeck' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      'Qwall' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      '1.2G' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      'Mstar-mid' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      'Mstar-p1' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      'Mstar-p2' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      'Mstar-p3' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      'Mstar-p4' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      'k2G' => array(
                        [
                          'text' => '',
                        ]
                      ),
                      'defl' => array(
                        [
                          'text' => '',
                        ]
                      ),
                    ]
                  ),
                  'column' => array(
                    [
                      'id' => 'Gcol1',
                      'label' => 'G',
                    ],
                    [
                      'id' => 'Qroof',
                      'label' => 'QRoof'
                    ],
                    [
                      'id' => 'Qfloor',
                      'label' => 'Qfloor',
                    ],
                    [
                      'id' => 'Qdeck',
                      'label' => 'Qdeck',
                    ],
                    [
                      'id' => 'Qwall',
                      'label' => 'Qwall',
                    ],
                    [
                      'id' => '1.2G',
                      'label' => '1.2G+1.5Q',
                    ],
                    [
                      'id' => 'Mstar-mid',
                      'label' => 'M* (midspan)',
                    ],
                    [
                      'id' => 'Mstar-p1',
                      'label' => 'M* (P1)',
                    ],
                    [
                      'id' => 'Mstar-p2',
                      'label' => 'M* (P2)',
                    ],
                    [
                      'id' => 'Mstar-p3',
                      'label' => 'M* (P3)',
                    ],
                    [
                      'id' => 'Mstar-p4',
                      'label' => 'M* (P4)',
                    ],
                    [
                      'id' => 'k2G',
                      'label' => 'k2G+k2ΨlQ+(Ψs-Ψl)Q',
                    ],
                    [
                      'id' => 'defl',
                      'label' => 'defl mids (mm)',
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
