<?php

namespace App\Controllers;

use App\Models\PoleRetainingWallDesign;
use Exception;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader;


class PoleRetainingWallDesignController extends BaseController
{
    public function __construct()
    {
        $this->model = new PoleRetainingWallDesign();
    }

    public function renderer()
    {

        return view('pages/pole_retaining_wall', [
            'formProperties' => $this->model->getFormProperties()
        ]);
    }

    public function calculator()
    {   
        try {
            $req = $this->request->getPost();
            $validate = $this->model->validateRequiredFields($req);

            if (!$validate['isValid']) {
                throw new Exception($validate['error']);
            }

            $res = $req;

            foreach ($req as $key => $val) {
                if (empty($val) || $val == "") {
                    $req[$key] = 0;
                }
            }

            // $res['H47'] = $req
            $res['J33'] = $res['B13'] == 0 ? 0 : ($res['B13'] <= 5 ? 0 : $res['B33'] * tan($res['B33'] * pi() / 180));
            $res['F35'] = $res['B10'] + $res['B14'] + $res['J33'];
            $res['B42'] = $res['B39'] * $res['B41'] * $res['B40'];
            $res['G41'] = rad2deg(atan($res['B42']));

            $res['H45'] = pow(
                (1 + sqrt(
                    (sin(deg2rad($res['H24'] + $res['G40'])) *
                        sin(deg2rad($res['H24'] - $res['G41'] - $res['B12']))) /
                        (cos(deg2rad($res['G40'] + $res['G39'] + $res['G41'])) *
                            cos(deg2rad($res['B12'] - $res['G39'])))
                )),
                2
            );
            $res['H46'] = pow(cos(deg2rad($res['H24'] - $res['G41'] - $res['G39'])), 2) /
                (cos(deg2rad($res['G41'])) *
                    pow(cos(deg2rad($res['G39'])), 2) *
                    cos(deg2rad($res['G39'] + $res['G40'] + $res['G41'])) *
                    $res['H45']);
            $res['H47'] = cos(deg2rad($res['G40'] + $res['G39'])) * $res['H46'];

            $res['B52'] = $res['B27'] * (
                0.5 * $res['B26'] * $res['B15'] * pow(($res['F35'] - $res['B16'] + $res['B19']), 2) +
                $res['B20'] / 6 * pow(($res['F35'] + $res['B19']), 3)
            );
            $res['H52'] = $res['H47'] * (
                0.5 * $res['H26'] * $res['B15'] * pow(($res['F35'] - $res['B16'] + $res['B19']), 2) +
                $res['B20'] / 6 * pow(($res['F35'] + $res['B19']), 3)
            );
            $res['B56'] = $res['B28'] * $res['B20'] * pow($res['B19'], 3) / 6;
            $res['H56'] = $res['H28'] * $res['B20'] * pow($res['B19'], 3) / 6 +
                $res['H25'] * pow($res['B19'], 2);

            $res['C59'] = $res['B56'] / $res['B52'];
            $res['I59'] = $res['B56'] / $res['B52'];

            $res['F61'] = ($res['B19'] * 1.2) + $res['B14'] + $res['J33'];

            $res['B75'] = $res['B27'] * (
                $res['B26'] * $res['B15'] * ($res['F35'] - $res['B16'] + $res['B72']) +
                0.5 * $res['B20'] * pow(($res['F35'] + $res['B72']), 2)
            ) - $res['B28'] * 0.5 * $res['B20'] * pow($res['B72'], 2);
            $res['H75'] = $res['H47'] * (
                $res['H26'] * $res['B15'] * ($res['F35'] - $res['B16'] + $res['H72']) +
                0.5 * $res['B20'] * pow(($res['F35'] + $res['H72']), 2)
            ) - (
                $res['H28'] * 0.5 * $res['B20'] * pow($res['H72'], 2) +
                2 * $res['H25'] * $res['H72']
            );

            $res['B80'] = $res['B29'] * (
                $res['B27'] * (
                    0.5 * $res['B26'] * $res['B15'] * pow(($res['F35'] - $res['B16'] + $res['B72']), 2) +
                    $res['B20'] * pow(($res['F35'] + $res['B72']), 3) / 6
                ) -
                $res['B28'] * $res['B20'] * pow($res['B72'], 3) / 6
            ) * $res['B11'];
            $res['H80'] = $res['H29'] * (
                $res['H47'] * (
                    0.5 * $res['H26'] * $res['B15'] * pow(($res['F35'] - $res['B16'] + $res['H72']), 2) +
                    $res['B20'] * pow(($res['F35'] + $res['H72']), 3) / 6
                ) - (
                    $res['H28'] * $res['B20'] * pow($res['H72'], 3) / 6 +
                    $res['H25'] * pow($res['H72'], 2)
                )
            ) * $res['B11'];

            $res['F86'] = $res['C86'] == "peeling" ? 0.9 : ($res['C86'] == "shaving" ? 0.85 : 0);
            $res['F87'] = $res['C87'] == "high" ? 52 : 38;
            $res['J87'] = $res['B17'];
            $res['B90'] = $res['B84'] * $res['J84'] * $res['B85'] * $res['F86'] *
                $res['F84'] * $res['F85'] * $res['F87'] * 1000 * pi() *
                pow(($res['J87'] / 1000), 3) / 32;
            $res['H90'] = $res['B84'] * $res['J85'] * $res['B85'] * $res['F86'] *
                $res['F84'] * $res['F85'] * $res['F87'] * 1000 * pi() *
                pow(($res['J87'] / 1000), 3) / 32;

            $res['E93'] = $res['C87'] == "high" ? 12.1 : 8.7;

            $res['H93'] = $res['C86'] == "peeling" ? 1 : ($res['C86'] == "shaving" ? 0.95 : 0);
            $res['B95'] = ($res['B27'] * $res['B20'] * $res['F35'] * $res['B11']) *
                pow(($res['F35'] * 1000), 4) /
                (30 * $res['E93'] * 1000 * $res['H93'] * pi() *
                    pow(($res['B17'] / 2), 4) / 4);
            $res['E95'] = $res['B95'] / ($res['F35'] * 1000) * 100;

            /* ============================================= */

            $res['J99'] = $res['F98'] == "plank" ? 11.7 : ($res['F98'] == "round" && $res['F99'] == "normal" ? 38 : ($res['F98'] == "round" && $res['F99'] == "high" ? 52 : 0));
            $res['D103'] = $res['B98'] > $res['B16'] ?
                $res['B29'] * $res['B27'] * ($res['B26'] * $res['B15'] + $res['B20'] * $res['B98']) :
                $res['B29'] * $res['B27'] * $res['B20'] * $res['B98'];
            $res['D104'] = $res['D103'] * pow($res['B11'], 2) / 8;
            $res['B105'] = $res['F98'] == "plank" ?
                $res['B84'] * $res['J84'] * $res['B85'] * $res['J99'] * 1000 * $res['J98'] *
                pow(($res['B99'] / 1000), 2) / 6 : ($res['F98'] == "round" ?
                    $res['B84'] * $res['J84'] * $res['B85'] * $res['F86'] * $res['F84'] * $res['F85'] *
                    $res['J99'] * 1000 * $res['J98'] * pi() * pow(($res['B99'] / 1000), 3) /
                    (32 * ($res['B99'] / 1000)) :
                    "");
            $res['J103'] = $res['B98'] > $res['B16'] ?
                $res['H29'] * $res['H47'] * ($res['H26'] * $res['B15'] + $res['B20'] * $res['B98']) :
                $res['H29'] * $res['H47'] * $res['B20'] * $res['B98'];
            $res['J104'] = $res['J103'] * pow($res['B11'], 2) / 8;
            $res['H105'] = $res['F98'] == "plank" ?
                $res['B84'] * $res['J85'] * $res['B85'] * $res['J99'] * 1000 * $res['J98'] *
                pow(($res['B99'] / 1000), 2) / 6 : ($res['F98'] == "round" ?
                    $res['B84'] * $res['J85'] * $res['B85'] * $res['F86'] * $res['F84'] * $res['F85'] *
                    $res['J99'] * 1000 * $res['J98'] * pi() * pow(($res['B99'] / 1000), 3) /
                    (32 * ($res['B99'] / 1000)) :
                    "");

            /* ============================================= */

            $res['J108'] = $res['F107'] == "plank" ? 11.7 : ($res['F107'] == "round" && $res['F108'] == "normal" ? 38 : ($res['F107'] == "round" && $res['F108'] == "high" ? 52 : 0));
            $res['D112'] = $res['B107'] > $res['B16'] ?
                $res['B29'] * $res['B27'] * ($res['B26'] * $res['B15'] + $res['B20'] * $res['B107']) :
                $res['B29'] * $res['B27'] * $res['B20'] * $res['B107'];
            $res['D113'] = $res['D112'] * pow($res['B11'], 2) / 8;
            $res['B114'] = $res['F107'] == "plank" ?
                $res['B84'] * $res['J84'] * $res['B85'] * $res['J108'] * 1000 * $res['J107'] *
                pow(($res['B108'] / 1000), 2) / 6 : ($res['F107'] == "round" ?
                    $res['B84'] * $res['J84'] * $res['B85'] * $res['F86'] * $res['F84'] * $res['F85'] *
                    $res['J108'] * 1000 * $res['J107'] * pi() * pow(($res['B108'] / 1000), 3) /
                    (32 * ($res['B108'] / 1000)) :
                    "");
            $res['J112'] = $res['B107'] > $res['B16'] ?
                $res['H29'] * $res['H47'] * ($res['H26'] * $res['B15'] + $res['B20'] * $res['B107']) :
                $res['H29'] * $res['H47'] * $res['B20'] * $res['B107'];
            $res['J113'] = $res['J112'] * pow($res['B11'], 2) / 8;
            $res['H114'] = $res['F107'] == "plank" ?
                $res['B84'] * $res['J85'] * $res['B85'] * $res['J108'] * 1000 * $res['J107'] *
                pow(($res['B108'] / 1000), 2) / 6 : ($res['F107'] == "round" ?
                    $res['B84'] * $res['J85'] * $res['B85'] * $res['F86'] * $res['F84'] * $res['F85'] *
                    $res['J108'] * 1000 * $res['J107'] * pi() * pow(($res['B108'] / 1000), 3) /
                    (32 * ($res['B108'] / 1000)) :
                    "");

            /* ============================================= */

            $res['J117'] = $res['F116'] == "plank" ? 11.7 : ($res['F116'] == "round" && $res['F117'] == "normal" ? 38 : ($res['F116'] == "round" && $res['F117'] == "high" ? 52 : 0));
            $res['D121'] = $res['B116'] > $res['B16'] ?
                $res['B29'] * $res['B27'] * ($res['B26'] * $res['B15'] + $res['B20'] * $res['B116']) :
                $res['B29'] * $res['B27'] * $res['B20'] * $res['B116'];
            $res['D122'] = $res['D121'] * pow($res['B11'], 2) / 8;
            $res['B123'] = $res['F116'] == "plank" ?
                $res['B84'] * $res['J84'] * $res['B85'] * $res['J117'] * 1000 * $res['J116'] *
                pow(($res['B117'] / 1000), 2) / 6 : ($res['F116'] == "round" ?
                    $res['B84'] * $res['J84'] * $res['B85'] * $res['F86'] * $res['F84'] * $res['F85'] *
                    $res['J117'] * 1000 * $res['J116'] * pi() * pow(($res['B117'] / 1000), 3) /
                    (32 * ($res['B117'] / 1000)) :
                    "");
            $res['J121'] = $res['B116'] > $res['B16'] ?
                $res['H29'] * $res['H47'] * ($res['H26'] * $res['B15'] + $res['B20'] * $res['B116']) :
                $res['H29'] * $res['H47'] * $res['B20'] * $res['B116'];
            $res['J122'] = $res['J121'] * pow($res['B11'], 2) / 8;
            $res['H123'] = $res['F116'] == "plank" ?
                $res['B84'] * $res['J85'] * $res['B85'] * $res['J117'] * 1000 * $res['J116'] *
                pow(($res['B117'] / 1000), 2) / 6 : ($res['F116'] == "round" ?
                    $res['B84'] * $res['J85'] * $res['B85'] * $res['F86'] * $res['F84'] * $res['F85'] *
                    $res['J117'] * 1000 * $res['J116'] * pi() * pow(($res['B117'] / 1000), 3) /
                    (32 * ($res['B117'] / 1000)) :
                    "");

            foreach ($res as $key => $val) {
                if (is_numeric($val)) {
                    $res[$key] = number_format((float) $val, 3, '.', '');
                }
            }

            return $this->response->setJSON($res);
        } catch (Exception $e) {
            return $this->response->setStatusCode(400)->setJSON(['error' => $e->getMessage()]);
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

        $fields = ['B33', 'B72', 'H72', 'B84', 'B85', 'F84', 'J84', 'J85', 'J98', 'J107', 'J116'];

        $rangeFields = [
            $worksheet->rangeToArray('B10:B20', null, true, true, true),
            $worksheet->rangeToArray('B24:B29', null, true, true, true),
            $worksheet->rangeToArray('H24:H26', null, true, true, true),
            $worksheet->rangeToArray('H28:H29', null, true, true, true),
            $worksheet->rangeToArray('B39:B41', null, true, true, true),
            $worksheet->rangeToArray('G39:G40', null, true, true, true),
            $worksheet->rangeToArray('B98:B99', null, true, true, true),
            $worksheet->rangeToArray('B107:B108', null, true, true, true),
            $worksheet->rangeToArray('B116:B117', null, true, true, true),
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
        $req = $this->request->getJSON(true);

        $exportResult = $this->defaultExportInterface($this->model->getFormProperties(), $req, "timber-pole-retaining-wall-design");

        return $this->response->setJSON($exportResult);
    }
}
