<?php

namespace App\Controllers;

use App\Models\ProppedCantileverBeam;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as Writer;

class ProppedCantileverBeamController extends BaseController
{
  public function renderer()
  {
    $model = new ProppedCantileverBeam();

    return view('pages/propped_cantilever_beam', [
      "formProperties" => $model->getFromProperties(),

    ]);
  }

  public function calculate()
  {

    // Assuming you’re receiving POST data for calculation
    $req = $this->request->getPost();
    $res = [];
    $value = 0;
    try {
      // Point loads: ULS P1------------------------------------/////
      $res['C26'] = isset($req['C18']) ? $req['C18'] * 1.35 : throw new \ErrorException("error");
      $res['D26'] = isset($req['C18']) && isset($req['D18']) ? $req['C18'] * 1.2 + 1.5 * $req['D18'] : throw new \ErrorException("error");
      $res['E26'] = isset($req['D18']) && isset($req['E18']) && isset($req['C11']) ? $req['D18'] * 1.2 + 1.5 * $req['C11'] * $req['E18'] : throw new \ErrorException("error");
      $res['F26'] = isset($req['C18']) && isset($req['E18']) && isset($req['D18']) && isset($req['C12']) ? 1.2 * $req['C18'] + $req['C12'] * $req['D18'] + $req['E18'] : throw new \ErrorException("error");
      $res['G26'] = isset($req['C18']) && isset($req['E18']) ? 0.9 * $req['C18'] + $req['E18'] : throw new \ErrorException("error");
      $res['H26'] = isset($req['C18']) && isset($req['F18']) && isset($req['D18']) && isset($req['C13']) ? $req['C18'] + $req['C13'] * $req['D18'] + $req['F18'] : throw new \ErrorException("error");
      $res['I26'] = isset($req['C18']) && isset($req['G18']) && isset($req['D18']) && isset($req['C12']) ? 1.2 * $req['C18'] + $req['C12'] * $req['D18'] + $req['G18'] : throw new \ErrorException("error");
      $res['J26'] = max($res['C26'], $res['D26'], $res['E26'], $res['F26'], $res['G26'], $res['H26'], $res['I26']);

      // Point loads: ULS P2------------------------------------/////
      $res['C27'] = isset($req['C19']) ? $req['C19'] * 1.35 : throw new \ErrorException("error");
      $res['D27'] = isset($req['C19']) && isset($req['D19']) ? $req['C19'] * 1.2 + 1.5 * $req['D19'] : throw new \ErrorException("error");
      $res['E27'] = isset($req['D19']) && isset($req['E19']) && isset($req['C11']) ? $req['D19'] * 1.2 + 1.5 * $req['C11'] * $req['E19'] : throw new \ErrorException("error");
      $res['F27'] = isset($req['C19']) && isset($req['E19']) && isset($req['D19']) && isset($req['C12']) ? 1.2 * $req['C19'] + $req['C12'] * $req['D19'] + $req['E19'] : throw new \ErrorException("error");
      $res['G27'] = isset($req['C19']) && isset($req['E19']) ? 0.9 * $req['C19'] + $req['E19'] : throw new \ErrorException("error");
      $res['H27'] = isset($req['C19']) && isset($req['F19']) && isset($req['D19']) && isset($req['C13']) ? $req['C19'] + $req['C13'] * $req['D19'] + $req['F19'] : throw new \ErrorException("error");
      $res['I27'] = isset($req['C19']) && isset($req['G19']) && isset($req['D19']) && isset($req['C12']) ? 1.2 * $req['C19'] + $req['C12'] * $req['D19'] + $req['G19'] : throw new \ErrorException("error");
      $res['J27'] = max($res['C27'], $res['D27'], $res['E27'], $res['F27'], $res['G27'], $res['H27'], $res['I27']);

      // Point loads: ULS P3------------------------------------/////
      $res['C28'] = isset($req['C20']) ? $req['C20'] * 1.35 : throw new \ErrorException("error");
      $res['D28'] = isset($req['C20']) && isset($req['D20']) ? $req['C20'] * 1.2 + 1.5 * $req['D20'] : throw new \ErrorException("error");
      $res['E28'] = isset($req['D20']) && isset($req['E20']) && isset($req['C20']) ? $req['D20'] * 1.2 + 1.5 * $req['C11'] * $req['E20'] : throw new \ErrorException("error");
      $res['F28'] = isset($req['C20']) && isset($req['E20']) && isset($req['D20']) && isset($req['C20']) ? 1.2 * $req['C20'] + $req['C12'] * $req['D20'] + $req['E20'] : throw new \ErrorException("error");
      $res['G28'] = isset($req['C20']) && isset($req['E20']) ? 0.9 * $req['C20'] + $req['E20'] : throw new \ErrorException("error");
      $res['H28'] = isset($req['C20']) && isset($req['F20']) && isset($req['D20']) && isset($req['C13']) ? $req['C20'] + $req['C13'] * $req['D20'] + $req['F20'] : throw new \ErrorException("error");
      $res['I28'] = isset($req['C20']) && isset($req['G20']) && isset($req['D20']) && isset($req['C12']) ? 1.2 * $req['C20'] + $req['C12'] * $req['D20'] + $req['G20'] : throw new \ErrorException("error");
      $res['J28'] = max($res['C28'], $res['D28'], $res['E28'], $res['F28'], $res['G28'], $res['H28'], $res['I28']);

      // Point loads: ULS P4------------------------------------/////
      $res['C29'] = isset($req['C21']) ? $req['C21'] * 1.35 : throw new \ErrorException("error");
      $res['D29'] = isset($req['C21']) && isset($req['D21']) ? $req['C21'] * 1.2 + 1.5 * $req['D21'] : throw new \ErrorException("error");
      $res['E29'] = isset($req['D21']) && isset($req['E21']) && isset($req['C21']) ? $req['D21'] * 1.2 + 1.5 * $req['C11'] * $req['E21'] : throw new \ErrorException("error");
      $res['F29'] = isset($req['C21']) && isset($req['E21']) && isset($req['D21']) && isset($req['C21']) ? 1.2 * $req['C21'] + $req['C12'] * $req['D21'] + $req['E21'] : throw new \ErrorException("error");
      $res['G29'] = isset($req['C21']) && isset($req['E21']) ? 0.9 * $req['C21'] + $req['E21'] : throw new \ErrorException("error");
      $res['H29'] = isset($req['C21']) && isset($req['F21']) && isset($req['D21']) && isset($req['C13']) ? $req['C21'] + $req['C13'] * $req['D21'] + $req['F21'] : throw new \ErrorException("error");
      $res['I29'] = isset($req['C21']) && isset($req['G21']) && isset($req['D21']) && isset($req['C12']) ? 1.2 * $req['C21'] + $req['C12'] * $req['D21'] + $req['G21'] : throw new \ErrorException("error");
      $res['J29'] = max($res['C29'], $res['D29'], $res['E29'], $res['F29'], $res['G29'], $res['H29'], $res['I29']);

      // Point loads: SLS ------------------------------------/////
      $res['C33'] = isset($req['C18']) && isset($req['C11']) && isset($req['D18']) ? $req['C18'] + $req['C11'] * $req['D18'] : throw new \ErrorException("error");
      $res['C34'] = isset($req['C19']) && isset($req['C11']) && isset($req['D19']) ? $req['C19'] + $req['C11'] * $req['D19'] : throw new \ErrorException("error");
      $res['C35'] = isset($req['C20']) && isset($req['C11']) && isset($req['D20']) ? $req['C20'] + $req['C11'] * $req['D20'] : throw new \ErrorException("error");
      $res['C36'] = isset($req['C21']) && isset($req['C11']) && isset($req['D21']) ? $req['C21'] + $req['C11'] * $req['D21'] : throw new \ErrorException("error");

      // Distributed loads: ULS ------------------------------------/////
      $res['C47'] = isset($req['C41']) ? $req['C41'] * 1.35 : throw new \ErrorException("error");
      $res['D47'] = isset($req['C41']) && isset($req['D41']) ? $req['C41'] * 1.2 + 1.5 * $req['D41'] : throw new \ErrorException("error");
      $res['E47'] = isset($req['D41']) && isset($req['E41']) && isset($req['C11']) ? $req['D41'] * 1.2 + 1.5 * $req['C11'] * $req['E41'] : throw new \ErrorException("error");
      $res['F47'] = isset($req['C41']) && isset($req['E41']) && isset($req['D41']) && isset($req['C12']) ? 1.2 * $req['C41'] + $req['C12'] * $req['D41'] + $req['E41'] : throw new \ErrorException("error");
      $res['G47'] = isset($req['C41']) && isset($req['E41']) ? 0.9 * $req['C41'] + $req['E41'] : throw new \ErrorException("error");
      $res['H47'] = isset($req['C41']) && isset($req['F41']) && isset($req['D41']) && isset($req['C13']) ? $req['C41'] + $req['C13'] * $req['D41'] + $req['F41'] : throw new \ErrorException("error");
      $res['I47'] = isset($req['C41']) && isset($req['G41']) && isset($req['D41']) && isset($req['C12']) ? 1.2 * $req['C41'] + $req['C12'] * $req['D41'] + $req['G41'] : throw new \ErrorException("error");
      $res['J47'] = max($res['C26'], $res['D26'], $res['E26'], $res['F26'], $res['G26'], $res['H26'], $res['I26']);

      // Distributed loads: SLS ------------------------------------/////
      $res['C52'] = isset($req['C41']) && isset($req['C11']) && isset($req['D41']) ? $req['C41'] + $req['C11'] * $req['D41'] : throw new \ErrorException("error");

      // Point loads2.1 ------------------------------------/////
      $res['C14any'] = $res['J26'];
      $res['C15any'] = $res['J27'];
      $res['C16any'] = $res['J28'];
      $res['C17any'] = $res['J29'];
      $res['D14any'] = $res['C33'];
      $res['D15any'] = $res['C34'];
      $res['D16any'] = $res['C35'];
      $res['D17any'] = $res['C36'];

      $res['F14any'] = isset($req['E14any']) && isset($req['C7any'])
        ? ($req['E14any'] == 0 ? 0 : $req['C7any'] - $req['E14any'])
        : throw new \ErrorException("error");
      $res['F15any'] = isset($req['E15any']) && isset($req['C7any'])
        ? ($req['E15any'] == 0 ? 0 : $req['C7any'] - $req['E15any'])
        : throw new \ErrorException("error");
      $res['F16any'] = isset($req['E16any']) && isset($req['C7any'])
        ? ($req['E16any'] == 0 ? 0 : $req['C7any'] - $req['E16any'])
        : throw new \ErrorException("error");
      $res['F17any'] = isset($req['E17any']) && isset($req['C7any'])
        ? ($req['E17any'] == 0 ? 0 : $req['C7any'] - $req['E17any'])
        : throw new \ErrorException("error");

      // Distributed loads 2.2 ------------------------------------/////
      $res['D21any'] = $res['J47'];
      $res['D22any'] = $res['C52'];
      // distance
      for ($i = 6; $i <= 106; $i++) {
        $pAny["P{$i}any"] = (string) $value; // เก็บค่าเป็น string
        $value++; // เพิ่มค่าทีละ 1
      }
      $res["Q6any"] = '0';
      $res["Q7any"] = $req['C7any'] / 100;
      // Distributed Loads P0
      $res["J7any"] = $req['C7any'] * 1000;
      for ($i = 8; $i <= 106; $i++) {
        $res["Q{$i}any"] = round($res["Q7any"] * $pAny["P{$i}any"], 1);

      }
      for ($i = 6; $i <= 106; $i++) {
        $rAny["R{$i}any"] = $res["Q{$i}any"] * 1000; // เก็บค่าเป็น string

      }
      //M ULS p0
      for ($i = 6; $i <= 106; $i++) {
        $acAny["AC{$i}any"] = -((3 * $res['D21any'] * $req["C7any"] / 8) * ($req["C7any"] - $res["Q{$i}any"])
          - ($res['D21any'] * pow($req["C7any"] - $res["Q{$i}any"], 2) / 2));

      }
      //V ULS p0
      for ($i = 6; $i <= 106; $i++) {
        $adAny["AD{$i}any"] = -((-3 * $res['D21any'] * $req["C7any"] / 8) + $res['D21any'] * ($req["C7any"] - $res["Q{$i}any"]));

      }
      //D ULS p0
      for ($i = 6; $i <= 106; $i++) {
        $aeAny["AE{$i}any"] =
          -(
            $res['D21any'] * ($res['J7any'] - $rAny["R{$i}any"]) *
            (pow($res['J7any'], 3) - 3 * $res['J7any'] * pow($res['J7any'] - $rAny["R{$i}any"], 2) + 2 * pow($res['J7any'] - $rAny["R{$i}any"], 3))
          ) / (48 * $req['C8any'] * $req['C9any']);

      }
      //M SLS p0
      for ($i = 6; $i <= 106; $i++) {
        $agAny["AG{$i}any"] = ($res['D21any'] == 0) ? 0 : $acAny["AC{$i}any"] * $res['D22any'] / $res['D21any'];

      }
      //V SLS p0
      for ($i = 6; $i <= 106; $i++) {
        $ahAny["AH{$i}any"] = ($res['D21any'] == 0) ? 0 : $adAny["AD{$i}any"] * $res['D22any'] / $res['D21any'];

      }
      //D SLS p0
      for ($i = 6; $i <= 106; $i++) {
        $aiAny["AI{$i}any"] = ($res['D21any'] == 0) ? 0 : $aeAny["AE{$i}any"] * $res['D22any'] / $res['D21any'];

      }

      // Distributed Loads P1
      $i14Any['I14any'] = $res['F14any'] * 1000;
      $i15Any['I15any'] = $res['F15any'] * 1000;
      $i16Any['I16any'] = $res['F16any'] * 1000;
      $i17Any['I17any'] = $res['F17any'] * 1000;
      //M ULS
      for ($i = 6; $i <= 106; $i++) {
        $anAny["AN{$i}any"] = -(
          ($res["Q{$i}any"] <= $req['E14any']) ?
          (
            (-$res['C14any'] * $res['F14any'] * (pow($req['C7any'], 2) - pow($res['F14any'], 2)) / (2 * pow($req['C7any'], 2))) +
            ($res['C14any'] - ($res['C14any'] * pow($req['E14any'], 2)) * ($res['F14any'] + 2 * $req['C7any']) / (2 * pow($req['C7any'], 3))) * $res["Q{$i}any"]
          ) :
          (
            (-$res['C14any'] * $res['F14any'] * (pow($req['C7any'], 2) - pow($res['F14any'], 2)) / (2 * pow($req['C7any'], 2))) +
            ($res['C14any'] - ($res['C14any'] * pow($req['E14any'], 2)) * ($res['F14any'] + 2 * $req['C7any']) / (2 * pow($req['C7any'], 3))) * $res["Q{$i}any"] -
            $res['C14any'] * ($res["Q{$i}any"] - $req['E14any'])
          )
        );

      }

      //V
      for ($i = 6; $i <= 106; $i++) {
        $aoAny["AO{$i}any"] = ($res["Q{$i}any"] <= $req['E14any'])
          ? -($res['C14any'] - $res['C14any'] * pow($req['E14any'], 2) * ($res['F14any'] + 2 * $req['C7any']) / (2 * pow($req['C7any'], 3)))
          : ($res['C14any'] * pow($req['E14any'], 2) * ($res['F14any'] + 2 * $req['C7any']) / (2 * pow($req['C7any'], 3)));

      }

      //D
      for ($i = 6; $i <= 106; $i++) {
        $apAny["AP{$i}any"] =
          (($res['J7any'] - $rAny["R{$i}any"]) <= $i14Any['I14any'])
          ? (
            (
              ($res['C14any'] * $i14Any['I14any'] * pow($rAny["R{$i}any"], 2) *
                (2 * $res['J7any'] * pow($i14Any['I14any'], 2) - 3 * pow($res['J7any'], 2) * ($res['J7any'] - $rAny["R{$i}any"]) + pow($i14Any['I14any'], 2) * ($res['J7any'] - $rAny["R{$i}any"])))
              / (12 * pow($res['J7any'], 3) * $req['C8any'] * $req['C9any'])
            ) + (
              -$res['C14any'] * pow(($i14Any['I14any'] - ($res['J7any'] - $rAny["R{$i}any"])), 3)
              / (6 * $req['C8any'] * $req['C9any'])
            )
          ) : (
            (
              $res['C14any'] * $i14Any['I14any'] * pow($rAny["R{$i}any"], 2) *
              (2 * $res['J7any'] * pow($i14Any['I14any'], 2) - 3 * pow($res['J7any'], 2) * ($res['J7any'] - $rAny["R{$i}any"]) + pow($i14Any['I14any'], 2) * ($res['J7any'] - $rAny["R{$i}any"]))
            ) / (12 * pow($res['J7any'], 3) * $req['C8any'] * $req['C9any'])
          );

        // คูณ 1000 หลังจากคำนวณเสร็จ
        $apAny["AP{$i}any"] *= 1000;
      }

      // Distributed Loads P2

      //M ULS
      for ($i = 6; $i <= 106; $i++) {
        $arAny["AR{$i}any"] = -(
          ($res["Q{$i}any"] <= $req["E15any"])
          ? (
            ((-$res["C15any"] * $res["F15any"] * (pow($req["C7any"], 2) - pow($res["F15any"], 2)) / (2 * pow($req["C7any"], 2))) +
              ($res["C15any"] - ($res["C15any"] * pow($req["E15any"], 2)) * ($res["F15any"] + 2 * $req["C7any"]) / (2 * pow($req["C7any"], 3))) * $res["Q{$i}any"])
          ) : (
            ((-$res["C15any"] * $res["F15any"] * (pow($req["C7any"], 2) - pow($res["F15any"], 2)) / (2 * pow($req["C7any"], 2))) +
              ($res["C15any"] - ($res["C15any"] * pow($req["E15any"], 2)) * ($res["F15any"] + 2 * $req["C7any"]) / (2 * pow($req["C7any"], 3))) * $res["Q{$i}any"]) -
            $res["C15any"] * ($res["Q{$i}any"] - $req["E15any"])
          )
        );

      }
      //V ULS
      for ($i = 6; $i <= 106; $i++) {
        $asAny["AS{$i}any"] = ($res["Q{$i}any"] <= $req["E15any"])
          ? -($res["C15any"] - ($res["C15any"] * pow($req["E15any"], 2) * ($res["F15any"] + 2 * $req["C7any"]) / (2 * pow($req["C7any"], 3))))
          : ($res["C15any"] * pow($req["E15any"], 2) * ($res["F15any"] + 2 * $req["C7any"]) / (2 * pow($req["C7any"], 3)));

      }
      //d ULS
      for ($i = 6; $i <= 106; $i++) {
        $atAny["AT{$i}any"] =
          (($res['J7any'] - $rAny["R{$i}any"]) <= $i15Any['I15any'])
          ? (
            (($res['C15any'] * $i15Any['I15any'] * pow($rAny["R{$i}any"], 2) *
              (2 * $res['J7any'] * pow($i15Any['I15any'], 2) - 3 * pow($res['J7any'], 2) * ($res['J7any'] - $rAny["R{$i}any"]) + pow($i15Any['I15any'], 2) * ($res['J7any'] - $rAny["R{$i}any"])))
              / (12 * pow($res['J7any'], 3) * $req['C8any'] * $req['C9any'])) +
            (-$res['C15any'] * pow($i15Any['I15any'] - ($res['J7any'] - $rAny["R{$i}any"]), 3)
              / (6 * $req['C8any'] * $req['C9any']))
          ) : (
            ($res['C15any'] * $i15Any['I15any'] * pow($rAny["R{$i}any"], 2) *
              (2 * $res['J7any'] * pow($i15Any['I15any'], 2) - 3 * pow($res['J7any'], 2) * ($res['J7any'] - $rAny["R{$i}any"]) + pow($i15Any['I15any'], 2) * ($res['J7any'] - $rAny["R{$i}any"])))
            / (12 * pow($res['J7any'], 3) * $req['C8any'] * $req['C9any'])
          );
        $atAny["AT{$i}any"] *= 1000;
      }

      // Distributed Loads P3
      //M ULS
      for ($i = 6; $i <= 106; $i++) {
        $avAny["AV{$i}any"] =
          -(($res["Q{$i}any"] <= $req['E16any'])
            ? (
              (-$res['C16any'] * $res['F16any'] * (pow($req['C7any'], 2) - pow($res['F16any'], 2)) / (2 * pow($req['C7any'], 2))) +
              ($res['C16any'] - ($res['C16any'] * pow($req['E16any'], 2) * ($res['F16any'] + 2 * $req['C7any']) / (2 * pow($req['C7any'], 3)))) * $res["Q{$i}any"]
            ) : (
              (-$res['C16any'] * $res['F16any'] * (pow($req['C7any'], 2) - pow($res['F16any'], 2)) / (2 * pow($req['C7any'], 2))) +
              ($res['C16any'] - ($res['C16any'] * pow($req['E16any'], 2) * ($res['F16any'] + 2 * $req['C7any']) / (2 * pow($req['C7any'], 3)))) * $res["Q{$i}any"] -
              $res['C16any'] * ($res["Q{$i}any"] - $req['E16any'])
            ));
      }
      //V ULS
      for ($i = 6; $i <= 106; $i++) {
        $awAny["AW{$i}any"] =
          ($res["Q{$i}any"] <= $req['E16any'])
          ? -($res['C16any'] - ($res['C16any'] * pow($req['E16any'], 2) * ($res['F16any'] + 2 * $req['C7any']) / (2 * pow($req['C7any'], 3))))
          : ($res['C16any'] * pow($req['E16any'], 2) * ($res['F16any'] + 2 * $req['C7any']) / (2 * pow($req['C7any'], 3)));
      }
      //D ULS
      for ($i = 6; $i <= 106; $i++) {
        $axAny["AX{$i}any"] =
          (($res['J7any'] - $rAny["R{$i}any"]) <= $i16Any['I16any'])
          ? (
            (
              ($res['C16any'] * $i16Any['I16any'] * pow($rAny["R{$i}any"], 2) *
                (2 * $res['J7any'] * pow($i16Any['I16any'], 2) - 3 * pow($res['J7any'], 2) * ($res['J7any'] - $rAny["R{$i}any"]) + pow($i16Any['I16any'], 2) * ($res['J7any'] - $rAny["R{$i}any"])))
              / (12 * pow($res['J7any'], 3) * $req['C8any'] * $req['C9any'])
            ) + (
              -$res['C16any'] * pow(($i16Any['I16any'] - ($res['J7any'] - $rAny["R{$i}any"])), 3)
              / (6 * $req['C8any'] * $req['C9any'])
            )
          ) : (
            ($res['C16any'] * $i16Any['I16any'] * pow($rAny["R{$i}any"], 2) *
              (2 * $res['J7any'] * pow($i16Any['I16any'], 2) - 3 * pow($res['J7any'], 2) * ($res['J7any'] - $rAny["R{$i}any"]) + pow($i16Any['I16any'], 2) * ($res['J7any'] - $rAny["R{$i}any"])))
            / (12 * pow($res['J7any'], 3) * $req['C8any'] * $req['C9any'])
          );

        $axAny["AX{$i}any"] *= 1000;
      }
      // Distributed Loads P4
      //M ULS
      for ($i = 6; $i <= 106; $i++) {
        $azAny["AZ{$i}any"] =
          -(
            ($res["Q{$i}any"] <= $req['E17any'])
            ? (
              (-$res['C17any'] * $res['F17any'] * ($req['C7any'] ** 2 - $res['F17any'] ** 2) / (2 * $req['C7any'] ** 2)) +
              ($res['C17any'] - ($res['C17any'] * $req['E17any'] ** 2 * ($res['F17any'] + 2 * $req['C7any']) / (2 * $req['C7any'] ** 3))) * $res["Q{$i}any"]
            ) : (
              (-$res['C17any'] * $res['F17any'] * ($req['C7any'] ** 2 - $res['F17any'] ** 2) / (2 * $req['C7any'] ** 2)) +
              ($res['C17any'] - ($res['C17any'] * $req['E17any'] ** 2 * ($res['F17any'] + 2 * $req['C7any']) / (2 * $req['C7any'] ** 3))) * $res["Q{$i}any"] -
              $res['C17any'] * ($res["Q{$i}any"] - $req['E17any'])
            )
          );
      }
      //V ULS
      for ($i = 6; $i <= 106; $i++) {
        $baAny["BA{$i}any"] =
          ($res["Q{$i}any"] <= $req['E17any'])
          ? -($res['C17any'] - $res['C17any'] * pow($req['E17any'], 2) * ($res['F17any'] + 2 * $req['C7any']) / (2 * pow($req['C7any'], 3)))
          : $res['C17any'] * pow($req['E17any'], 2) * ($res['F17any'] + 2 * $req['C7any']) / (2 * pow($req['C7any'], 3));
      }

      //D ULS
      for ($i = 6; $i <= 106; $i++) {
        $bbAny["BB{$i}any"] =
          (($res['J7any'] - $rAny["R{$i}any"]) <= $i17Any['I17any'])
          ? (
            (
              ($res['C17any'] * $i17Any['I17any'] * pow($rAny["R{$i}any"], 2) *
                (2 * $res['J7any'] * pow($i17Any['I17any'], 2) - 3 * pow($res['J7any'], 2) * ($res['J7any'] - $rAny["R{$i}any"]) + pow($i17Any['I17any'], 2) * ($res['J7any'] - $rAny["R{$i}any"])))
              / (12 * pow($res['J7any'], 3) * $req['C8any'] * $req['C9any'])
            ) + (
              -$res['C17any'] * pow(($i17Any['I17any'] - ($res['J7any'] - $rAny["R{$i}any"])), 3)
              / (6 * $req['C8any'] * $req['C9any'])
            )
          ) : (
            ($res['C17any'] * $i17Any['I17any'] * pow($rAny["R{$i}any"], 2) *
              (2 * $res['J7any'] * pow($i17Any['I17any'], 2) - 3 * pow($res['J7any'], 2) * ($res['J7any'] - $rAny["R{$i}any"]) + pow($i17Any['I17any'], 2) * ($res['J7any'] - $rAny["R{$i}any"])))
            / (12 * pow($res['J7any'], 3) * $req['C8any'] * $req['C9any'])
          );
        $bbAny["BB{$i}any"] *= 1000;
      }
      // Distributed Loads total
      //M total
      for ($i = 6; $i <= 106; $i++) {
        $bdAny["BD{$i}any"] = $anAny["AN{$i}any"] + $arAny["AR{$i}any"] + $avAny["AV{$i}any"] + $azAny["AZ{$i}any"];
      }

      //V total
      for ($i = 6; $i <= 106; $i++) {
        $beAny["BE{$i}any"] = $aoAny["AO{$i}any"] + $asAny["AS{$i}any"] + $awAny["AW{$i}any"] + $baAny["BA{$i}any"];
      }

      //D total
      for ($i = 6; $i <= 106; $i++) {
        $bfAny["BF{$i}any"] = $apAny["AP{$i}any"] + $atAny["AT{$i}any"] + $axAny["AX{$i}any"] + $bbAny["BB{$i}any"];
      }

      // Distributed Loads SLS P1
      //M
      for ($i = 6; $i <= 106; $i++) {
        $biAny["BI{$i}any"] = ($res['C14any'] == 0) ? 0 : ($res['D14any'] / $res['C14any']) * $anAny["AN{$i}any"];
      }
      //V
      for ($i = 6; $i <= 106; $i++) {
        $bjAny["BJ{$i}any"] = ($res['C14any'] == 0) ? 0 : ($res['D14any'] / $res['C14any']) * $aoAny["AO{$i}any"];
      }

      //D
      for ($i = 6; $i <= 106; $i++) {
        $bkAny["BK{$i}any"] = ($res['C14any'] == 0) ? 0 : ($res['D14any'] / $res['C14any']) * $apAny["AP{$i}any"];
      }

      // Distributed Loads SLS P2
      //M 
      for ($i = 6; $i <= 106; $i++) {
        $bmAny["BM{$i}any"] = ($res['C15any'] == 0) ? 0 : ($res['D15any'] / $res['C15any']) * $arAny["AR{$i}any"];
      }
      //V 
      for ($i = 6; $i <= 106; $i++) {
        $bnAny["BN{$i}any"] = ($res['C15any'] == 0) ? 0 : ($res['D15any'] / $res['C15any']) * $asAny["AS{$i}any"];
      }
      //D
      for ($i = 6; $i <= 106; $i++) {
        $boAny["BO{$i}any"] = ($res['C15any'] == 0) ? 0 : ($res['D15any'] / $res['C15any']) * $atAny["AT{$i}any"];
      }

      // Distributed Loads SLS P3
      //M 
      for ($i = 6; $i <= 106; $i++) {
        $bqAny["BQ{$i}any"] = ($res['C16any'] == 0) ? 0 : ($res['D16any'] / $res['C16any']) * $avAny["AV{$i}any"];
      }
      //V 
      for ($i = 6; $i <= 106; $i++) {
        $brAny["BR{$i}any"] = ($res['C16any'] == 0) ? 0 : ($res['D16any'] / $res['C16any']) * $awAny["AW{$i}any"];
      }
      //D 
      for ($i = 6; $i <= 106; $i++) {
        $bsAny["BS{$i}any"] = ($res['C16any'] == 0) ? 0 : ($res['D16any'] / $res['C16any']) * $axAny["AX{$i}any"];
      }

      // Distributed Loads SLS P4
      //M 
      for ($i = 6; $i <= 106; $i++) {
        $buAny["BU{$i}any"] = ($res['C17any'] == 0) ? 0 : ($res['D17any'] / $res['C17any']) * $azAny["AZ{$i}any"];
      }
      //V
      for ($i = 6; $i <= 106; $i++) {
        $bvAny["BV{$i}any"] = ($res['C17any'] == 0) ? 0 : ($res['D17any'] / $res['C17any']) * $baAny["BA{$i}any"];
      }
      //D 
      for ($i = 6; $i <= 106; $i++) {
        $bwAny["BW{$i}any"] = ($res['C17any'] == 0) ? 0 : ($res['D17any'] / $res['C17any']) * $bbAny["BB{$i}any"];
      }

      // Distributed Loads SLS total
      for ($i = 6; $i <= 106; $i++) {
        $byAny["BY{$i}any"] = $biAny["BI{$i}any"] + $bmAny["BM{$i}any"] + $bqAny["BQ{$i}any"] + $buAny["BU{$i}any"];
      }
      for ($i = 6; $i <= 106; $i++) {
        $bzAny["BZ{$i}any"] = $bjAny["BJ{$i}any"] + $bnAny["BN{$i}any"] + $brAny["BR{$i}any"] + $bvAny["BV{$i}any"];
      }
      for ($i = 6; $i <= 106; $i++) {
        $caAny["CA{$i}any"] = $bkAny["BK{$i}any"] + $boAny["BO{$i}any"] + $bsAny["BS{$i}any"] + $bwAny["BW{$i}any"];
      }

      //ULS Demands

      for ($i = 6; $i <= 106; $i++) {
        $res["T{$i}any"] = $acAny["AC{$i}any"] + $bdAny["BD{$i}any"];
      }

      for ($i = 6; $i <= 106; $i++) {
        $res["U{$i}any"] = $adAny["AD{$i}any"] + $beAny["BE{$i}any"];
      }

      for ($i = 6; $i <= 106; $i++) {
        $res["V{$i}any"] = $aeAny["AE{$i}any"] + $bfAny["BF{$i}any"];
      }
      //SLS Demands

      for ($i = 6; $i <= 106; $i++) {
        $res["X{$i}any"] = $agAny["AG{$i}any"] + $byAny["BY{$i}any"];
      }

      for ($i = 6; $i <= 106; $i++) {
        $res["Y{$i}any"] = $ahAny["AH{$i}any"] + $bzAny["BZ{$i}any"];
      }

      for ($i = 6; $i <= 106; $i++) {
        $res["Z{$i}any"] = $aiAny["AI{$i}any"] + $caAny["CA{$i}any"];
      }
      /////cal


      $res["L25"] = null; // Initialize variable to hold min value
      for ($i = 6; $i <= 106; $i++) {
        $currentValue = $res["T{$i}any"]; // Get the value for Tany at index $i
        if ($res["L25"] === null || $currentValue < $res["L25"]) {
          $res["L25"] = $currentValue; // Update min value
        }
      }
      // Round the result to 1 decimal place and multiply by -1
      $res["L25"] = round($res["L25"], 1) * -1;


      $res["L26"] = null; // Initialize variable to hold max value
      for ($i = 6; $i <= 106; $i++) {
        $currentValue = $res["T{$i}any"]; // Get the value for Tany at index $i
        if ($res["L26"] === null || $currentValue > $res["L26"]) {
          $res["L26"] = $currentValue; // Update max value
        }
      }
      // Round the result to 1 decimal place and multiply by -1
      $res["L26"] = round($res["L26"], 1) * -1;


      $res["M25"] = null; // Initialize variable to hold min value
      for ($i = 6; $i <= 106; $i++) {
        $currentValue = $res["X{$i}any"]; // Get the value for Xany at index $i
        if ($res["M25"] === null || $currentValue < $res["M25"]) {
          $res["M25"] = $currentValue; // Update min value
        }
      }
      // Round the result to 1 decimal place and multiply by -1
      $res["M25"] = round($res["M25"], 1) * -1;


      $res["M26"] = null; // Initialize variable to hold max value
      for ($i = 6; $i <= 106; $i++) {
        $currentValue = $res["X{$i}any"]; // Get the value for Xany at index $i
        if ($res["M26"] === null || $currentValue > $res["M26"]) {
          $res["M26"] = $currentValue; // Update max value
        }
      }
      // Round the result to 1 decimal place and multiply by -1
      $res["M26"] = round($res["M26"], 1) * -1;


      // Assigning specific values to cells and multiply by -1
      $res["L27"] = round($res["T6any"], 1) * -1;
      $res["L28"] = round($res["T31any"], 1) * -1;
      $res["L29"] = round($res["T56any"], 1) * -1;
      $res["M27"] = round($res["X6any"], 1) * -1;
      $res["M28"] = round($res["X31any"], 1) * -1;
      $res["M29"] = round($res["X56any"], 1) * -1;
      $res["M30"] = round($res["X81any"], 1) * -1;
      $res["L30"] = round($res["T81any"], 1) * -1;




      $res["L37"] = null; // Initialize variable to hold max value
      for ($i = 6; $i <= 106; $i++) {
        $currentValue = $res["U{$i}any"]; // Get the value for Xany at index $i
        if ($res["L37"] === null || $currentValue > $res["L37"]) {
          $res["L37"] = $currentValue; // Update max value
        }
      }
      // Round the result to 1 decimal place and multiply by -1
      $res["L37"] = round($res["L37"], 1);



      $res["L38"] = null; // Initialize variable to hold max value
      for ($i = 6; $i <= 106; $i++) {
        $currentValue = $res["U{$i}any"]; // Get the value for Xany at index $i
        if ($res["L38"] === null || $currentValue < $res["L38"]) {
          $res["L38"] = $currentValue; // Update max value
        }
      }

      // Round the result to 1 decimal place and multiply by -1
      $res["L38"] = round($res["L38"], 1);


      $res["M37"] = null; // Initialize variable to hold max value
      for ($i = 6; $i <= 106; $i++) {
        $currentValue = $res["Y{$i}any"]; // Get the value for Xany at index $i
        if ($res["M37"] === null || $currentValue > $res["M37"]) {
          $res["M37"] = $currentValue; // Update max value
        }
      }
      // Round the result to 1 decimal place and multiply by -1
      $res["M37"] = round($res["M37"], 1);


      $res["M38"] = null; // Initialize variable to hold max value
      for ($i = 6; $i <= 106; $i++) {
        $currentValue = $res["Y{$i}any"]; // Get the value for Xany at index $i
        if ($res["M38"] === null || $currentValue < $res["M38"]) {
          $res["M38"] = $currentValue; // Update max value
        }
      }
      // Round the result to 1 decimal place and multiply by -1
      $res["M38"] = round($res["M38"], 1);

      // คำนวณค่า absolute และเก็บลงใน L39 และ L40, พร้อมปัดทศนิยม 1 ตำแหน่ง
      $res["L39"] = round(abs($res["U6any"]), 1);
      $res["L40"] = round(abs($res["U106any"]), 1);

      // คัดลอกค่าใน Y6any และ Y106any ไปเก็บใน M39 และ M40, พร้อมปัดทศนิยม 1 ตำแหน่ง
      $res["M39"] = round($res["Y6any"], 1);
      $res["M40"] = round($res["Y106any"], 1);

      $res["L51"] = null; // Initialize variable to hold max value
      for ($i = 6; $i <= 106; $i++) {
        $currentValue = $res["V{$i}any"]; // Get the value for Xany at index $i
        if ($res["L51"] === null || $currentValue < $res["L51"]) {
          $res["L51"] = $currentValue; // Update max value
        }
      }
      // Round the result to 1 decimal place and multiply by -1
      $res["L51"] = round($res["L51"], 1) * -1;

      $res["M51"] = null; // Initialize variable to hold max value
      for ($i = 6; $i <= 106; $i++) {
        $currentValue = $res["Z{$i}any"]; // Get the value for Xany at index $i
        if ($res["M51"] === null || $currentValue < $res["M51"]) {
          $res["M51"] = $currentValue; // Update max value
        }
      }
      // Round the result to 1 decimal place and multiply by -1
      $res["M51"] = round($res["M51"], 1) * -1;

      $keys = [
        "C47",
        "D47",
        "E47",
        "F47",
        "G47",
        "H47",
        "I47",
        "J47",
        "C26",
        "D26",
        "E26",
        "F26",
        "G26",
        "H26",
        "I26",
        "J26",
        "C27",
        "D27",
        "E27",
        "F27",
        "G27",
        "H27",
        "I27",
        "J27",
        "C28",
        "D28",
        "E28",
        "F28",
        "G28",
        "H28",
        "I28",
        "J28",
        "C29",
        "D29",
        "E29",
        "F29",
        "G29",
        "H29",
        "I29",
        "J29"
      ];

      // Loop through and round each value to 2 decimal places
      foreach ($keys as $key) {
        if (isset($res[$key])) {
          $res[$key] = round($res[$key], 2);
        }
      }

      // Pass data to view (or JSON response if needed)
      return $this->response->setJSON($res);
    } catch (\ErrorException $e) {
      return $this->response->setStatusCode(400, $e->getMessage());
    }
  }

  public function import()
  {
    $file = $this->request->getFile('file');

    if (!$file || !$file->isValid() || $file->hasMoved()) {
      return $this->response->setJSON(['success' => false, 'message' => 'No file was uploaded.']);
    }

    $reader = new Reader();
    $sheet = $reader->load($file->getTempName());
    $worksheet = $sheet->getActiveSheet();

    $fields = ['C10', 'C11', 'C12', 'C13'];

    $rangeFields = [
      $worksheet->rangeToArray('C18:G21', null, true, true, true),
      $worksheet->rangeToArray('C41:G41', null, true, true, true),

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
    // Implement import functionality here
  }

  public function export()
  {
    $req = $this->request->getJSON(true);
        $model = new ProppedCantileverBeam();
        $exportResult = $this->defaultExportInterface($model->getFromProperties(), $req, "propped-cantilever-beam-report");
        return $this->response->setJSON($exportResult);
  }
}
