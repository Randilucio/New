<?php
function boucle($n){
    for ($i = 1; $i < $n+1; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $i;
        }
        echo"<br>";
    }
}
$n = boucle(5);
echo $n;
?>