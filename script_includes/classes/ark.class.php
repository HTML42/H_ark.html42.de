<?php

class Ark {

    public static $path = null;
    public static $config_path = 'ShooterGame/Saved/Config/LinuxServer/';

    public static function read_config($filename) {
        if (!strstr($filename, '.ini')) {
            $filename .= '.ini';
        }
        $filepath = self::$path . self::$config_path . $filename;
        if (is_file($filepath)) {
            return file_get_contents($filepath);
        } else {
            return null;
        }
    }
    
    public static function read_ini($filename, $dim = true) {
        $file_content = self::read_config($filename);
        if(is_string($file_content)) {
            return parse_ini_string($file_content, $dim, INI_SCANNER_TYPED );
        } else {
            return null;
        }
    }

}
