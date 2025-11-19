<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=data;charset=utf8', 'root', '');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die($e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = $_POST['nom'];
    $pays = strtoupper(trim($_POST['pays']));
    $course = $_POST['course'];
    $temps = $_POST['temps'];

    if (!preg_match('/^[A-Z]{3}$/', $pays)) {
        die("Le pays doit être 3 lettres majuscules (ex: FRA, USA, BEL).");
    }

    if (!is_numeric($temps)) {
        die("Le temps doit être un nombre.");
    }

    $sth = $dbh->prepare("INSERT INTO `100` (`nom`,`pays`,`course`,`temps`)VALUES (:nom, :pays, :course, :temps)");

    $sth->execute([
        'nom' => $nom,
        'pays' => $pays,
        'course' => $course,
        'temps' => $temps
    ]);

}
?>

<form class="formulaire" method="post" action="">
    <div class="nom">
        <label>Nom :</label>
        <input type="text" name="nom" id="nom" required>
    </div>

    <div class="pays">
        <label>Pays (3 lettres) :</label>
        <input type="text" name="pays" id="pays" maxlength="3" required>
    </div>

    <div class="course">
        <label>Course :</label>
        <input type="text" name="course" id="course" required>
    </div>

    <div class="temps">
        <label>Temps :</label>
        <input type="number" name="temps" id="temps" required>
    </div>

    <button type="submit">Envoyer</button>
</form>

<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=data;charset=utf8', 'root', '');
}catch(PDOException $e){
    die($e->getMessage());
}

$parPage = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$depart = ($page - 1) * $parPage;

$sth = $dbh->prepare("SELECT * FROM `100` LIMIT :start, :limit");
$sth->bindValue(':start', $depart, PDO::PARAM_INT);
$sth->bindValue(':limit', $parPage, PDO::PARAM_INT);
$sth->execute();

$resultats = $sth->fetchAll(PDO::FETCH_ASSOC);

$total = $dbh->query("SELECT COUNT(*) FROM `100`")->fetchColumn();
$nbPages = ceil($total / $parPage);
?>

<h2>Liste des résultats</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>Nom</th>
        <th>Pays</th>
        <th>Course</th>
        <th>Temps</th>
    </tr>

    <?php foreach ($resultats as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['nom']) ?></td>
            <td><?= htmlspecialchars($row['pays']) ?></td>
            <td><?= htmlspecialchars($row['course']) ?></td>
            <td><?= htmlspecialchars($row['temps']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<div>
<?php for ($i = 1; $i <= $nbPages; $i++): ?>
    <a href="?page=<?= $i ?>" 
       style="margin-right:5px;<?= $i == $page ? 'font-weight:bold;' : '' ?>">
        <?= $i ?>
    </a>
<?php endfor; ?>
</div>
