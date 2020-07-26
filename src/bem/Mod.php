<?php
namespace bem;

class Mod
{
    use ConfigParser;

    private $_name;
    public $styles = [];
    public $media = [];
    private $blockName;
    private $elementName;

    public function __construct(string $name, array $config, string $blockName, string $elementName = null)
    {
        $this->_name = $name;
        $this->blockName = $blockName;
        $this->elementName = $elementName;
        $this->parseConfig($config, $this->blockName, $this->elementName, $this->_name);
    }

    public function __toString()
    {
        $styleRules = '';
        foreach ($this->styles as $style) {
            $styleRules .= $style;
        }

        $media = '';
        foreach ($this->media as $query) {
            $media .= $query;
        }
        return ".{$this->blockName}{$this->elementName}{$this->_name}{{$styleRules}}{$media}\n";
    }
}