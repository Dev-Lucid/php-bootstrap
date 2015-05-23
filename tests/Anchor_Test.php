<?php

include_once(__DIR__.'/../lib/php/bootstrap.php');

class anchor_test extends PHPUnit_Framework_TestCase
{
    public function test_basic_href()
    {
        $anchor = bs::anchor(['href'=>'www.testing.com'])->add('basic link');
        $this->assertEquals('<a href="www.testing.com">basic link</a>',$anchor->render());
    }

    public function test_text_in_config()
    {
        $anchor = bs::anchor(['href'=>'www.testing.com','text'=>'basic link']);
        $this->assertEquals('<a href="www.testing.com">basic link</a>',$anchor->render());
    }

    public function test_active_class()
    {
        $anchor = bs::anchor(['href'=>'www.testing.com','text'=>'basic link','active'=>true]);
        $this->assertEquals('<a class="active" href="www.testing.com">basic link</a>',$anchor->render());
    }

    public function test_target()
    {
        $anchor = bs::anchor(['href'=>'www.testing.com','text'=>'basic link','target'=>'_blank']);
        $this->assertEquals('<a href="www.testing.com" target="_blank">basic link</a>',$anchor->render());
    }
}

?>