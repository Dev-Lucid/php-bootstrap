<?php

if(!class_exists('bootstrap_input'))
{
    include(__DIR__.'/bootstrap_input.php');
}

class bootstrap_input_email extends bootstrap_input
{
    public $attributes = [
        'type'=>'email',
        'class'=>['form-control'=>true]
    ];
}

?>