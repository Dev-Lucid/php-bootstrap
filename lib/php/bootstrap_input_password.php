<?php

if(!class_exists('bootstrap_input'))
{
    include(__DIR__.'/bootstrap_input.php');
}

class bootstrap_input_password extends bootstrap_input
{
    public $attributes = [
        'type'=>'password',
        'class'=>['form-control'=>true]
    ];
}

?>