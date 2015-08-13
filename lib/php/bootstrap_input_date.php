<?php

if(!class_exists('bootstrap_input'))
{
    include(__DIR__.'/bootstrap_input.php');
}

class bootstrap_input_date extends bootstrap_input
{
    public $attributes = [
        'type'=>'date',
        'class'=>['form-control'=>true]
    ];
}
