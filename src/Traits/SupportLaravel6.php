<?php 

namespace mobacode\Roles\Traits;

class SupportLaravel6{

    static function starts_with($haystack, $needle) {
	
        // search backwards starting from haystack length characters from the end
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
        
    }
    
    static function ends_with($haystack, $needle) {
        
        // search forward starting from end minus needle length characters
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
        
    }

}