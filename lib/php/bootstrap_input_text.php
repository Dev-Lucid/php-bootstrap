<?php

if(!class_exists('bootstrap_input'))
{
    include(__DIR__.'/bootstrap_input.php');
}

class bootstrap_input_text extends bootstrap_input
{
    public $attributes = [
        'type'=>'text',
        'class'=>['form-control'=>true]
    ];
}

?>