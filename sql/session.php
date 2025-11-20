<?Php
session_start();
if ($_SERVER == "POST" && isset($_POST['nom'])) {
    $_SESSION['nom'] = $_POST['nom'];
    echo "Nom enregistré en session : " . htmlspecialchars($_SESSION['nom']);

}
if (isset($_POST['nom'])) {
    echo "Bonjour ".htmlspecialchars($_POST['nom']);
}else{
    echo 'Aucun nom soumis.';
}
?>

<form action="" method="post">
    <div>
        <label for="">Nom:</label>
        <input type="text" id="nom" name="nom" >
        <input type="submit" value="Envoyer">
    </div>
</form>