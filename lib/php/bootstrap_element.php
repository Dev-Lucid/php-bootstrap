<?php

class bootstrap_element
{
    public $tag           = 'div';
    public $parent        = null;
    public $pre_html      = '';
    public $post_html     = '';
    public $pre_children  = '';
    public $post_children = '';
    public $children      = [];
    public $attributes    = [
        'class'=>[],
    ];

    public function __construct($element, $options=[])
    {
        global $_phpbs;

        if (isset($_phpbs[$element]))
        {
            foreach($_phpbs[$element] as $key=>$value)
            {
                $this->$key = $value;
            }
        }

        lucid::log('instantiating new '.$element.': '.(is_string($options)).'/'.(is_array($options)));
        if(is_string($options) or is_numeric($options))
        {
            lucid::log('setting up new '.$element.' with options '.$options);
            $this->add($options);
        }
        else if (is_array($options))
        {

            foreach($options as $key=>$value)
            {
                if($key === 'class')
                {
                    $classes = explode(' ',$value);
                    foreach($classes as $class)
                    {
                        $this->attributes[$key][$class] = true;    
                    }
                }
                else
                {
                    lucid::log('setting '.$key.' to '.str_replace("\n","\t",print_r($value,true)));
                    $this->$key = $value;
                }
            }
        }
    }

    public function render()
    {
        $html = '';
        $html .= $this->pre_render();
        $html .= $this->pre_html;
        $html .= '<'.$this->tag;
        $html .= $this->render_attributes();
        $html .= '>'.$this->pre_children;
        $html .= $this->render_children();
        $html .= $this->post_children.'</'.$this->tag.'>';
        $html .= $this->post_html;
        $html .= $this->post_render();
        return $html;
    }

    public function __toString()
    {
        return $this->render();
    }

    public function pre_render()
    {
        return '';
    }

    public function post_render()
    {
        return '';
    }

    public function pre_child($child)
    {
        return '';
    }

    public function post_child($child)
    {
        return '';
    }

    public function render_attributes()
    {
        $html = '';
        foreach($this->attributes as $name=>$value)
        {
            
            if ($name == 'class')
            {
                $classes = [];
                foreach($value as $class_name=>$on)
                {
                    if ($on === true)
                    {
                        $classes[] = $class_name;
                    }
                }
                if (count($classes) > 0)
                $html .= ' '.$name.'="'.implode(' ',$classes).'"';
            }
            else
            {
                $html .= ' '.$name.'="'.$value.'"';
            }
            
        }
        return $html;
    }

    public function render_children()
    {
        $html = '';
        foreach($this->children as $child)
        {
            $html .= $this->pre_child($child);
            if(is_object($child))
            {
                $html .= $child->render();
            }
            else
            {
                $html .= $child;
            }
            $html .= $this->post_child($child);
        }
        return $html;
    }

    public function add_class($name)
    {
        $this->attributes['class'][$name] = true;
        return $this;
    }

    public function remove_class()
    {
        $this->attributes['class'][$name] = false;
        return $this;
    }

    public function has_class($name)
    {
        if (!isset($this->attributes['class'][$name]))
        {
            return false;
        }
        
        return ($this->attributes['class'][$name] === true);
    }

    protected function use_property_as_attribute($name,$null_value ='',$default_value=null)
    {
        if ($this->$name !== $null_value)
        {
            $this->attributes[$name] = $this->$name;
        }
        else if (!is_null($default_value))
        {
            $this->attributes[$name] = $default_value;
        }
    }

    public function add($element,$options=null)
    {
        if(is_object($element))
        {
            
            $element->parent = $this;
        }
        $this->children[] = $element;
        return $this;
    }

    public function center($new_value = true)
    {
        $this->attributes['class']['center-block'] = $new_value;
    }

    public function pull_left($new_value = true)
    {
        $this->attributes['class']['pull-left'] = $new_value;
    }

    public function pull_right($new_value = true)
    {
        $this->attributes['class']['pull-right'] = $new_value;
    }

    public function clearfix($new_value = true)
    {
        $this->attributes['class']['clearfix'] = $new_value;
    }

    public function show($new_value = true)
    {
        $this->attributes['class']['show'] = $new_value;
    }

    public function hide($new_value = true)
    {
        $this->attributes['class']['hide'] = $new_value;
    }
}

?>