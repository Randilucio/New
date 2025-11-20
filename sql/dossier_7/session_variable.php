<?php
session_start();

try {
    $dbh = new PDO('mysql:host=localhost;dbname=user;charset=utf8','root','');
} catch(PDOException $e) {
    die($e->getMessage());
}

/* ------------------------- REGISTER ------------------------- */
if(isset($_POST['register'])){
    if(!empty($_POST['username']) && !empty($_POST['mdp'])){

        
        $check = $dbh->prepare("SELECT id FROM user WHERE username = :username");
        $check->execute(['username' => $_POST['username']]);
        
        if ($check->rowCount() > 0) {
            echo "<b>Ce nom d'utilisateur existe déjà.</b><br>";
        } else {
            $hash = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            $sth = $dbh->prepare('INSERT INTO user (username, password) VALUES (:username, :mdp)');
            $sth->execute([
                'username' => $_POST['username'],
                'mdp' => $hash
            ]);
            echo "<b>Inscription réussie !</b><br>";
        }

    } else {
        echo "Veuillez remplir tous les champs.<br>";
    }
}

/* ------------------------- LOGIN ------------------------- */
if(isset($_POST['login'])){
    //a noté c est password pas mdp dans la bd 
    
    if(!empty($_POST['username']) && !empty($_POST['mdp'])){

        $stm = $dbh->prepare("SELECT * FROM user WHERE username = :username LIMIT 1");
        $stm->execute(['username' => $_POST['username']]);
        $user = $stm->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($_POST['mdp'], $user['password'])){
            $_SESSION['user'] = $user['username'];
            echo "<b>Connexion réussie ! Bonjour " . htmlspecialchars($user['username']) . ".</b>";
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.<br>";
        }

    } else {
        echo "Veuillez remplir tous les champs.<br>";
    }
}

?>

<h1>Inscription</h1>
<form action="" method="post">
    <label>Username:</label>
    <input type="text" name="username">
    <br><br>

    <label>Password:</label>
    <input type="password" name="mdp">
    <br><br>

    <input type="submit" value="register" name="register">
</form>

<h1>Connexion</h1>
<form action="" method="post">
    <label>Username:</label>
    <input type="text" name="username">
    <br><br>

    <label>Password:</label>
    <input type="password" name="mdp">
    <br><br>

    <input type="submit" value="login" name="login">
</form>
