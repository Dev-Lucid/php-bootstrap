<?php 

global $_phpbs;

include(__DIR__.'/bootstrap_element.php');

class php_bootstrap
{
    public static function init($config)
    {
        global $_phpbs;
        $_phpbs = array(

            # containers/responsive misc
            'container'=>[
                'attributes'=>[
                    'class'=>['container'=>true]
                ]
            ],
            'container-fluid'=>[
                'attributes'=>[
                    'class'=>['container-fluid'=>true]
                ]
            ],
            'row'=>[
                'attributes'=>[
                    'class'=>['row'=>true]
                ]
            ],

            # misc text formatting
            'paragraph'=>['tag'=>'p',],
            'strong'=>['tag'=>'strong',],
            'small'=>['tag'=>'small',],
            'inserted'=>['tag'=>'ins',],
            'deleted'=>['tag'=>'del',],
            'emphasis'=>['tag'=>'em',],
            'italic'=>['tag'=>'i',],
            'strikethrough'=>['tag'=>'s',],
            'bold'=>['tag'=>'b',],
            'underline'=>['tag'=>'u',],
            'olist'=>['tag'=>'ol',],
            'ulist'=>['tag'=>'ul',],
            'list_item'=>['tag'=>'li',],
            'blockquote'=>['tag'=>'blockquote',],
            'footer'=>['tag'=>'footer',],
            'cite'=>['tag'=>'cite',],
            'h1'=>['tag'=>'h1',],
            'h2'=>['tag'=>'h2',],
            'h3'=>['tag'=>'h3',],
            'h4'=>['tag'=>'h4',],
            'h5'=>['tag'=>'h5',],
            'h6'=>['tag'=>'h6',],

            # form controls
            'input_text'=>[],
            'input_email'=>[],
            'input_password'=>[],

            # components
        );

        foreach($config as $element=>$options)
        {
            foreach($options as $key=>$value)
            {
                $_phpbs[$element][$key] = $value;
            }
        }
    }

    public static function __callStatic($class,$parameters)
    {
        $final_class_name = 'bootstrap_'.$class;
        if(!class_exists($final_class_name))
        {
            if (file_exists(__DIR__.'/'.$final_class_name.'.php'))
            {
                include(__DIR__.'/'.$final_class_name.'.php');
            }
        }

        if(!isset($parameters[0]))
        {
            $parameters[0] = [];
        }

        if(class_exists($final_class_name))
        {
            $element = new $final_class_name($class,$parameters[0]);
        }
        else
        {
            $element = new bootstrap_element($class,$parameters[0]);
        }
        
        return $element;
    }
}

if (!class_exists('bs'))
{
    class_alias('php_bootstrap','bs');
}
if (!class_exists('bootstrap'))
{
    class_alias('php_bootstrap','bootstrap');
}
?>