<?php

include_once(__DIR__.'/../lib/php/bootstrap.php');

class label_test extends PHPUnit_Framework_TestCase
{
    public function test_basic_label()
    {
        $label = bs::label()->add('basic label');
        $this->assertEquals('<span class="label label-default">basic label</span>',$label->render());
    }

    public function test_modified_label()
    {
        $label = bs::label(['modifier'=>'warning'])->add('warning label');
        $this->assertEquals('<span class="label label-warning">warning label</span>',$label->render());
    }


    public function test_text_parameter_label()
    {
        $label = bs::label(['modifier'=>'danger', 'text'=>'danger label']);
        $this->assertEquals('<span class="label label-danger">danger label</span>',$label->render());
    }

}

?>