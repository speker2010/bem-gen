<?php
namespace bem;

trait ConfigParser
{
    private $typeElement = 'ELEMENT';
    private $typeMod = 'MOD';
    private $typeMedia = 'MEDIA';
    private $typeStyle = 'STYLE';
    private $blockName;
    private $elementName;
    private $modName;

    public function parseConfig(array $config, string $blockName = null, string $elementName = null, string $modName = null)
    {
        $this->blockName = $blockName;
        $this->elementName = $elementName;
        $this->modName = $modName;
        foreach ($config as $name => $value) {
            $this->parceItem($name, $value);
        }
    }

    public function parceItem(string $name, $value)
    {
        $type = $this->_getFieldType($name);
        switch ($type) {
            case $this->typeElement:
                $this->_addElement($name, $value);
                break;
            case $this->typeStyle:
                $this->_addStyle($name, $value);
                break;
            case $this->typeMedia:
                $this->_addMedia($name, $value);
                break;
            case $this->typeMod:
                $this->_addMod($name, $value);
                break;
            default:
                throw new UnknownFieldType($name);
        }
    }

    private function _getFieldType(string $name) : string
    {
        if ($this->_testElement($name)) {
            return $this->typeElement;
        }
        if ($this->_testMod($name)) {
            return $this->typeMod;
        }
        if ($this->_testMedia($name)) {
            return $this->typeMedia;
        }
        return $this->typeStyle;
    }

    private function _testElement(string $name) : bool
    {
        return \mb_ereg_match('^__', $name);
    }

    private function _testMod(string $name) : bool
    {
        return \mb_ereg_match('^_', $name);
    }

    private function _testMedia(string $name) : bool
    {
        return \mb_ereg_match('^@', $name);
    }

    private function _addStyle(string $name, string $value)
    {
        $this->styles[] = new Style($name, $value);
    }

    private function _addMedia(string $name, array $value)
    {
        $this->media[] = new Media($name, $value, $this->blockName, $this->elementName, $this->modName);
        
    }

    private function _addMod(string $name, array $value)
    {
        $this->mods[] = new Mod($name, $value, $this->blockName, $this->elementName);
    }

    private function _addElement(string $name, array $value)
    {
        $this->elements[] = new Element($name, $value, $this->blockName);
    }
}