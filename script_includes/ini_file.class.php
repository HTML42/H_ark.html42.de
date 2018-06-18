<?php

class IniFile extends File {
    
    public function get_ini($dim = true) {
        if($this->exists) {
            return parse_ini_string($this->get_content(), $dim, INI_SCANNER_TYPED);
        } else {
            return array();
        }
    }
    
}