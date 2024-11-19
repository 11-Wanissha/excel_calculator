<?php

namespace App\Controllers;

use App\Models\PileCapacity;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as Writer;

class PileCapacityController extends BaseController
{
    public function renderer()
    {
        $model = new PileCapacity();
        return view('pages/pile_capacity', [
            "formProperties" => $model->getFromProperties(),
        ]);
    }
    public function calculator()
    {
        $req = $this->request->getPost();
        $res = [];

        //Structural Calculation Table\
        // Cal AB25 (alpha)
        if (!isset($req['G9']) || $req['G9'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Input Diameter (D)']);
        }

        if (!isset($req['G10']) || $req['G10'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Input Bell Diameter (B)']);
        }

        if (!isset($req['G11']) || $req['G11'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Input Embedment to firm bearing (L)']);
        }

        if (!isset($req['G12']) || $req['G12'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Input Geotech Ultimate End Bearing (qb)']);
        }

        if (!isset($req['G13']) || $req['G13'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Input End bearing reduction factor (øb)']);
        }

        if (!isset($req['G14']) || $req['G14'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Input Geotech Ultimate Skin friction (qs)']);
        }

        if (!isset($req['G15']) || $req['G15'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Input Skin friction reduction factor (øs)']);
        }

        if (!isset($req['G16']) || $req['G16'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Input Combination factor (øc)']);
        }

        if (!isset($req['G18']) || $req['G18'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Main Bar yield stress ']);
        }
        if (!isset($req['G19']) || $req['G19'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Spiral yield stress ']);
        }
        if (!isset($req['G20']) || $req['G20'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Concrete strength ']);
        }
        if (!isset($req['G21']) || $req['G21'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Aggregate size ']);
        }
        if (!isset($req['G23']) || $req['G23'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Number of main bars']);
        }
        if (!isset($req['G24']) || $req['G24'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Diameter of main bars']);
        }
        if (!isset($req['G27']) || $req['G27'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Diameter of spiral ']);
        }
        if (!isset($req['G28']) || $req['G28'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Cover']);
        }
        if (!isset($req['G29']) || $req['G29'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Spacing/pitch in PPHZ']);
        }
        if (!isset($req['G30']) || $req['G30'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Spacing/pitch outside PPHZ']);
        }
        if (!isset($req['G43']) || $req['G43'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Comp. strength reduction factor']);
        }
        if (!isset($req['G58']) || $req['G58'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Tension strength reduction factor']);
        }
        if (!isset($req['G63']) || $req['G63'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Shear strength reduction factor']);
        }
        if (!isset($req['N12']) || $req['N12'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Max Axial Load - Gravity Load Case']);
        }
        if (!isset($req['N15']) || $req['N15'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Max Axial Load - Lateral Load Case']);
        }
        if (!isset($req['N16']) || $req['N16'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Min Axial Load - Lateral Load Case ']);
        }
        if (!isset($req['N20']) || $req['N20'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Max Shear Force - All Load Cases ']);
        }
        if (!isset($req['N23']) || $req['N23'] === '') {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please input Corresponding min axial load']);
        }



        if ($req['G20'] < 55) {
            $AB23 = 0.85;
        } else {
            $AB23 = 0.85 - 0.004 * ($req['G20'] - 55);
        }

        // ตรวจสอบการหาร 0 สำหรับ G23
        if ($req['G23'] == 0) {
            return $this->response->setStatusCode(400)->setJSON(['error' => "Can't divide by zero. Please check your inputs."]);
        }
        $res['G25'] = pi() * pow($req['G24'], 2) / 4 * $req['G23'];

        // ตรวจสอบการหาร 0 สำหรับ AB26 ในการคำนวณ AB28
        $AB26 = pi() * pow($req['G9'] / 1000, 2) / 4;
        if ($AB26 == 0) {
            return $this->response->setStatusCode(400)->setJSON(['error' => "Can't divide by zero . Please check your inputs."]);
        }
        $AB25 = $req['G23'] * pi() * pow($req['G24'] / 1000, 2) / 4;
        $AB28 = $AB25 / $AB26;

        // ตรวจสอบการหาร 0 สำหรับ G20 ในการคำนวณ AB29
        if ($req['G20'] == 0) {
            return $this->response->setStatusCode(400)->setJSON(['error' => "Can't divide by zero  Please check your inputs."]);
        }
        $AB29 = $req['G18'] / (0.85 * $req['G20']);

        // ตรวจสอบการหาร 0 สำหรับ AB27 ในการคำนวณ AB30
        $AB27 = (pi() * pow($req['G9'] - $req['G28'] * 2 - 2 * $req['G27'], 2)) / (4 * 1000000);
        if ($AB27 == 0) {
            return $this->response->setStatusCode(400)->setJSON(['error' => "Can't divide by zero . Please check your inputs."]);
        }
        $AB30 = min(1.5, $AB26 / $AB27);


        //Call AB29 (m)
        $AB29 = $req['G18'] / (0.85 * $req['G20']);

        //Call AB30 (A)
        $AB30 = min(1.5, $AB26 / $AB27);

        //Call AB31 (fc)
        $AB31 = $req['G20'];

        //Call AB32 (fy)
        $AB32 = $req['G18'];

        //Call AB33 (N)
        $AB33 = $req['G15'];

        //Call AB34 (ptm)
        $AB34 = min(0.4, $AB28 / $AB29);

        //Call AB35 (ps min)
        $AB35 = max(((1 - $AB34) * $AB30 * $AB31 * $AB33) / (2.4 * $AB32 * 0.85 * $AB31 * 1000 * $AB26) - 0.0084, 0);

        //Call AF26 (d")
        $AF26 = ($req['G9'] - $req['G28'] * 2 - $req['G27']) / 1000;

        $AI26 = $req['G9'];
        $AI27 = 2 * $req['G9'];
        $AI28 = 3 * $req['G9'];

        //Call AJ23 (Pn)
        $AJ23 = ($req['G58'] * $req['G20'] * (pow($req['G9'], 2) * 3.1415 / 4)) / 1000;

        //Call AJ23 (Pn)
        $AJ24 = (0.85 * $req['G20'] * ((pow($req['G9'], 2) * 3.1415 / 4) - $res['G25']) + ($req['G18'] * $res['G25'])) / 1000;


        // //vb min & vb max
        $X18 = 0.08 * sqrt($req['G20']);
        $X19 = 0.2 * sqrt($req['G20']);
        $X22 = $req['N23'];

        if ($req['G21'] <= 10) {
            $X23 = 0.85;
        } elseif ($req['G21'] > 10 && $req['G21'] < 19) {
            $X23 = 0.85 + (0.15 / 9 * ($req['G21'] - 10));
        } else {
            $X23 = 1;
        }

        if ($X22 > 0) {
            $X24 = 1 + (3 * $X22) / (1000 * $AB26 * $AB31);
        } else {
            $X24 = max(0, 1 + (12 * $X22) / (1000 * $AB26 * $AB31));
        }

        $X25 = (3.1415 * pow($req['G9'] - 2 * $req['G28'] - 2 * $req['G27'], 2)) / 4;

        //Call X20 (vb)
        $X20 = (0.07 + 10 * ((0.33 * $res['G25']) / $X25)) * sqrt($req['G20']);

        $X26 = min($X20, max($X19, $X18));

        $K18 = 0;
        //Call X28 (Iy1)
        if ($K18 < 0.25 * $AJ23) {
            $Y28 = $AI26;
        } elseif ($K18 > 0.25 * $AJ23 && $K18 <= 0.5 * $AJ23) {
            $Y28 = $AI27;
        } elseif ($K18 > 0.5 * $AJ23 && $K18 <= 0.7 * 0.85 * $AJ24) {
            $Y28 = $AI28;
        } else {
            $Y28 = "FALSE";
        }

        //Call X28 (Iy2)
        $X29 = max(3 * $req['G9'], 2 * $Y28);

        //Call X31 (d")
        $X31 = $req['G9'] - (2 * $req['G28']);

        //Call left

        $res['G31'] = pi() * pow($req['G27'], 2) / 4;
        $res['G35'] = ($req['G13'] * $req['G12'] * pi() * pow($req['G10'], 2)) / (4 * 1000);
        $res['G36'] = ($req['G15'] * $req['G14'] * pi() * $req['G9'] * $req['G11']) / 1000;
        $res['G38'] = $res['G35'] + $res['G36'] * $req['G16'];
        $maxValue = max($req['N12'], $req['N15']);  // หาค่าสูงสุดของ N12 และ N15
        $res['I38'] = ($res['G38'] > $maxValue) ? 'OK' : 'NOT OK';
        $res['G39'] = $res['G36'];
        $res['I39'] = (abs($req['N16']) < $res['G39']) ? 'OK' : 'NOT OK';
        $res['G44'] = $req['G43'] * $AB23 * ((0.85 * $req['G20'] * ((pow($req['G9'], 2) * 3.1415) / 4 - $res['G25'])) + ($req['G18'] * $res['G25'])) / 1000;
        $res['I44'] = ($res['G44'] > max($req['N12'], $req['N15'])) ? "OK" : "NOT OK";

        //Call (ps (provided)) G47
        $part1 = (pow($req['G27'], 2) * 3.1415) / 4;
        $part2 = 3.1415 * ($req['G9'] - 2 * $req['G28']);
        $part3 = 1000 / max($req['G29'], $req['G29']);
        $res['G47'] = ($part1 * $part2 * $part3) / ($AB27 * 1000000000);

        //Call (pt (provided)) G47
        $res['G48'] = $AB25 / $AB26;

        //Call ps min G49
        $res['G49'] = $AB35;

        //Call ps min G50
        $res['G50'] = ($AB25 / (155 * $AF26)) * ($req['G18'] / $req['G19']) / ($req['G24'] / 1000);

        //Call pt min G51
        $res['G51'] = 0.008 * $AB26;

        //Call pt max G52
        $res['G52'] = 0.08;

        //Call pt max G53
        $part1 = 18 * (pi() * pow($req['G9'], 2) / 4);
        $part2 = pow($req['G9'], 2) * 3.1415 / 4;
        $g53 = $part1 / $req['G18'] / $part2;
        $res['G53'] = $g53;

        //Call pt max
        $res['G54'] = (24 * $AB26 * 1000000) / ($AB26 * 1000000 * $req['G18']);

        //Call I47
        if ($res['G47'] > $res['G49'] && $res['G47'] > $res['G50']) {
            $res['I47'] = "OK";
        } else {
            $res['I47'] = "NOT OK";
        }

        //Call I48
        if ($res['G48'] < $res['G52'] && $res['G48'] < $res['G53'] && $res['G48'] > $res['G51']) {
            $res['I48'] = "OK";
        } else {
            $res['I48'] = "NOT OK";
        }

        //Call G59 Tensile capacity
        $res['G59'] = ($req['G58'] * $res['G25'] * $req['G18']) / 1000;

        //Call I59 Tensile capacity
        if ($req['N16'] >= 0) {
            $res['I59'] = "OK";
        } else {
            $res['I59'] = ($res['G59'] > abs($req['N16'])) ? "OK" : "NOT OK";
        }

        //Call G64 Nominal shear stress
        $res['G64'] = ($req['N20'] / 0.75) * 1000 / $X25;

        //Call G65 Max nominal shear stress
        $res['G65'] = max(0.2 * $req['G20'], 8);

        //Call G66 Shear resisted by concrete
        $res['G66'] = ($X23 * $X24 * $X26 * $X25) / 1000;

        //Call G67 Shear resisted by reinforcing
        $res['G67'] = ($res['G31'] * pi() * $req['G19'] * $X31) / (2000 * $req['G29']);

        //Call G69 Min shear reinforcement
        $res['G69'] = (1 / 32) * sqrt($req['G20']) * ($req['G9'] - 2 * $req['G28'] - $req['G27']) * $req['G29'] / $req['G19'];

        //Call G70 Shear reinforcement provided
        $res['G70'] = $res['G31'];

        //Call I70
        if ($res['G70'] > $res['G69']) {
            $res['I70'] = 'OK';
        } else {
            $res['I70'] = 'NOT OK';
        }

        //Call G71 Section shear capacity
        $res['G71'] = 0.75 * ($res['G66'] + $res['G67']);

        //Call I71 Section shear capacity
        if ($res['G71'] > $req['N20']) {
            $res['I71'] = 'OK';
        } else {
            $res['I71'] = 'NOT OK';
        }

        $res['O29'] = 25;
        $res['O30'] = (($req['G9'] - 2 * $req['G28'] - 2 * $req['G27'] - $req['G24']) * 3.14159) / $req['G23'];

        //Call O31 smax
        $sqrtG20 = sqrt($req['G20']);
        $condition = 0.033 * $sqrtG20 * $AB27 * 1000000;

        if ($res['G67'] > $condition) {
            $res['O31'] = min($req['G9'] / 4, $req['G9'] / 3, 10 * $req['G24']);
        } else {
            $res['O31'] = min($req['G9'] / 3, 10 * $req['G24']);
        }


        if ($res['O30'] <= $res['O31'] && $res['O30'] >= $res['O29']) {
            $res['Q30'] = "OK";
        } else {
            $res['Q30'] = "NOT OK";
        }

        $res['innerRadius'] = sqrt($res['G31'] / M_PI);

        //กำหนดรัศมีของวงกลมด้านนอกให้สัมพันธ์กับระยะห่างของขอบ (cover)
        $res['outerRadius'] = $res['innerRadius'] + ($req['G28'] / 100); // แปลงค่า cover จาก mm เป็น cm เพื่อใช้ในโครงสร้าง

        // ปรับระยะห่างในการวางจุดสีดำ โดยใช้ระยะห่างจาก innerRadius และ dotSpacing
        $res['dotRadius'] = $res['innerRadius'] - 0.3; // ระยะห่างที่ใช้ในการจัดจุดด้านใน

        // คำนวณจำนวนจุดที่สามารถวางได้รอบวงกลมโดยใช้ระยะ dotSpacing
        $calculatedDotCount = floor((2 * M_PI * $res['dotRadius']) / $req['G29']);

        // ตรวจสอบว่าได้ dotCount ใกล้เคียงเป้าหมายหรือไม่ หากน้อยกว่าเป้าหมายปรับให้เป็นตามเป้าหมาย
        $res['dotCount'] = $calculatedDotCount;

        foreach ($res as $key => $val) {
            if (is_numeric($val)) {
                $res[$key] =  number_format((float)$val, 2, '.', '');
            }
        }
        // $res['innerRadius '] = sqrt($res['G31'] / M_PI);
        // $res['dotPositionRadius '] = $req['G28'] - $res['innerRadius '];
        // $res['dotCount '] = floor((2 * M_PI * $res['dotPositionRadius ']) / $req['G29']);
        // คำนวณรัศมีของวงกลมด้านในจากพื้นที่ทั้งหมด
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

        $fields = ['G43', 'G58', 'B23', 'G63'];

        $rangeFields = [
            $worksheet->rangeToArray('G9:G24', null, true, true, true),
            $worksheet->rangeToArray('G27:G30', null, true, true, true),
            $worksheet->rangeToArray('N12:N23', null, true, true, true),
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
        $model = new PileCapacity();
        $exportResult = $this->defaultExportInterface($model->getFromProperties(), $req, "rc-pile-capacity-report");
        return $this->response->setJSON($exportResult);
    }
}
