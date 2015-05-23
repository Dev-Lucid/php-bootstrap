<?php


class bootstrap_anchor extends bootstrap_element
{
    public $tag    = 'a';
    public $href   = '';
    public $target = '';
    public $text   = '';
    public $active = false;

    public function pre_render()
    {        
        $this->use_property_as_attribute('href');
        $this->use_property_as_attribute('target');
        if ($this->active === true)
        {
            $this->add_class('active');
        }

        if ($this->text !== '')
        {
            $this->children[0] = $this->text;
        }
        return '';
    }
}

?>