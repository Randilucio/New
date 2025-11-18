<?php
$contact = ["Alice Dupont","John Doe","Jean Martin","Francis Lebrun","Cahoot"];
$file = "fichier.txt";
$fichier = fopen($file,"a+");
$contenu = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($contact as $nom){
    if(!in_array($nom, $contenu)){
        fwrite($fichier,$nom."\n");
        echo"Ajout element";
    }else {
        echo "Élément déjà présent : $nom<br>";
    }
}
fclose($fichier);
?>