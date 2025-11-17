<?php
function calcmoy($liste){
    $moyen = 0;
    $nb = 0;
    for ($i= 0; $i<count($liste); $i++){
        $nb = $nb + $liste[$i];
    }
    $moyen = $nb/count($liste);
    return $moyen;
}
?>