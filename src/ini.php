<?php

namespace ITEC\DAW\INTERFAZ;

use Exception;

class ini extends genericFile implements iconfig
{
    private array $dotini;

    public function __construct(string $fileName, string $content, bool $borrarFinal)
    {
        parent::__construct($fileName, $content, $borrarFinal);
        try {
            $this->dotini = parse_ini_string($content);
        } catch (Exception $exception) {
            printf('Unable to parse the INI string: %s', $exception->getMessage());
        }
    }

    public static function createINI(string $fileName, string $content, bool $borrarFinal)
    {
        return new ini($fileName, $content, $borrarFinal);
    }

    private function arr2ini(array $a, array $parent = array())
    {
        $out = '';
        foreach ($a as $k => $v) {
            if (is_array($v)) {
                $sec = array_merge((array) $parent, (array) $k);

                $out .= '[' . join('.', $sec) . ']' . PHP_EOL;

                $out .= $this->arr2ini($v, $sec);
            } else {

                $out .= "$k=$v" . PHP_EOL;
            }
        }
        return $out;
    }

    public function addVars($attribute, $value)
    {
        $this->dotini[$attribute] = $value;
        $this->writeFile($this->arr2ini($this->dotini));
    }

    public function removeVars(string $attribute)
    {
        unset($this->dotini[$attribute]);
        $this->writeFile($this->arr2ini($this->dotini));
    }

    public function modifyVars(string $attribute, $value)
    {
        $this->dotini[$attribute] = $value;
        $this->writeFile($this->arr2ini($this->dotini));
    }

    public function readVar(string $attribute): string
    {
        return $this->dotini[$attribute];
    }
}
