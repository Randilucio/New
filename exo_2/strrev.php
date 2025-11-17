<?php
function strev($str){
    $inverse = "";
    for ($i = strlen($str)-1; $i >= 0; $i--) {
        $inverse .= $str[$i];
    }
    return $inverse; 
}
$word = strev("word");
echo $word;
?>