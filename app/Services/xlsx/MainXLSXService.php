<?php

namespace App\Services\xlsx;

use Exception;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class MainXLSXService
{
    private Spreadsheet $sheet;
    private string $file;

    public function __construct($filePath)
    {
        $this->sheet = new Spreadsheet;
        $this->file = $filePath;
    }

    /**
     * В случае успеха возвращает лист xlsx докумена из файла по переданному пути
     * 
     * @return Worksheet | false
     */
    public function readFile(): Worksheet
    {
        if(!file_exists($this->file)) {
            throw new \Exception("Файл по такому пути: $this->file отсутствует!");
        }
        
        $isXLSX = pathinfo($this->file, PATHINFO_EXTENSION) === 'xlsx';
        if(!$isXLSX) {
            throw new \Exception("Файл имеет не верное расширение! поддерживается только формат .xlsx");
        }

        try {
            $spreadsheet = IOFactory::load($this->file);
            $sheet = $spreadsheet->getActiveSheet();
        } catch (\Exception $e) {
            throw  new \Exception('Ошибка при чтении файла!');
        }
        return $sheet;
    }

    /**
     * В случае успеха возвращает массив из первой строки файла либо false
     * @return array | false 
     */
    public function getTitles(): array | false
    {
        $sheet = $this->getContent();
        return $sheet[1];
    }

    /**
     * @param bool $generate default true - вовзвращает функцию генератор false - возвращает массив
     * @param bool $full default false - убирает первую строку true - возращает полный файл
     */
    public function getValues($generate = true, $full = false): \Generator | array | false
    {
        $sheet = $this->getContent();

        if($generate) {
           return $this->getValuesGenerator($sheet, $full);
        } else {
            if(!$full) {
                unset($sheet[1]);
            }
            $sheet = array_values($sheet);
            return $sheet;
        }
    }

    private function getValuesGenerator(array $sheet, $full): \Generator
    {
        foreach ($sheet as $key => $value) {
                if($full) {
                    yield $value;
                } else {
                    $full = true;
                }
            }
    }

    /**
     * В случае успеха возвращает строки файла в виде массивов 
     * По умолчанию массив асоциативный с ячейками файла
     * @param bool $assoc
     * @return array | false
     */
    private function getContent($assoc = true): array
    {
        $sheet = $this->readFile()->toArray(null, true, true, $assoc);
        if(empty($sheet)) {
            throw new \Exception("Файл $this->file пустой");
        }
        return $sheet;
    }

}
