<?php

namespace ITEC\DAW\INTERFAZ;

use Exception;

class csv extends genericFile implements iconfig
{
    private array $dotcsv;

    public function __construct(string $fileName, string $content, bool $borrarFinal)
    {
        parent::__construct($fileName, $content, $borrarFinal);
        try {
            $this->dotcsv = str_getcsv($content);
        } catch (Exception $exception) {
            printf('Unable to parse the CSV string: %s', $exception->getMessage());
        }
    }

    private function array2csv(array $array):string{
        return implode(",",$array);
    }

    public static function createCSV(string $fileName, string $content, bool $borrarFinal)
    {
        return new csv($fileName, $content, $borrarFinal);
    }

    public function addVars($attribute, $value)
    {
        $this->dotcsv[$attribute] = $value;
        $this->writeFile($this->array2csv($this->dotcsv));
    }

    public function removeVars(string $attribute)
    {
        unset($this->dotcsv[$attribute]);
        $this->writeFile($this->array2csv($this->dotcsv));
    }

    public function modifyVars(string $attribute, $value)
    {
        $this->dotcsv[$attribute] = $value;
        $this->writeFile($this->array2csv($this->dotcsv));
    }

    public function readVar(string $attribute): string
    {
        return $this->dotcsv[$attribute];
    }
}
