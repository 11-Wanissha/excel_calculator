<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as Writer;
use App\Libraries\MainLib;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    private function renderExcel(array $menus, array $dataset)
    {
        $spreadsheet = new Spreadsheet();
        $lib = new MainLib();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->getColumnDimension('A')->setWidth(20.0);
        foreach (range('B', 'Z') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        $sheet->getStyle('B:Z')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        $loopIndex = 1;
        $alphabet = range('A', 'Z');
        $types = ['text', 'table', 'dropdown'];

        foreach ($menus as $index => $menu) {
            if (!isset($menu['input'])) continue;

            if ($index != 0) $loopIndex++;

            $sheet->setCellValue("A{$loopIndex}", $menu['menuTitle'] ?? '-');
            $sheet->getStyle("A{$loopIndex}:Z{$loopIndex}")
                ->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FFD0E0D0');
            $sheet->getStyle("A{$loopIndex}")->getFont()->setBold(true);

            $loopIndex++;

            foreach ($menu['input'] as $inputIndex => $input) {

                if (!isset($input['inputType']) || !in_array($input['inputType'], $types)) continue;

                switch ($input['inputType']) {
                    case $types[0]:
                        if (!isset($input['id'])) break;

                        $finalData = isset($dataset[$input['id']]) ? $dataset[$input['id']] : null;

                        if (!isset($finalData)) {
                            $type = isset($input['type']) ? $input['type'] : '';

                            switch ($type) {
                                case 'checkbox':
                                    $finalData = 'false';
                                    break;
                                case 'number':
                                    $finalData = '0';
                                    break;
                                default:
                                    $finalData = '-';
                                    break;
                            }
                        } else {
                            $type = isset($input['type']) ? $input['type'] : '';

                            if ($type == 'checkbox') $finalData = 'true';
                        }

                        $sheet->setCellValue("A{$loopIndex}", $input['label'] ?? '-');
                        $sheet->setCellValue("B{$loopIndex}", $finalData);
                        break;

                    case $types[1]:
                        $alphabetIndex = 0;
                        $loopIndex++;

                        if (isset($input['column'])) {
                            foreach ($input['column'] as $index => $col) {
                                $sheet->setCellValue("{$alphabet[$alphabetIndex]}{$loopIndex}", $col['label']);
                                $styles = $sheet->getStyle("{$alphabet[$alphabetIndex]}{$loopIndex}");
                                $styles->getFont()->setBold(true);
                                $styles->getBorders()->applyFromArray([
                                    'allBorders' => [
                                        'borderStyle' => Border::BORDER_THIN,
                                        'color' => ['argb' => 'FF000000'],
                                    ],
                                ]);
                                $alphabetIndex++;
                            }
                        }

                        $alphabetIndex = 0;

                        if (isset($input['row'])) {
                            foreach ($input['row'] as $index => $row) {
                                $alphabetIndex = 0;
                                $loopIndex++;

                                foreach ($row as $key => $cell) {
                                    $id = $lib->getTableCellId($cell, 'text');

                                    if ($id == '') {
                                        $sheet->setCellValue("{$alphabet[$alphabetIndex]}{$loopIndex}", $cell[0]['text']);
                                        $styles = $sheet->getStyle("{$alphabet[$alphabetIndex]}{$loopIndex}");
                                        $styles->getBorders()->applyFromArray([
                                            'allBorders' => [
                                                'borderStyle' => Border::BORDER_THIN,
                                                'color' => ['argb' => 'FF000000'],
                                            ],
                                        ]);
                                        $alphabetIndex++;
                                        continue;
                                    }

                                    if (!isset($dataset[$id])) {
                                        $alphabetIndex++;
                                        continue;
                                    }

                                    $styles = $sheet->getStyle("{$alphabet[$alphabetIndex]}{$loopIndex}");
                                    $styles->getBorders()->applyFromArray([
                                        'allBorders' => [
                                            'borderStyle' => Border::BORDER_THIN,
                                            'color' => ['argb' => 'FF000000'],
                                        ],
                                    ]);
                                    $sheet->setCellValue("{$alphabet[$alphabetIndex]}{$loopIndex}", $dataset[$id]);
                                    $alphabetIndex++;
                                }
                            }
                        }
                        break;

                    case $types[2]:
                        if (!isset($input['id']) || !isset($input['option'])) break;

                        $value = isset($dataset[$input['id']]) ? $lib->getDropdownCellValue($input['option'], $dataset[$input['id']]) : '-';

                        $sheet->setCellValue("A{$loopIndex}", $input['label'] ?? '-');
                        $sheet->setCellValue("B{$loopIndex}", $value ?? '-');
                        break;

                    default:
                        $loopIndex++;
                }

                $loopIndex++;
            }

            $hasSubMenu = isset($menu['subMenu']);

            if ($hasSubMenu) {
                foreach ($menu['subMenu'] as $subMenu) {
                    if ($index != 0) $loopIndex++;

                    $sheet->setCellValue("A{$loopIndex}", $subMenu['subMenuTitle'] ?? '-');
                    $sheet->getStyle("A{$loopIndex}:Z{$loopIndex}")
                        ->getFill()
                        ->setFillType(Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FFD0E0D0');
                    $sheet->getStyle("A{$loopIndex}")->getFont()->setBold(true);

                    $loopIndex++;
                    foreach ($subMenu['input'] as $input) {
                        if (!isset($input['inputType'])) continue;

                        $types = ['text', 'table', 'dropdown'];

                        switch ($input['inputType']) {
                            case $types[0]:
                                if (!isset($input['id'])) break;

                                $finalData = isset($dataset[$input['id']]) ? $dataset[$input['id']] : null;

                                if (!isset($finalData)) {
                                    $type = isset($input['type']) ? $input['type'] : '';

                                    switch ($type) {
                                        case 'checkbox':
                                            $finalData = 'false';
                                            break;
                                        case 'number':
                                            $finalData = '0';
                                            break;
                                        default:
                                            $finalData = '-';
                                            break;
                                    }
                                } else {
                                    $type = isset($input['type']) ? $input['type'] : '';

                                    if ($type == 'checkbox') $finalData = 'true';
                                }

                                $sheet->setCellValue("A{$loopIndex}", $input['label'] ?? '-');
                                $sheet->setCellValue("B{$loopIndex}", $finalData);
                                break;

                            case $types[1]:
                                $alphabetIndex = 0;
                                $loopIndex++;

                                if (isset($input['column'])) {
                                    foreach ($input['column'] as $index => $col) {
                                        $sheet->setCellValue("{$alphabet[$alphabetIndex]}{$loopIndex}", $col['label']);
                                        $styles = $sheet->getStyle("{$alphabet[$alphabetIndex]}{$loopIndex}");
                                        $styles->getFont()->setBold(true);
                                        $styles->getBorders()->applyFromArray([
                                            'allBorders' => [
                                                'borderStyle' => Border::BORDER_THIN,
                                                'color' => ['argb' => 'FF000000'],
                                            ],
                                        ]);
                                        $alphabetIndex++;
                                    }
                                }

                                $alphabetIndex = 0;

                                if (isset($input['row'])) {
                                    foreach ($input['row'] as $index => $row) {
                                        $alphabetIndex = 0;
                                        $loopIndex++;

                                        foreach ($row as $key => $cell) {
                                            $id = $lib->getTableCellId($cell, 'text');

                                            if ($id == '') {
                                                $sheet->setCellValue("{$alphabet[$alphabetIndex]}{$loopIndex}", $cell[0]['text']);
                                                $styles = $sheet->getStyle("{$alphabet[$alphabetIndex]}{$loopIndex}");
                                                $styles->getBorders()->applyFromArray([
                                                    'allBorders' => [
                                                        'borderStyle' => Border::BORDER_THIN,
                                                        'color' => ['argb' => 'FF000000'],
                                                    ],
                                                ]);
                                                $alphabetIndex++;
                                                continue;
                                            }

                                            if (!isset($dataset[$id])) {
                                                $alphabetIndex++;
                                                continue;
                                            }

                                            $styles = $sheet->getStyle("{$alphabet[$alphabetIndex]}{$loopIndex}");
                                            $styles->getBorders()->applyFromArray([
                                                'allBorders' => [
                                                    'borderStyle' => Border::BORDER_THIN,
                                                    'color' => ['argb' => 'FF000000'],
                                                ],
                                            ]);
                                            $sheet->setCellValue("{$alphabet[$alphabetIndex]}{$loopIndex}", $dataset[$id]);
                                            $alphabetIndex++;
                                        }
                                    }
                                }
                                break;

                            case $types[2]:
                                if (!isset($input['id']) || !isset($input['option'])) break;

                                $value = isset($dataset[$input['id']]) ? $lib->getDropdownCellValue($input['option'], $dataset[$input['id']]) : '-';

                                $sheet->setCellValue("A{$loopIndex}", $input['label'] ?? '-');
                                $sheet->setCellValue("B{$loopIndex}", $value ?? '-');
                                break;

                            default:
                                $loopIndex++;
                        }

                        $loopIndex++;
                    }
                }
            }
        }
        return $spreadsheet;
    }

    public function defaultExportInterface($fromProperties, $exportData, $title = 'reported')
    {
        $lib = new MainLib();
        $combinedMenu = $lib->combineArray('menu', $fromProperties['secTion']);

        $spreadsheet = $this->renderExcel($combinedMenu, $exportData);

        $writer = new Writer($spreadsheet);

        $tempFile = tempnam(sys_get_temp_dir(), 'temp');
        $writer->save($tempFile);

        $fileContents = file_get_contents($tempFile);

        $base64 = base64_encode($fileContents);

        unlink($tempFile);

        header('Content-Type: application/json');

        return json_encode([
            'filename' => "{$title}.xlsx",
            'content' => $base64,
        ]);
    }
}
