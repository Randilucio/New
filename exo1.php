<?php
function age($a){
    if ($a < 3) {
        return "creche";
    } elseif ($a < 6) {
        return "maternelle";
    } elseif ($a < 11) {
        return "primaire";
    }elseif ($a < 16) {
        return "collège";
    } elseif ($a < 18) {
        return "lycée";
    }else {
        return "senior";
    }
}
$age = age(5);
echo $age;
?>

