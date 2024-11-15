<?php

namespace App\Controllers;

use App\Models\TimberPoleWallBrooms;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as Writer;

class TimberPoleWallBroomsController extends BaseController
{
    public function renderer()
    {
        $model = new TimberPoleWallBrooms();
        return view('pages/timber_pole_wall_brooms', [
            "formProperties" => $model->getFromProperties(),
        ]);
    }
    public function calculated3D()
    {
        $req = $this->request->getJSON(true);
        $res = [];
        // calculated Active pressure coefficient and Seismic pressure coefficient
        if (isset($req['B14']) && $req['B14'] !== '') {
            if ((pow(1 + sin($req['B14'] * pi() / 180), 2)) == 0) {
                return $this->response->setStatusCode(400)->setJSON(['error' => "Can't divide by zero. Please check your inputs."]);
            }
            $res['B21'] = (pow(cos($req['B14'] * pi() / 180), 2)) / (pow(1 + sin($req['B14'] * pi() / 180), 2));
            $B19 = isset($req['B18']) && $req['B18'] !== '' ? atan($req['B18']) : 0;
            if (pow(cos($B19), 2) > 0 && 180 - $B19 != 0) {
                if ((sin($req['B14'] * pi() / 180) * sin($req['B14'] * pi() / 180 - $B19)) / cos($B19) < 0) {
                    $res['B22'] = "NAN!";
                } else {
                    $res['B22'] =
                        (pow(cos($req['B14'] * pi() / 180 - $B19), 2)) /
                        (pow(cos($B19), 2) * pow(1 + sqrt((sin($req['B14'] * pi() / 180) * sin($req['B14'] * pi() / 180 - $B19)) / cos($B19)), 2));

                }
            } else {
                return $this->response->setStatusCode(400)->setJSON(['error' => "Can't divide by zero. Please check your inputs."]);
            }
            $B19 = null;
        } else {
            $res['B21'] = 0;
            $res['B22'] = 0;
        }
        if (!isset($req['B20']) || $req['B20'] === '') {
            $res['B20'] = 1.5;
            $req['B20'] = 1.5;
        }
        //calculated Check pole capacity
        //calculated Static Factored Demands
        $C32 = $req['B15'] * pow($req['B9'], 2) * $res['B21'] / 2;
        $C33 = $res['B21'] * $req['B17'] * $req['B9'];
        if ($res['B22'] !== "NAN!")
            $C36 = $req['B15'] * pow($req['B9'], 2) * $res['B22'] / 2;
        $C37 = $res['B21'] * $req['B17'] * $req['B9'];
        $F32 = $C32 * $req['B9'] / 3;
        $F33 = $C33 * $req['B9'] / 2;
        if ($res['B22'] !== "NAN!")
            $F36 = $C36 * $req['B9'] / 3;
        $F37 = $C37 * $req['B9'] / 2;

        $res['C34'] = $req['B20'] * ($C32 + $C33) * $req['B11'];
        if ($res['B22'] !== "NAN!")
            $res['C38'] = ($C37 + $C36) * $req['B11'];
        $res['F34'] = $req['B20'] * ($F32 + $F33) * $req['B11'];
        if ($res['B22'] !== "NAN!")
            $res['F38'] = ($F37 + $F36) * $req['B11'];
        //clear memory
        $C32 = null;
        $C33 = null;
        $C36 = null;
        $C37 = null;
        $F32 = null;
        $F33 = null;
        $F36 = null;
        $F37 = null;
        //calculated Check pole embedment
        //calculated Static
        $res['B13'] = round($req['B12'] + 150, 2);
        if ($res['B13'] == 0 || $res['C34'] == 0 || $res['C34'] == 0) {
            return $this->response->setStatusCode(400)->setJSON(['error' => "Can't divide by zero. Please check your inputs."]);
        }
        $res['D45'] = $res['F34'] / $res['C34'];
        $res['D46'] = $req['B11'] / $res['B13'] * 1000;
        if ($res['D46'] >= 4) {
            $res['D47'] = 1;
            $res['F47'] = 1;
        } else if ($res['D46'] <= 1) {
            $res['D47'] = 0.25;
            $res['F47'] = 0.25;
        } else {
            $res['D47'] = round(0.25 + ($res['D46'] - 1) * 0.25, 2);
            $res['F47'] = round(0.25 + ($res['D46'] - 1) * 0.25, 2);
        }
        $res['D48'] = 1.5 * $res['B13'] / 1000;
        if ($req['B16'] == 0 || $res['D47'] == 0) {
            return $this->response->setStatusCode(400)->setJSON(['error' => "Can't divide by zero. Please check your inputs."]);
        }
        $res['D49'] = $res['C34'] / (9 * $req['B16'] * $res['B13'] * $res['D47'] / 1000);
        if ((1000 + 0.5 * $res['D49']) == 0) {
            return $this->response->setStatusCode(400)->setJSON(['error' => "Can't divide by zero. Please check your inputs."]);
        }
        $res['D50'] = pow($res['C34'] * ($res['D45'] + $res['D48'] + 0.5 * $res['D49']) / (2.25 * $res['B13'] / 1000 * $req['B16'] * $res['D47']), 0.5);
        $res['D51'] = $res['D48'] + $res['D49'] + $res['D50'];
        $res['D52'] = $res['C34'] * ($res['D45'] + 1.5 * $res['B13'] / 1000 + 0.5 * $res['D49']);
        $res['B10'] = round($res['D51'], 2);
        //calculated  Seismic
        if ($res['B22'] !== "NAN!")
            $res['F45'] = $res['F38'] / $res['C38'];
        $res['F46'] = $req['B11'] / $res['B13'] * 1000;
        $res['F48'] = 1.5 * $res['B13'] / 1000;
        if ($res['B22'] !== "NAN!")
            $res['F49'] = $res['C38'] / (9 * $req['B16'] * $res['B13'] * $res['F47'] / 1000);
        if ($res['B22'] !== "NAN!")
            $res['F50'] = pow($res['C38'] * ($res['F45'] + $res['F48'] + 0.5 * $res['F49']) / (2.25 * $res['B13'] / 1000 * $req['B16'] * $res['F47']), 0.5);
        if ($res['B22'] !== "NAN!")
            $res['F51'] = $res['F48'] + $res['F49'] + $res['F50'];
        if ($res['B22'] !== "NAN!")
            $res['F52'] = $res['C38'] * ($res['F45'] + 1.5 * $res['B13'] / 1000 + 0.5 * $res['F49']);
        foreach ($res as $key => $val) {
            if (is_numeric($val)) {
                $res[$key] = number_format((float) $val, 2, '.', '');
            }
        }
        return $this->response->setJSON($res);
    }

    public function calculator()
    {
        $req = $this->request->getPost();
        $res = [];
        //calculated Pole cantilever wall parameters
        // calculated Concrete diameter
        if ((!isset($req['B15']) || $req['B15'] === '') || (!isset($req['B9']) || $req['B9'] === '') || (!isset($req['B16']) || $req['B16'] === '') || (!isset($req['B17']) || $req['B17'] === '') || (!isset($req['B11']) || $req['B11'] === '')) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Fill Up Input']);
        }
        if (!isset($req['B12']) || $req['B12'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Select Pole diameter']);
        }
        $res['B13'] = round($req['B12'] + 150, 2);
        //calculated Timber pole properties
        //calculated K20
        if (isset($req['F26']) && $req['F26'] !== '') {
            $res['B26'] = $req['F26'] == 0 ? 0.85 : 0.9;
        } else {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Select Trimming method !!']);
        }
        //calculated K22
        if (isset($req['I27']) && $req['I27'] !== '') {
            $res['F27'] = $req['I27'] === 'Green' ? 1 : 1.25;
        } else {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Select Moisture !!']);
        }
        //calculated fb
        if (isset($req['D28']) && $req['D28'] !== '') {
            $res['B28'] = $req['D28'] == 0 ? 52 : 38;
        } else {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Select Bending strength !!']);
        }

        if (!isset($req['B56']) || $req['B56'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Select Timber Grade !!']);
        }
        if (!isset($req['B57']) || $req['B57'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Select Moisture !!']);
        }
        if ((!isset($req['B63']) || $req['B63'] === '') || (!isset($req['B67']) || $req['B67'] === '')) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Fill Up Max.e']);
        }
        if ((!isset($req['E61']) || $req['E61'] === '') || (!isset($req['E65']) || $req['E65'] === '') || (!isset($req['E69']) || $req['E69'] === '')) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Select Adopt']);
        }
        // calculated Active pressure coefficient and Seismic pressure coefficient
        if (isset($req['B14']) && $req['B14'] !== '') {
            if ((pow(1 + sin($req['B14'] * pi() / 180), 2)) == 0) {
                return $this->response->setStatusCode(400)->setJSON(['error' => "Can't divide by zero. Please check your inputs."]);
            }
            $res['B21'] = (pow(cos($req['B14'] * pi() / 180), 2)) / (pow(1 + sin($req['B14'] * pi() / 180), 2));
            $B19 = isset($req['B18']) && $req['B18'] !== '' ? atan($req['B18']) : 0;
            if (pow(cos($B19), 2) > 0 && 180 - $B19 != 0) {
                if ((sin($req['B14'] * pi() / 180) * sin($req['B14'] * pi() / 180 - $B19)) / cos($B19) < 0) {
                    $res['B22'] = "NAN!";
                } else {
                    $res['B22'] =
                        (pow(cos($req['B14'] * pi() / 180 - $B19), 2)) /
                        (pow(cos($B19), 2) * pow(1 + sqrt((sin($req['B14'] * pi() / 180) * sin($req['B14'] * pi() / 180 - $B19)) / cos($B19)), 2));

                }
            } else {
                return $this->response->setStatusCode(400)->setJSON(['error' => "Can't divide by zero. Please check your inputs."]);
            }
            $B19 = null;
        } else {
            $res['B21'] = 0;
            $res['B22'] = 0;
        }
        if (!isset($req['B20']) || $req['B20'] === '') {
            $res['B20'] = 1.5;
            $req['B20'] = 1.5;
        }
        //calculated Check pole capacity
        //calculated Static Factored Demands
        $C32 = $req['B15'] * pow($req['B9'], 2) * $res['B21'] / 2;
        $C33 = $res['B21'] * $req['B17'] * $req['B9'];
        if ($res['B22'] !== "NAN!")
            $C36 = $req['B15'] * pow($req['B9'], 2) * $res['B22'] / 2;
        $C37 = $res['B21'] * $req['B17'] * $req['B9'];
        $F32 = $C32 * $req['B9'] / 3;
        $F33 = $C33 * $req['B9'] / 2;
        if ($res['B22'] !== "NAN!")
            $F36 = $C36 * $req['B9'] / 3;
        $F37 = $C37 * $req['B9'] / 2;

        $res['C34'] = $req['B20'] * ($C32 + $C33) * $req['B11'];
        if ($res['B22'] !== "NAN!")
            $res['C38'] = ($C37 + $C36) * $req['B11'];
        $res['F34'] = $req['B20'] * ($F32 + $F33) * $req['B11'];
        if ($res['B22'] !== "NAN!")
            $res['F38'] = ($F37 + $F36) * $req['B11'];
        //clear memory
        $C32 = null;
        $C33 = null;
        $C36 = null;
        $C37 = null;
        $F32 = null;
        $F33 = null;
        $F36 = null;
        $F37 = null;
        // calculated Z
        $res['B39'] = pi() / 32 * pow($req['B12'], 3) / 1000;
        if (!isset($req['B25']) || $req['B25'] === '') {
            $res['B25'] = 0.6;
            $req['B25'] = 0.6;
        }
        if (!isset($req['B27']) || $req['B27'] === '') {
            $res['B27'] = 1;
            $req['B27'] = 1;
        }
        if (!isset($req['D27']) || $req['D27'] === '') {
            $res['D27'] = 0.85;
            $req['D27'] = 0.85;
        }
        if (!isset($req['F25']) || $req['F25'] === '') {
            $res['F25'] = 0.8;
            $req['F25'] = 0.8;
        }
        if (!isset($req['D25']) || $req['D25'] === '') {
            $res['D25'] = 1;
            $req['D25'] = 1;
        }


        $res['E40'] = round($req['F25'] * $req['B25'] * $req['B27'] * $res['B26'] * $req['D27'] * $res['F27'] * $res['B28'] * $res['B39'] / 1000, 2);
        $res['E41'] = round($req['F25'] * $req['D25'] * $req['B27'] * $res['B26'] * $req['D27'] * $res['F27'] * $res['B28'] * $res['B39'] / 1000, 2);

        //calculated Check pole embedment
        //calculated Static
        if ($res['B13'] == 0 || $res['C34'] == 0 || $res['C34'] == 0) {
            return $this->response->setStatusCode(400)->setJSON(['error' => "Can't divide by zero. Please check your inputs."]);
        }
        $res['D45'] = $res['F34'] / $res['C34'];
        $res['D46'] = $req['B11'] / $res['B13'] * 1000;
        if ($res['D46'] >= 4) {
            $res['D47'] = 1;
            $res['F47'] = 1;
        } else if ($res['D46'] <= 1) {
            $res['D47'] = 0.25;
            $res['F47'] = 0.25;
        } else {
            $res['D47'] = round(0.25 + ($res['D46'] - 1) * 0.25, 2);
            $res['F47'] = round(0.25 + ($res['D46'] - 1) * 0.25, 2);
        }
        $res['D48'] = 1.5 * $res['B13'] / 1000;
        if ($req['B16'] == 0 || $res['D47'] == 0) {
            return $this->response->setStatusCode(400)->setJSON(['error' => "Can't divide by zero. Please check your inputs."]);
        }
        $res['D49'] = $res['C34'] / (9 * $req['B16'] * $res['B13'] * $res['D47'] / 1000);
        if ((1000 + 0.5 * $res['D49']) == 0) {
            return $this->response->setStatusCode(400)->setJSON(['error' => "Can't divide by zero. Please check your inputs."]);
        }
        $res['D50'] = pow($res['C34'] * ($res['D45'] + $res['D48'] + 0.5 * $res['D49']) / (2.25 * $res['B13'] / 1000 * $req['B16'] * $res['D47']), 0.5);
        $res['D51'] = $res['D48'] + $res['D49'] + $res['D50'];
        $res['D52'] = $res['C34'] * ($res['D45'] + 1.5 * $res['B13'] / 1000 + 0.5 * $res['D49']);
        //calculated  Seismic
        if ($res['B22'] !== "NAN!")
            $res['F45'] = $res['F38'] / $res['C38'];
        $res['F46'] = $req['B11'] / $res['B13'] * 1000;
        $res['F48'] = 1.5 * $res['B13'] / 1000;
        if ($res['B22'] !== "NAN!")
            $res['F49'] = $res['C38'] / (9 * $req['B16'] * $res['B13'] * $res['F47'] / 1000);
        if ($res['B22'] !== "NAN!")
            $res['F50'] = pow($res['C38'] * ($res['F45'] + $res['F48'] + 0.5 * $res['F49']) / (2.25 * $res['B13'] / 1000 * $req['B16'] * $res['F47']), 0.5);
        if ($res['B22'] !== "NAN!")
            $res['F51'] = $res['F48'] + $res['F49'] + $res['F50'];
        if ($res['B22'] !== "NAN!")
            $res['F52'] = $res['C38'] * ($res['F45'] + 1.5 * $res['B13'] / 1000 + 0.5 * $res['F49']);

        $res['B10'] = round($res['D51'], 2);
        $res['I40'] = $res['E40'] > $res['D52'] ? 'OK!' : 'NG!';
        if ($res['B22'] !== "NAN!")
            $res['I41'] = $res['E41'] > $res['F52'] ? 'OK!' : 'NG!';
        //calculated Check timber rails
        $model = new TimberPoleWallBrooms();
        $res['F56'] = $model->getValue($req['B57'], $req['B56']);
        $res['B59'] = (float) $req['B9'];
        $E59 = $req['B20'] * ($res['B59'] * $res['B21'] * $req['B15'] + $req['B17'] * $res['B21']);
        if ($res['B22'] !== "NAN!")
            $E60 = $res['B59'] * $req['B15'] * $res['B22'] + $req['B17'] * $res['B22'];
        $res['G59'] = round($E59 * pow($req['B11'], 2) / 8, 1);
        if ($res['B22'] !== "NAN!")
            $res['G60'] = round($E60 * pow($req['B11'], 2) / 8, 1);
        $E59 = null;
        $E60 = null;
        $E63 = $req['B20'] * ($req['B63'] * $res['B21'] * $req['B15'] + $req['B17'] * $res['B21']);
        if ($res['B22'] !== "NAN!")
            $E64 = $req['B63'] * $req['B15'] * $res['B22'] + $req['B17'] * $res['B22'];
        $E67 = $req['B20'] * ($req['B67'] * $res['B21'] * $req['B15'] + $req['B17'] * $res['B21']);
        if ($res['B22'] !== "NAN!")
            $E68 = $req['B67'] * $req['B15'] * $res['B22'] + $req['B17'] * $res['B22'];
        $res['G63'] = round($E63 * pow($req['B11'], 2) / 8, 1);
        if ($res['B22'] !== "NAN!")
            $res['G64'] = round($E64 * pow($req['B11'], 2) / 8, 1);
        $res['G67'] = round($E67 * pow($req['B11'], 2) / 8, 1);
        if ($res['B22'] !== "NAN!")
            $res['G68'] = round($E68 * pow($req['B11'], 2) / 8, 1);
        $E63 = null;
        $E64 = null;
        $E67 = null;
        $E68 = null;
        $check = $model->calculatedDataSet($req['B25'], $req['D25'], $res['F56']);
        if ($check) {
            $res['I59'] = $model->getValueDataset($req['E61'], 1);
            $res['I60'] = $model->getValueDataset($req['E61'], 0);
            $res['I63'] = $model->getValueDataset($req['E65'], 1);
            $res['I64'] = $model->getValueDataset($req['E65'], 0);
            $res['I67'] = $model->getValueDataset($req['E69'], 1);
            $res['I68'] = $model->getValueDataset($req['E69'], 0);
            $res['K59'] = $res['I59'] > $res['G59'] ? 'OK!' : 'NG!';
            if ($res['B22'] !== "NAN!")
                $res['K60'] = $res['I60'] > $res['G60'] ? 'OK!' : 'NG!';
            $res['K63'] = $res['I63'] > $res['G63'] ? 'OK!' : 'NG!';
            if ($res['B22'] !== "NAN!")
                $res['K64'] = $res['I64'] > $res['G64'] ? 'OK!' : 'NG!';
            $res['K67'] = $res['I67'] > $res['G67'] ? 'OK!' : 'NG!';
            if ($res['B22'] !== "NAN!")
                $res['K68'] = $res['I68'] > $res['G68'] ? 'OK!' : 'NG!';
            $model = null;
        } else {
            return $this->response->setStatusCode(400)->setJSON(['error' => "Can't Calculated Check timber rail"]);
        }
        $res['B21'] = round($res['B21'], 2);
        $res['B22'] = round($res['B22'], 2);
        $res['B39'] = round($res['B39'], 2);
        $res['C34'] = round($res['C34'], 2);
        $res['F34'] = round($res['F34'], 2);
        $res['C38'] = round($res['C38'], 2);
        $res['F38'] = round($res['F38'], 2);
        for ($i = 45; $i < 53; $i++) {
            if ($i === 47) {
                continue;
            }
            $res['D' . $i] = round($res['D' . $i], 2);
            $res['F' . $i] = round($res['F' . $i], 2);
        }
        return $this->response->setJSON($res);
    }
    public function import()
    {
        $file = $this->request->getFile('file');

        if (!$file || !$file->isValid() || $file->hasMoved()) {
            return $this->response->setStatusCode(400)->setJSON(['error' => "File was not upload or something wrong with file"]);
        }

        $reader = new Reader();
        $sheet = $reader->load($file->getTempName());
        $worksheet = $sheet->getActiveSheet();

        $fields = ['B9', 'B11', 'B12', 'B14', 'B15', 'B16', 'B17', 'B18', 'B20', 'B25', 'D25', 'F25', 'B27', 'D27', 'B63', 'B67'];

        $cells = [];

        foreach ($fields as $field) {
            $cell = $worksheet->getCell($field)->getValue();
            $cells[$field] = $cell;
        }

        return $this->response->setJSON($cells);
    }
    public function export()
    {
        $req = $this->request->getJSON(true);
        $model = new TimberPoleWallBrooms();
        $exportResult = $this->defaultExportInterface($model->getFromProperties(), $req, "timber-pole-wall-brooms-report");
        return $this->response->setJSON($exportResult);
    }
}
