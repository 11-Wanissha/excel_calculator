<?php

namespace App\Libraries;

use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExportService
{
    private const SUPPORTED_INPUT_TYPES = ['text', 'table', 'dropdown'];
    private const MAX_COLUMNS = 8;
    private const DEFAULT_CELL_HEIGHT = 20;
    private const DEFAULT_FONT_SIZE = 9;
    private const HEADER_BACKGROUND_COLOR = 'FFD0E0D0';

    private Spreadsheet $spreadsheet;
    private $sheet;
    private MainLib $lib;
    private array $alphabet;
    private int $currentRow = 1;

    public function __construct()
    {
        $this->spreadsheet = new Spreadsheet();
        $this->sheet = $this->spreadsheet->getActiveSheet();
        $this->lib = new MainLib();
        $this->alphabet = range('A', 'Z');
        $this->initializeSheet();
    }

    private function initializeSheet(): void
    {
        $this->sheet->getColumnDimension('A')->setWidth(25);
        foreach (range('B', 'Z') as $column) {
            $this->sheet->getColumnDimension($column)->setAutoSize(true);
        }

        $this->sheet->getStyle('A:Z')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_LEFT)
            ->setVertical(Alignment::VERTICAL_CENTER);
        $this->sheet->setShowGridlines(false);
    }

    public function exportToPdf(array $fromProperties, array $exportData, string $title = 'reported'): string
    {
        $lib = new MainLib();
        $combinedMenu = $lib->combineArray('menu', $fromProperties['secTion']);

        $this->renderExcel($combinedMenu, $exportData);

        return $this->generatePdf($title);
    }

    private function renderExcel(array $menus, array $dataset): void
    {
        foreach ($menus as $menu) {
            if (!isset($menu['input']) && !isset($menu['canvas'])) {
                continue;
            }

            $this->renderMenuHeader($menu['menuTitle'] ?? '-');

            if (isset($menu['canvas']) && isset($dataset['baseImage'])) {
                $this->renderCanvasImage($dataset['baseImage']);
                continue;
            }

            $this->renderMenuInputs($menu['input'], $dataset);

            if (isset($menu['subMenu'])) {
                $this->renderSubMenus($menu['subMenu'], $menu['input'], $dataset);
            }
        }

        $this->applyFinalFormatting();
    }

    private function renderSubMenus(array $subMenus, array $parentInputs, array $dataset): void
    {
        foreach ($subMenus as $subMenu) {
            $this->currentRow++;

            $this->renderMenuHeader($subMenu['subMenuTitle'] ?? '-');

            $this->renderMenuInputs($parentInputs, $dataset);
        }
    }

    private function renderMenuHeader(string $title): void
    {
        $this->currentRow++;
        $this->sheet->mergeCells("A{$this->currentRow}:H{$this->currentRow}");
        $this->sheet->setCellValue("A{$this->currentRow}", $title);

        $this->sheet->getStyle("A{$this->currentRow}:I{$this->currentRow}")
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB(self::HEADER_BACKGROUND_COLOR);

        $this->sheet->getStyle("A{$this->currentRow}")->getFont()->setBold(true);
        $this->sheet->getStyle("I{$this->currentRow}")
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFFFFFFF');

        $this->currentRow++;
    }

    private function renderCanvasImage(string $base64Image): void
    {
        $this->currentRow++;
        $imageData = $this->processBase64Image($base64Image);

        if (!$imageData) {
            return;
        }

        $tempFile = $this->saveTempImage($imageData);
        if (!$tempFile) {
            return;
        }

        $this->insertImage($tempFile);
        $this->currentRow += 2;
    }

    private function processBase64Image(string $base64Image): string|false
    {
        $base64Image = preg_replace('/^data:image\/\w+;base64,/', '', $base64Image);
        return base64_decode($base64Image);
    }

    private function saveTempImage(string $imageData): string|false
    {
        $tempFile = tempnam(sys_get_temp_dir(), 'img_') . '.png';
        return file_put_contents($tempFile, $imageData) !== false ? $tempFile : false;
    }

    private function insertImage(string $tempFile): void
    {
        $this->sheet->mergeCells("A{$this->currentRow}:D{$this->currentRow}");
        $this->sheet->getStyle("A{$this->currentRow}:D{$this->currentRow}")
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);

        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setPath($tempFile);
        $drawing->setName('Image_' . uniqid())
            ->setDescription('Exported Image')
            ->setCoordinates("A{$this->currentRow}")
            ->setOffsetX(5)
            ->setOffsetY(5)
            ->setWidth(330)
            ->setHeight(330)
            ->setWorksheet($this->sheet);

        $this->sheet->getRowDimension($this->currentRow)->setRowHeight(360);
    }

    private function renderMenuInputs(array $inputs, array $dataset): void
    {
        foreach ($inputs as $input) {
            if (!$this->isValidInput($input)) {
                continue;
            }

            $this->renderInput($input, $dataset);
        }
    }

    private function isValidInput(array $input): bool
    {
        return isset($input['inputType']) && in_array($input['inputType'], self::SUPPORTED_INPUT_TYPES);
    }

    private function renderInput(array $input, array $dataset): void
    {
        switch ($input['inputType']) {
            case 'text':
                $this->renderTextInput($input, $dataset);
                break;
            case 'table':
                $this->renderTableInput($input, $dataset);
                break;
            case 'dropdown':
                $this->renderDropdownInput($input, $dataset);
                break;
        }
        $this->currentRow++;
    }

    private function renderTextInput(array $input, array $dataset): void
    {
        if (!isset($input['id'])) {
            return;
        }

        $finalData = $this->getTextInputValue($input, $dataset);

        $this->sheet->setCellValue("A{$this->currentRow}", $this->lib->convertHtmlToRichText($input['label']) ?? '-');
        $this->sheet->setCellValue("B{$this->currentRow}", $finalData);

        if (isset($input['unit'])) {
            $this->sheet->setCellValue("C{$this->currentRow}", $this->lib->convertHtmlToRichText($input['unit']));
        }
    }

    private function getTextInputValue(array $input, array $dataset): string
    {
        if (isset($dataset[$input['id']])) {
            return $input['type'] === 'checkbox' ? 'true' : $dataset[$input['id']];
        }

        return match ($input['type'] ?? '') {
            'checkbox' => 'false',
            'number' => '0',
            default => '-'
        };
    }

    private function renderTableInput(array $input, array $dataset): void
    {
        $this->currentRow++;

        if (isset($input['column'])) {
            $this->renderTableHeader($input['column']);
        }

        if (isset($input['row'])) {
            $this->renderTableRows($input['row'], $dataset);
        }
    }

    private function renderTableHeader(array $columns): void
    {
        foreach ($columns as $index => $col) {
            if ($index >= self::MAX_COLUMNS) {
                break;
            }

            $column = $this->alphabet[$index];
            $this->sheet->setCellValue("{$column}{$this->currentRow}", $this->lib->convertHtmlToRichText($col['label']));
            $this->applyTableHeaderStyle($column);
        }
    }

    private function applyTableHeaderStyle(string $column): void
    {
        $style = $this->sheet->getStyle("{$column}{$this->currentRow}");
        $style->getFont()->setBold(true);
        $style->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $style->getBorders()->applyFromArray([
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => 'FF000000'],
            ],
        ]);
    }

    private function renderTableRows(array $rows, array $dataset): void
    {
        foreach ($rows as $row) {
            $this->currentRow++;
            $this->renderTableRow($row, $dataset);
        }
    }

    private function renderTableRow(array $row, array $dataset): void
    {
        foreach ($row as $index => $cell) {
            if ($index >= self::MAX_COLUMNS) {
                break;
            }

            $column = $this->alphabet[$index];
            $id = $this->lib->getTableCellId($cell, 'text');

            $value = $id === '' ?
                ($this->lib->convertHtmlToRichText($cell[0]['text']) ?? '0') : ($dataset[$id] ?? '-');

            $this->sheet->setCellValue("{$column}{$this->currentRow}", $value);
            $this->applyTableCellStyle($column);
        }
    }

    private function applyTableCellStyle(string $column): void
    {
        $this->sheet->getStyle("{$column}{$this->currentRow}")
            ->getBorders()
            ->applyFromArray([
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ]);
    }

    private function renderDropdownInput(array $input, array $dataset): void
    {
        if (!isset($input['id']) || !isset($input['option'])) {
            return;
        }

        $value = isset($dataset[$input['id']]) ?
            $this->lib->getDropdownCellValue($input['option'], $dataset[$input['id']]) :
            '-';

        $this->sheet->setCellValue("A{$this->currentRow}", $this->lib->convertHtmlToRichText($input['label']) ?? '-');
        $this->sheet->setCellValue("B{$this->currentRow}", $value ?? '-');
    }

    private function applyFinalFormatting(): void
    {
        $highestRow = $this->sheet->getHighestRow();

        foreach (range(1, $highestRow) as $row) {
            $this->sheet->getRowDimension($row)->setRowHeight(self::DEFAULT_CELL_HEIGHT);
        }

        $this->sheet->getStyle("A1:H{$highestRow}")
            ->getFont()
            ->setName('DejaVu Sans')
            ->setSize(self::DEFAULT_FONT_SIZE);
    }

    private function generatePdf(string $title): string
    {
        IOFactory::registerWriter('Pdf', Mpdf::class);
        $writer = IOFactory::createWriter($this->spreadsheet, 'Pdf');

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
