<?php


class bootstrap_nav extends bootstrap_element
{
    public $tag          = 'ul';
    public $type         = 'tabs'; # pills, stacked, navbar
    public $justified    = false;
    public $attributes   = [
        'class'=>['nav'=>true],
    ];

    public function pre_render()
    {
        switch($this->type)
        {
            case 'tabs':
                $this->add_class('nav-tabs');
                break;
            case 'pills':
                $this->add_class('nav-pills');
                break;
            case 'navbar':
                $this->add_class('navbar-nav');
                break;
            case 'stacked':
                $this->add_class('nav-pills');
                $this->add_class('nav-stacked');
                break;
        }
        if($this->justified !== false)
        {
            $this->add_class('nav-justified');
        }

        return '';
    }

    public function pre_child($child)
    {
        $html = '<li';
        if ($this->type !== 'navbar')
        {
            $html .= ' role="presentation"';
        }

        if (is_object($child))
        {
            $classes = [];
            if(isset($child->active) and $child->active === true)
            {
                $classes[] = 'active';
            }
            if(isset($child->disabled) and $child->disabled === true)
            {
                $classes[] = 'disabled';
            }

            if(isset($child->attributes['data-toggle']) and $child->attributes['data-toggle'] == 'dropdown')
            {
                $classes[] = 'dropdown';
            }

            if(count($classes) > 0)
            {
                $html .= ' class="'.implode(' ',$classes).'"';
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

