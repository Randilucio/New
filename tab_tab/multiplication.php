<?php
$file = "table.txt"; 
$handle = fopen($file, "r");

if (!$handle) {
    die("Impossible d'ouvrir le fichier");
}

$erreurs = [];

$ligne_num = 0;
while (($line = fgets($handle)) !== false) {
    $ligne_num++;
    $colonnes = preg_split("/\s+/", trim($line));

    if ($ligne_num == 1) continue;

    $i = $ligne_num - 1; 


    for ($j = 1; $j <= 10; $j++) {
        $val = (int)$colonnes[$j]; 
        $correct = $i * $j; 

        if ($val !== $correct) {
            $erreurs[] = $i ."x".$j ."=" . $val."<br>"; 
        }
    }
}

fclose($handle);

if (count($erreurs) > 0) {
    echo "Les erreurs sont " . implode(", ", $erreurs);
} else {
    echo "Aucune erreur dans la table";
}
?>
