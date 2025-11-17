<?php
for ($i = 0; $i < 100; $i++) {
    $sorti = $i;
    if ($i %3 == 0) {
        $sorti = "Foo";
    }elseif ($i %5 == 0){
        $sorti = "Bar";
    }
    echo $sorti,"<br>";
}
?>