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

$eleves = [
["nom" => "Alice", "notes" => [15, 14, 16]],
["nom" => "Bob", "notes" => [12, 10, 11]],
["nom" => "Claire", "notes" => [18, 17, 16]]
];

foreach ($eleves as $eleves){
    echo "Nom: ".$eleves["nom"]. ", moyenne: ".calcmoy($eleves["notes"]),"<br>";
} 
?>