<?php

if(!class_exists('bootstrap_input'))
{
    include(__DIR__.'/bootstrap_input.php');
}

class bootstrap_input_textarea extends bootstrap_input
{
    public $placeholder = null;
    public $tag = 'textarea';
    public $cols = 40;
    public $rows = 3;


    public function pre_render()
    {

        # inline forms need to sr-only class on the label.
        $label_attribs = '';
        $form = $this->find_form();
        if(!is_null($form) and $form->has_class('form-inline'))
        {
            $label_attribs = ' class="sr-only"';
        }

        $html = '';
        $html .= '<div class="form-group">';
        $html .= '<label for="'.$this->name.'"'.$label_attribs.'>'.$this->label.'</label>';

        $this->use_property_as_attribute('name');
        $this->use_property_as_attribute('rows','',3);
        $this->use_property_as_attribute('cols','',40);
        $this->attributes['placeholder'] = strip_tags($this->label);
        
        return $html;
    }

    public function post_render()
    {
        return '</div>';
    }
}

?>