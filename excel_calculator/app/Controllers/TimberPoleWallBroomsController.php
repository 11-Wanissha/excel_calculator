<?php

namespace App\Controllers;

use App\Models\TimberPoleWallBrooms;
use App\Models\TimberGradeData;
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
}