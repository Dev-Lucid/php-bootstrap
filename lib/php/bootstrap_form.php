<?php

class bootstrap_form extends bootstrap_element
{
    public $tag      = 'form';
    public $action   = '';
    public $onsubmit = '';
    public $name     = '';
    
    public function pre_render()
    {
        $this->use_property_as_attribute('action');
        $this->use_property_as_attribute('name');
        $this->use_property_as_attribute('onsubmit');
        return '';
    }
}

?>