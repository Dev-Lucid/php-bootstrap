<?php

class bootstrap_input_radio extends bootstrap_element
{
    public $tag    = 'input';
    public $value  = '';
    public $inline = false;

    public function pre_render()
    {
        $this->attributes['type'] = 'radio';
        $this->use_property_as_attribute('name');
        $this->use_property_as_attribute('value');

        if($this->inline === true)
        {
            return '<label class="radio-inline">';        
        }
        else
        {
            return '<div class="radio"><label>';        
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