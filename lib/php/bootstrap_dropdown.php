<?php


class bootstrap_dropdown extends bootstrap_element
{
    public $tag          = 'ul';
    public $attributes   = [
        'role'=>'menu',
        'class'=>['dropdown-menu'=>true],
    ];

    public function pre_child($child)
    {
        $html = '<li';

        if($child == '-')
        {
            $html .= ' class="divider"';
        }
       
        $html .= '>';
        return $html;
    }

    public function post_child($child)
    {
        return '</li>';
    }
}

?>