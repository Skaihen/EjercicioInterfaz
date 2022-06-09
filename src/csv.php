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

    public static function createCSV(string $fileName, string $content, bool $borrarFinal)
    {
        return new csv($fileName, $content, $borrarFinal);
    }

    public function addVars($attribute, $value)
    {
        $this->dotcsv[$attribute] = $value;
        $this->writeFile(str_replace("=", ",", http_build_query($this->dotcsv, '', '\n')));
    }

    public function removeVars(string $attribute)
    {
        unset($this->dotcsv[$attribute]);
        $this->writeFile(str_replace("=", ",", http_build_query($this->dotcsv, '', '\n')));
    }

    public function modifyVars(string $attribute, $value)
    {
        $this->dotcsv[$attribute] = $value;
        $this->writeFile(str_replace("=", ",", http_build_query($this->dotcsv, '', '\n')));
    }

    public function readVar(string $attribute): string
    {
        return $this->dotcsv[$attribute];
    }
}
