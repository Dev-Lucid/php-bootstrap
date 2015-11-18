<?php

include_once(__DIR__.'/../lib/php/bootstrap.php');

class badge_test extends PHPUnit_Framework_TestCase
{
    public function test_basic_badge()
    {
        $badge = bs::badge(3);
        $this->assertEquals('<span class="badge">3</span>',$badge->render());
    }

}

?>