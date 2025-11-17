<?php
function my_str_contains($haystack, $needle) {
    if ($needle === "") {
        return true;
    }

    $haystack_len = strlen($haystack);
    $needle_len = strlen($needle);

    for ($i = 0; $i <= $haystack_len - $needle_len; $i++) {
        $found = true;
        for ($j = 0; $j < $needle_len; $j++) {
            if (!isset($haystack[$i + $j]) || $haystack[$i + $j] !== $needle[$j]) {
                $found = false;
                break;
            }
        }
        if ($found) {
            return true;
        }
    }

    return false;
}

var_dump(my_str_contains("le fromage est delicieux", "fromage"))    ; 
var_dump(my_str_contains("le pain est bon", "fromage"));          
var_dump(my_str_contains("bonjour", ""));                      
?>
