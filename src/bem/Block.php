<?php
namespace bem;

class Block
{
    use ConfigParser;
    

    private $_name = '';
    public $styles = [];
    public $mods = [];
    public $media = [];
    public $elements = [];

    public function __construct(string $name, array $config)
    {
        $this->_name = $name;
        $this->parseConfig($config, $this->_name);
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
        $mods = '';
        foreach ($this->mods as $mode) {
            $mods .= "$mode";
        }
        $elements = '';
        foreach ($this->elements as $element) {
            $elements .= "$element";
        }
        return ".{$this->_name} {\n{$styleRules}}{$media}{$mods}{$elements}\n";
    }
}