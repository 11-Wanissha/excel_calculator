<?php

namespace App\Controllers;

use App\Models\TimberBeam;
use Exception;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader;

class TimberBeamController extends BaseController
{
  public function renderer()
  {
    $model = new TimberBeam();

    return view('pages/timber_beam', [
      "formProperties" => $model->getFromProperties(),
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

    $res['H46'] = $req['I34'] == "No" ? $beamType->E / 1000000 : ($req['I34'] == "Yes" ? $beamType->EW / 1000000 : "");

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
        $res[$key] = number_format((float) $val, 3, '.', '');
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

    $reader = new Reader();
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

  public function export()
  {
    try {
      $req = $this->request->getJSON(true);
      $model = new TimberBeam();
      $title = isset($req['C8']) ? $req['C8'] : '';
      $exportResult = $this->defaultExportInterface($model->getFromProperties(), $req, "timber-beam-report{$title}");

      return $this->response->setJSON($exportResult);
    } catch (Exception $e) {
      return $this->response->setStatusCode(400)->setJSON(['error' => $e->getMessage()]);
    }
  }
}
