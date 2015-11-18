<?php


class bootstrap_breadcrumbs extends bootstrap_element
{
    public $tag          = 'ol';
    public $attributes   = [
        'class'=>['breadcrumb'=>true],
    ];

    
    public function pre_child($child)
    {
        $html = '<li';

        if (is_object($child))
        {
            if(isset($child->active) and $child->active === true)
            {
                $html .= ' class="active"'
            }
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