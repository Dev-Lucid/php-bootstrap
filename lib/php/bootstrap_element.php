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
    public $id;
    public $style         = '';
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

        if(is_string($options) or is_numeric($options))
        {
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
                    $this->$key = $value;
                }
            }
        }
    }

    public function render()
    {
        $this->use_property_as_attribute('style');
        $this->use_property_as_attribute('id');
        
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
                $html .= $this->build_class_attribute($value);
            }
            else if ($value !== '' and !is_null($value))
            {
                $html .= ' '.$name.'="'.$value.'"';
            }
            
        }
        return $html;
    }

    protected function build_class_attribute($hash)
    {
        $html = '';
        $classes = [];
        foreach($hash as $class_name=>$on)
        {
            if ($on === true)
            {
                $classes[] = $class_name;
            }
        }
        if (count($classes) > 0){
            $html = ' class="'.implode(' ',$classes).'"';
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
        return $this;
    }

    public function add($elements)
    {   
        if( is_array($elements))
        {
            #lucid::log('$elements was an array, looping over and calling add on all indexes');
            foreach($elements as $element)
            {
                $this->add($element);
            }
        }
        else
        {
            #lucid::log('$elements was NOT an array, adding directly');
            if(is_object($elements))
            {
                $elements->parent = $this;
                $this->children[] = $elements;
            }
            else
            {
                $this->children[] = $elements;    
            } 
        }
        return $this;
    }

    public function center($new_value = true)
    {
        $this->attributes['class']['center-block'] = $new_value;
        return $this;
    }

    public function pull_left($new_value = true)
    {
        $this->attributes['class']['pull-left'] = $new_value;
        return $this;
    }

    public function pull_right($new_value = true)
    {
        $this->attributes['class']['pull-right'] = $new_value;
        return $this;
    }

    public function clearfix($new_value = true)
    {
        $this->attributes['class']['clearfix'] = $new_value;
        return $this;
    }

    public function show($new_value = true)
    {
        $this->attributes['class']['show'] = $new_value;
        return $this;
    }

    public function hide($new_value = true)
    {
        $this->attributes['class']['hide'] = $new_value;
        return $this;
    }

    public function __call($property,$value=null)
    {
        $this->$property = $value;
        return $this;
    }

    public function sizes($sizes)
    {
        $index_aliases = ['xs','sm','md','lg'];
        for($i=0;$i<count($sizes);$i++)
        {
            if(!is_null($sizes[$i]))
            {
                $this->add_class('col-'.$index_aliases[$i].'-'.$sizes[$i]);
            }
        }
        return $this;
    }

    public function offsets($offsets)
    {
        $index_aliases = ['xs','sm','md','lg'];
        for($i=0;$i<count($offsets);$i++)
        {
            if(!is_null($offsets[$i]))
            {
                $this->add_class('col-'.$index_aliases[$i].'-offset-'.$offsets[$i]);
            }
        }
        return $this;
    }
}

?>