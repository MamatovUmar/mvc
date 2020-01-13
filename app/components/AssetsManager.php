<?php

namespace app\components;

class AssetsManager
{
    public static $files;
    
    public function __construct()
    {
        
        
    }

    public static function initCSS ()
    {
        $files = include(APP.'/config/assets.php');
        foreach($files['css'] as $value)
        {
            echo "<link rel=\"stylesheet\" href=\"". $value ."\">";
        }
    }

    public static function initJS ()
    {
        $files = include(APP.'/config/assets.php');
        foreach($files['js'] as $value)
        {
            
            echo "<script src=\"{$value}\"></script>";
        }
    }
}