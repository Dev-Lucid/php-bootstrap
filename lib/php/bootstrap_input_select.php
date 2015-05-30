<?php

if(!class_exists('bootstrap_input'))
{
    include(__DIR__.'/bootstrap_input.php');
}

class bootstrap_input_select extends bootstrap_input
{
    public $tag = 'select';
    public $data = [];
    public $value_field = 'id';
    public $label_field = 'name';
    public $options = '';
    public $blank   = true;
    public $attributes = [
        'type'=>'text',
        'class'=>['form-control'=>true]
    ];

    function pre_render()
    {
        $html = parent::pre_render();

        if ($this->blank === true)
        {
            $this->options .= '<option value=""></option>';
        }

        $value_field = $this->value_field;
        $label_field = $this->label_field;
        foreach($this->data as $data)
        {
            if(is_array($data))
            {
                $this->options .= '<option value="'.$data[$value_field].'">'.$data[$label_field].'</option>';
            }
            else
            {
                $this->options .= '<option value="'.$data->$value_field.'">'.$data->$label_field.'</option>';
            }
        }
        $this->add($this->options);

        return $html;
    }
}

?>