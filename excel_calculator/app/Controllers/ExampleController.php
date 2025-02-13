<?php

namespace App\Controllers;

use App\Models\ExampleModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as Writer;

class ExampleController extends BaseController
{
    public function renderer()
    {
        // ส่งไปยังหน้าจอของเรา
        return view('pages/example_page');

        /* 
        กรณีอยากส่งตัวแปรอะไรไปให้หน้าบ้านด้วย ใช้แบบล่าง

        $model = new ExampleModel();
        return view('pages/pages/ชื่อไฟล์', [
            "formProperties" => $model->getData(),
        ]);

        */
    }

    public function calculator()
    {
        $req = $this->request->getPost();
        $res = [];
        /* 
        เช็คข้อมูลด้วยว่าที่เขาส่งมามันมีค่าไหม อันนี้คือตัวอย่าง 
        โดย หน้าบ้านจะต้องส่ง id ของ input ต่างๆ ตามชื่อของ cell ใน excel 
        เพื่อความสะดวก ไม่ต้องตั้งชื่อตัวแปรใหม่ 
        */
        if (!isset($req['B15'])) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Please Fill Up Input']);
        }

        /* 
        เก็บค่า response ตัวที่จะส่งไปหน้าบ้าน 
        เพื่อแสดงผลของการคำนวณ เก็บเป็น array โดยชื่อ response จะตรงกับ cell 
        ของ excel เช่นกัน และ id ของตัวแสดงผลจะต้องตรงกันเช่นกัน
        */
        $res['E35'] = 20;

        // นำมาแปลงให้เป็น เลขทศนิยม 2 ตำแหน่ง ก่อนส่งไปหาหน้าบ้าน
        foreach ($res as $key => $val) {
            if (is_numeric($val)) {
                $res[$key] = number_format((float) $val, 2, '.', '');
            }
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
        // กำหนด fields ที่อยากเอาค่าไปใช้ ตัวอย่าง $fields = ['B9', 'B11', 'B12', 'B14', 'B15', 'B16', 'B17', 'B18', 'B20', 'B25', 'D25', 'F25', 'B27', 'D27', 'B63', 'B67'];
        $fields = [];

        $cells = [];
        //ตัวอย่างหากต้องการข้อมูลที่หลายแถวติด ๆ กัน ไม่เอาทีละช่องทำตามนี้ได้
        $rangeFields = [
            $worksheet->rangeToArray('B20:E22', null, true, true, true),
            $worksheet->rangeToArray('B25:E25', null, true, true, true),
            $worksheet->rangeToArray('F20:J25', null, true, true, true),
            $worksheet->rangeToArray('G27:J27', null, true, true, true),
            $worksheet->rangeToArray('B31:E35', null, true, true, true),
        ];
        // ถ้าไม่มี fields ก็ลบทิ้งได้
        foreach ($fields as $field) {
            $cell = $worksheet->getCell($field)->getValue();
            $cells[$field] = $cell;
        }

        //ถ้าไม่มี rangeFields ก็ลบทิ้งได้
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
        // export function  detail ให้เขียนของตัวเองในแต่ละหน้า       
        return $this->response->setJSON($req);
    }
}
