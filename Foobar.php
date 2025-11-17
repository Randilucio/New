<?php
for ($i = 0; $i < 100; $i++) {
    if ($i %3 === 0) {
        $i = "Foo";
    }elseif ($i %5 === 0){
        $i = "Bar";
    }
    echo $i,"<br>";
}
