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
        
        // Point loads: ULS P1------------------------------------/////
        $res['C26'] = isset($req['C18']) ? $req['C18'] * 1.35 : throw new ErrorException("error"); 
        $res['D26'] = isset($req['C18']) && isset($req['D18']) ? $req['C18'] * 1.2 + 1.5 * $req['D18'] : throw new ErrorException("error"); 
        $res['E26'] = isset($req['D18']) && isset($req['E18']) && isset($req['C11']) ? $req['D18'] * 1.2 + 1.5 * $req['C11'] * $req['E18'] : throw new ErrorException("error");
        $res['F26'] = isset($req['C18']) && isset($req['E18']) && isset($req['D18']) && isset($req['C12']) ? 1.2 * $req['C18'] + $req['C12'] * $req['D18'] + $req['E18'] : throw new ErrorException("error");
        $res['G26'] = isset($req['C18']) && isset($req['E18']) ? 0.9 * $req['C18'] + $req['E18'] : throw new ErrorException("error");
        $res['H26'] = isset($req['C18']) && isset($req['F18']) && isset($req['D18']) && isset($req['C13']) ? $req['C18'] + $req['C13'] * $req['D18'] + $req['F18'] : throw new ErrorException("error");
        $res['I26'] = isset($req['C18']) && isset($req['G18']) && isset($req['D18']) && isset($req['C12']) ? 1.2 * $req['C18'] + $req['C12'] * $req['D18'] + $req['G18'] : throw new ErrorException("error");
        $res['J26'] = max($res['C26'], $res['D26'], $res['E26'], $res['F26'], $res['G26'], $res['H26'], $res['I26']);
       
        // Point loads: ULS P2------------------------------------/////
        $res['C27'] = isset($req['C19']) ? $req['C19'] * 1.35 : throw new ErrorException("error"); 
        $res['D27'] = isset($req['C19']) && isset($req['D19']) ? $req['C19'] * 1.2 + 1.5 * $req['D19'] : throw new ErrorException("error"); 
        $res['E27'] = isset($req['D19']) && isset($req['E19']) && isset($req['C11']) ? $req['D19'] * 1.2 + 1.5 * $req['C11'] * $req['E19'] : throw new ErrorException("error");
        $res['F27'] = isset($req['C19']) && isset($req['E19']) && isset($req['D19']) && isset($req['C12']) ? 1.2 * $req['C19'] + $req['C12'] * $req['D19'] + $req['E19'] : throw new ErrorException("error");
        $res['G27'] = isset($req['C19']) && isset($req['E19']) ? 0.9 * $req['C19'] + $req['E19'] : throw new ErrorException("error");
        $res['H27'] = isset($req['C19']) && isset($req['F19']) && isset($req['D19']) && isset($req['C13']) ? $req['C19'] + $req['C13'] * $req['D19'] + $req['F19'] : throw new ErrorException("error");
        $res['I27'] = isset($req['C19']) && isset($req['G19']) && isset($req['D19']) && isset($req['C12']) ? 1.2 * $req['C19'] + $req['C12'] * $req['D19'] + $req['G19'] : throw new ErrorException("error");
        $res['J27'] = max($res['C27'], $res['D27'], $res['E27'], $res['F27'], $res['G27'], $res['H27'], $res['I27']);
       
        // Point loads: ULS P3------------------------------------/////
        $res['C28'] = isset($req['C20']) ? $req['C20'] * 1.35 : throw new ErrorException("error"); 
        $res['D28'] = isset($req['C20']) && isset($req['D20']) ? $req['C20'] * 1.2 + 1.5 * $req['D20'] : throw new ErrorException("error"); 
        $res['E28'] = isset($req['D20']) && isset($req['E20']) && isset($req['C20']) ? $req['D20'] * 1.2 + 1.5 * $req['C11'] * $req['E20'] : throw new ErrorException("error");
        $res['F28'] = isset($req['C20']) && isset($req['E20']) && isset($req['D20']) && isset($req['C20']) ? 1.2 * $req['C20'] + $req['C12'] * $req['D20'] + $req['E20'] : throw new ErrorException("error");
        $res['G28'] = isset($req['C20']) && isset($req['E20']) ? 0.9 * $req['C20'] + $req['E20'] : throw new ErrorException("error");
        $res['H28'] = isset($req['C20']) && isset($req['F20']) && isset($req['D20']) && isset($req['C13']) ? $req['C20'] + $req['C13'] * $req['D20'] + $req['F20'] : throw new ErrorException("error");
        $res['I28'] = isset($req['C20']) && isset($req['G20']) && isset($req['D20']) && isset($req['C12']) ? 1.2 * $req['C20'] + $req['C12'] * $req['D20'] + $req['G20'] : throw new ErrorException("error");
        $res['J28'] = max($res['C28'], $res['D28'], $res['E28'], $res['F28'], $res['G28'], $res['H28'], $res['I28']);
       
        // Point loads: ULS P4------------------------------------/////
        $res['C29'] = isset($req['C21']) ? $req['C21'] * 1.35 : throw new ErrorException("error"); 
        $res['D29'] = isset($req['C21']) && isset($req['D21']) ? $req['C21'] * 1.2 + 1.5 * $req['D21'] : throw new ErrorException("error"); 
        $res['E29'] = isset($req['D21']) && isset($req['E21']) && isset($req['C21']) ? $req['D21'] * 1.2 + 1.5 * $req['C11'] * $req['E21'] : throw new ErrorException("error");
        $res['F29'] = isset($req['C21']) && isset($req['E21']) && isset($req['D21']) && isset($req['C21']) ? 1.2 * $req['C21'] + $req['C12'] * $req['D21'] + $req['E21'] : throw new ErrorException("error");
        $res['G29'] = isset($req['C21']) && isset($req['E21']) ? 0.9 * $req['C21'] + $req['E21'] : throw new ErrorException("error");
        $res['H29'] = isset($req['C21']) && isset($req['F21']) && isset($req['D21']) && isset($req['C13']) ? $req['C21'] + $req['C13'] * $req['D21'] + $req['F21'] : throw new ErrorException("error");
        $res['I29'] = isset($req['C21']) && isset($req['G21']) && isset($req['D21']) && isset($req['C12']) ? 1.2 * $req['C21'] + $req['C12'] * $req['D21'] + $req['G21'] : throw new ErrorException("error");
        $res['J29'] = max($res['C29'], $res['D29'], $res['E29'], $res['F29'], $res['G29'], $res['H29'], $res['I29']);
       
        // Point loads: SLS ------------------------------------/////
        $res['C33'] = isset($req['C18']) && isset($req['C11']) && isset($req['D18']) ? $req['C18'] + $req['C11'] * $req['D18']  : throw new ErrorException("error"); 
        $res['C34'] = isset($req['C19']) && isset($req['C11']) && isset($req['D19']) ? $req['C19'] + $req['C11'] * $req['D19']  : throw new ErrorException("error"); 
        $res['C35'] = isset($req['C20']) && isset($req['C11']) && isset($req['D20']) ? $req['C20'] + $req['C11'] * $req['D20']  : throw new ErrorException("error"); 
        $res['C36'] = isset($req['C21']) && isset($req['C11']) && isset($req['D21']) ? $req['C21'] + $req['C11'] * $req['D21']  : throw new ErrorException("error"); 

        // Distributed loads: ULS ------------------------------------/////
        $res['C47'] = isset($req['C41']) ? $req['C41'] * 1.35 : throw new ErrorException("error"); 
        $res['D47'] = isset($req['C41']) && isset($req['D41']) ? $req['C41'] * 1.2 + 1.5 * $req['D41'] : throw new ErrorException("error"); 
        $res['E47'] = isset($req['D41']) && isset($req['E41']) && isset($req['C11']) ? $req['D41'] * 1.2 + 1.5 * $req['C11'] * $req['E41'] : throw new ErrorException("error");
        $res['F47'] = isset($req['C41']) && isset($req['E41']) && isset($req['D41']) && isset($req['C12']) ? 1.2 * $req['C41'] + $req['C12'] * $req['D41'] + $req['E41'] : throw new ErrorException("error");
        $res['G47'] = isset($req['C41']) && isset($req['E41']) ? 0.9 * $req['C41'] + $req['E41'] : throw new ErrorException("error");
        $res['H47'] = isset($req['C41']) && isset($req['F41']) && isset($req['D41']) && isset($req['C13']) ? $req['C41'] + $req['C13'] * $req['D41'] + $req['F41'] : throw new ErrorException("error");
        $res['I47'] = isset($req['C41']) && isset($req['G41']) && isset($req['D41']) && isset($req['C12']) ? 1.2 * $req['C41'] + $req['C12'] * $req['D41'] + $req['G41'] : throw new ErrorException("error");
        $res['J47'] = max($res['C26'], $res['D26'], $res['E26'], $res['F26'], $res['G26'], $res['H26'], $res['I26']);
       
        // Distributed loads: SLS ------------------------------------/////
        $res['C52'] = isset($req['C41']) && isset($req['C11']) && isset($req['D41']) ? $req['C41'] + $req['C11'] * $req['D41']  : throw new ErrorException("error"); 

        // Point loads2.1 ------------------------------------/////
        $res['C14any'] =  $res['J26']  ; 
        $res['C15any'] =  $res['J27']  ; 
        $res['C16any'] =  $res['J28']  ; 
        $res['C17any'] =  $res['J29']  ; 
        $res['D14any'] =  $res['C33']  ; 
        $res['D15any'] =  $res['C34']  ; 
        $res['D16any'] =  $res['C35']  ; 
        $res['D17any'] =  $res['C36']  ; 
        
        $res['F14any'] = isset($req['E14any']) && isset($req['C7any']) 
        ? ($req['E14any'] == 0 ? 0 : $req['C7any'] - $req['E14any']) 
        : throw new ErrorException("error");
        $res['F15any'] = isset($req['E15any']) && isset($req['C7any']) 
        ? ($req['E15any'] == 0 ? 0 : $req['C7any'] - $req['E15any']) 
        : throw new ErrorException("error");
        $res['F16any'] = isset($req['E16any']) && isset($req['C7any']) 
        ? ($req['E16any'] == 0 ? 0 : $req['C7any'] - $req['E16any']) 
        : throw new ErrorException("error");
        $res['F17any'] = isset($req['E17any']) && isset($req['C7any']) 
        ? ($req['E17any'] == 0 ? 0 : $req['C7any'] - $req['E17any']) 
        : throw new ErrorException("error");

        // Distributed loads 2.2 ------------------------------------/////
        $res['D21any'] =  $res['J47']  ; 
        $res['D22any'] =  $res['C52']  ; 
        // Perform calculations or any data processing here

        // Pass data to view (or JSON response if needed)
        return $this->response->setJSON($res);
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
