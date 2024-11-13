<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Libraries\MainLib;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf; // or use Tcpdf
// or if you're using PhpSpreadsheet's IOFactory:
use PhpOffice\PhpSpreadsheet\IOFactory;

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

    /** 
     * Model for get form properties and required fields,
     * Be sure than model is extended from BaseModel
     */
    protected $model;
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

        $sheet->getColumnDimension('A')->setWidth(width: 25);
        foreach (range('B', 'Z') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        $sheet->getStyle('A:Z')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT)->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->setShowGridlines(false);

        $loopIndex = 1;
        $alphabet = range('A', 'Z');
        $types = ['text', 'table', 'dropdown'];

        foreach ($menus as $index => $menu) {
            if (!isset($menu['input']) && !isset($menu['canvas'])) continue;

            if ($index != 0) $loopIndex++;

            $sheet->mergeCells("A{$loopIndex}:H{$loopIndex}");
            $sheet->setCellValue("A{$loopIndex}", $menu['menuTitle'] ?? '-');
            $sheet->getStyle("A{$loopIndex}:I{$loopIndex}")
                ->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FFD0E0D0');
            $sheet->getStyle("A{$loopIndex}")->getFont()->setBold(true);

            $sheet->getStyle("I{$loopIndex}")
                ->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FFFFFFFF');

            $loopIndex++;

            if (isset($menu['canvas']) && isset($dataset['baseImage'])) {
                $loopIndex++;
                $base64Image = preg_replace('/^data:image\/\w+;base64,/', '', $dataset['baseImage']);
                $imageData = base64_decode($base64Image);

                if ($imageData === false) {
                    continue;
                }

                $uniqueId = uniqid();
                $tempDir = sys_get_temp_dir();
                $tempFile = $tempDir . DIRECTORY_SEPARATOR . 'img_' . $uniqueId . '.png';

                if (file_put_contents($tempFile, $imageData) === false) {
                    continue;
                }

                $sheet->mergeCells("A{$loopIndex}:D{$loopIndex}");

                $sheet->getStyle("A{$loopIndex}:D{$loopIndex}")->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER);

                $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                $drawing->setName('Image_' . $uniqueId);
                $drawing->setDescription('Exported Image');
                $drawing->setPath($tempFile);
                $drawing->setCoordinates("A{$loopIndex}");
                $drawing->setOffsetX(5);
                $drawing->setOffsetY(5);
                $drawing->setWidth(330);
                $drawing->setHeight(330);
                $drawing->setWorksheet($sheet);

                $sheet->getRowDimension($loopIndex)->setRowHeight(360);

                $loopIndex++;

                continue;
            }

            foreach ($menu['input'] as $inputIndex => $input) {

                if (!isset($input['inputType']) || !in_array($input['inputType'], $types)) continue;

                switch ($input['inputType']) {
                    case $types[0]:
                        if (!isset($input['id'])) break;

                        $unit = isset($input['unit']) ? $input['unit'] : null;
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

                        $sheet->setCellValue("A{$loopIndex}", $lib->convertHtmlToRichText($input['label']) ?? '-');
                        $sheet->setCellValue("B{$loopIndex}", $finalData);

                        if ($unit) {
                            $sheet->setCellValue("C{$loopIndex}", $lib->convertHtmlToRichText($unit));
                        }
                        break;

                    case $types[1]:
                        $alphabetIndex = 0;
                        $loopIndex++;

                        if (isset($input['column'])) {
                            foreach ($input['column'] as $index => $col) {
                                if ($alphabetIndex > 7) {
                                    $alphabetIndex = 0;
                                    // $loopIndex++;
                                }

                                $sheet->setCellValue("{$alphabet[$alphabetIndex]}{$loopIndex}", $lib->convertHtmlToRichText($col['label']));
                                $styles = $sheet->getStyle("{$alphabet[$alphabetIndex]}{$loopIndex}");
                                $styles->getFont()->setBold(true);
                                $styles->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
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
                                    if ($alphabetIndex > 7) {
                                        $alphabetIndex = 0;
                                        // $loopIndex++;
                                    }

                                    if ($id == '') {
                                        $sheet->setCellValue("{$alphabet[$alphabetIndex]}{$loopIndex}", $lib->convertHtmlToRichText($cell[0]['text']) ?? '0');
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

                                    /* if (!isset($dataset[$id])) {
                                        $alphabetIndex++;
                                        continue;
                                    } */

                                    $styles = $sheet->getStyle("{$alphabet[$alphabetIndex]}{$loopIndex}");
                                    $styles->getBorders()->applyFromArray([
                                        'allBorders' => [
                                            'borderStyle' => Border::BORDER_THIN,
                                            'color' => ['argb' => 'FF000000'],
                                        ],
                                    ]);
                                    $sheet->setCellValue("{$alphabet[$alphabetIndex]}{$loopIndex}", $dataset[$id] ?? '-');
                                    $alphabetIndex++;
                                }
                            }
                        }
                        break;

                    case $types[2]:
                        if (!isset($input['id']) || !isset($input['option'])) break;

                        $value = isset($dataset[$input['id']]) ? $lib->getDropdownCellValue($input['option'], $dataset[$input['id']]) : '-';

                        $sheet->setCellValue("A{$loopIndex}", $lib->convertHtmlToRichText($input['label']) ?? '-');
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

                    $sheet->mergeCells("A{$loopIndex}:H{$loopIndex}");
                    $sheet->setCellValue("A{$loopIndex}", $subMenu['subMenuTitle'] ?? '-');
                    $sheet->getStyle("A{$loopIndex}:I{$loopIndex}")
                        ->getFill()
                        ->setFillType(Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FFD0E0D0');
                    $sheet->getStyle("A{$loopIndex}")->getFont()->setBold(true);

                    $sheet->getStyle("I{$loopIndex}")
                        ->getFill()
                        ->setFillType(Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FFFFFFFF');

                    $loopIndex++;

                    foreach ($menu['input'] as $inputIndex => $input) {

                        if (!isset($input['inputType']) || !in_array($input['inputType'], $types)) continue;

                        switch ($input['inputType']) {
                            case $types[0]:
                                if (!isset($input['id'])) break;

                                $unit = isset($input['unit']) ? $input['unit'] : null;
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

                                $sheet->setCellValue("A{$loopIndex}", $lib->convertHtmlToRichText($input['label']) ?? '-');
                                $sheet->setCellValue("B{$loopIndex}", $finalData);

                                if ($unit) {
                                    $sheet->setCellValue("C{$loopIndex}", $lib->convertHtmlToRichText($unit));
                                }
                                break;

                            case $types[1]:
                                $alphabetIndex = 0;
                                $loopIndex++;

                                if (isset($input['column'])) {
                                    foreach ($input['column'] as $index => $col) {
                                        if ($alphabetIndex > 7) {
                                            $alphabetIndex = 0;
                                            // $loopIndex++;
                                        }

                                        $sheet->setCellValue("{$alphabet[$alphabetIndex]}{$loopIndex}", $lib->convertHtmlToRichText($col['label']));
                                        $styles = $sheet->getStyle("{$alphabet[$alphabetIndex]}{$loopIndex}");
                                        $styles->getFont()->setBold(true);
                                        $styles->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
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
                                            if ($alphabetIndex > 7) {
                                                $alphabetIndex = 0;
                                                // $loopIndex++;
                                            }

                                            if ($id == '') {
                                                $sheet->setCellValue("{$alphabet[$alphabetIndex]}{$loopIndex}", $lib->convertHtmlToRichText($cell[0]['text']) ?? '0');
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

                                            /* if (!isset($dataset[$id])) {
                                                $alphabetIndex++;
                                                continue;
                                            } */

                                            $styles = $sheet->getStyle("{$alphabet[$alphabetIndex]}{$loopIndex}");
                                            $styles->getBorders()->applyFromArray([
                                                'allBorders' => [
                                                    'borderStyle' => Border::BORDER_THIN,
                                                    'color' => ['argb' => 'FF000000'],
                                                ],
                                            ]);
                                            $sheet->setCellValue("{$alphabet[$alphabetIndex]}{$loopIndex}", $dataset[$id] ?? '-');
                                            $alphabetIndex++;
                                        }
                                    }
                                }
                                break;

                            case $types[2]:
                                if (!isset($input['id']) || !isset($input['option'])) break;

                                $value = isset($dataset[$input['id']]) ? $lib->getDropdownCellValue($input['option'], $dataset[$input['id']]) : '-';

                                $sheet->setCellValue("A{$loopIndex}", $lib->convertHtmlToRichText($input['label']) ?? '-');
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

        $highestRow = $sheet->getHighestRow();

        foreach (range('1', $highestRow) as $row) {
            $sheet->getRowDimension($row)->setRowHeight(height: 20);
        }

        $sheet->getStyle("A1:H{$highestRow}")->getFont()->setName('DejaVu Sans')->setSize(9);

        return $spreadsheet;
    }

    public function defaultExportInterface($fromProperties, $exportData, $title = 'reported')
    {
        $lib = new MainLib();
        $combinedMenu = $lib->combineArray('menu', $fromProperties['secTion']);

        $spreadsheet = $this->renderExcel($combinedMenu, $exportData);

        IOFactory::registerWriter('Pdf', writerClass: Mpdf::class);

        $writer = IOFactory::createWriter($spreadsheet, 'Pdf');

        // $writer->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // $writer->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

        // Save to temp file
        $tempFile = tempnam(sys_get_temp_dir(), 'pdf_');
        $writer->save($tempFile);

        $fileContents = file_get_contents($tempFile);
        $base64 = base64_encode($fileContents);

        unlink($tempFile);

        return json_encode([
            'filename' => "{$title}.pdf",
            'content' => $base64,
        ]);
    }
}
