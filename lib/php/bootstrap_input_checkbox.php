<?php

class bootstrap_input_checkbox extends bootstrap_element
{
    public $tag    = 'input';
    public $value  = '';
    public $inline = false;

    public function pre_render()
    {
        $this->attributes['type'] = 'checkbox';
        $this->use_property_as_attribute('name');
        $this->use_property_as_attribute('value','','on');

        if($this->inline === true)
        {
            return '<label class="checkbox-inline">';        
        }
        else
        {
            return '<div class="checkbox"><label>';        
        }
    }

    public function post_render()
    {
        if($this->inline === true)
        {
            return $this->label.'</label>';
        }
        else
        {
             return $this->label.'</label></div>';
        }  
    }
}

?>