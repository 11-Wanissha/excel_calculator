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
        $model = new ProppedCantileverBeam();
        // Assuming you’re receiving POST data for calculation
        $data = $this->request->getPost();

        // Perform calculations or any data processing here

        // Pass data to view (or JSON response if needed)
        return view('pages/propped_cantilever_beam', ['data' => $data]);
    }

    public function import()
    {
        // Implement import functionality here
    }

    public function export()
    {
        // Implement export functionality here
    }
}
