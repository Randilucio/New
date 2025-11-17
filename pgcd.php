<?php
function pgcd($a, $b) {
    if ($a > $b){
        return pgcd($a - $b, $b);
    } elseif ($a < $b) {
        return pgcd($a, $b - $a);
    } else {
        return $a;
    }
}

$has_error = false;
if (pgcd(60, 25) != 5) {
$has_error = true;
echo "Erreur sur la fonction pgcd_1, le resultat de pgcd_1(60, 25) devrait etre 5\n";
}
if (pgcd(60, 25) != 5) {
$has_error = true;
echo "Erreur sur la fonction pgcd_2, le resultat de pgcd_2(60, 25) devrait etre 5\n";
}
if (pgcd(60, 25) != 5) {
$has_error = true;
echo "Erreur sur la fonction pgcd_3, le resultat de pgcd_3(60, 25) devrait etre 5\n";
}
if (pgcd(33, 25) != 1) {
$has_error = true;
echo "Erreur sur la fonction pgcd_1, le resultat de pgcd_1(33, 25) devrait etre 1\n";
}
if (pgcd(33, 25)!= 1) {
$has_error = true;
echo "Erreur sur la fonction pgcd_2, le resultat de pgcd_2(33, 25) devrait etre 1\n";
}
if (pgcd(33, 25) != 1) {
$has_error = true;
echo "Erreur sur la fonction pgcd_3, le resultat de pgcd_3(33, 25) devrait etre 1\n";
}
if (pgcd(56, 98) != 14) {
$has_error = true;
echo "Erreur sur la fonction pgcd_1, le resultat de pgcd_1(56, 98) devrait etre 14\n";
}
if (pgcd(56, 98)!= 14) {
$has_error = true;
echo "Erreur sur la fonction pgcd_2, le resultat de pgcd_2(56, 98) devrait etre 14\n";
}
if (pgcd(56, 98) != 14) {
$has_error = true;
echo "Erreur sur la fonction pgcd_3, le resultat de pgcd_3(56, 98) devrait etre 14\n";
}
if ($has_error == false) {
echo "Aucune erreur, félicitation\n";
}
?>

