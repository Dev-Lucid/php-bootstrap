<?php


class bootstrap_anchor extends bootstrap_element
{
    public $tag        = 'a';
    public $href = '';
    public $target = '';
    public $text = '';

    public function pre_render()
    {        
        $this->use_property_as_attribute('href');
        $this->use_property_as_attribute('target');

        if ($this->text !== '')
        {
            $this->add($this->text);
        }
        return '';
    }
}

?>