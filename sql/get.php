<?php
$mysqlClient = new PDO(
    "mysql:host=localhost;dbname=data;charset=utf8",
    "root",
    ""
);

try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=data;charset=utf8','root','');
}catch(PDOException $e) {
    die($e->getMessage());
}

$sortallowed = ["nom", "pays", "course", "temps"];

$orderallowed = ["ASC", "DESC"];

$sort = "nom";
$order = "ASC";

if (isset($_GET["sort"]) && in_array($_GET["sort"], $sortallowed)) {
    $sort = $_GET["sort"];
}

if (isset($_GET["order"]) && in_array($_GET["order"], $orderallowed)) {
    $order = $_GET["order"];
}

$sth = $mysqlClient->prepare("SELECT * FROM `100` ORDER BY $sort $order");
$sth->execute();

$data = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <thead>
        <tr>
            <th>Nom 
                <a href="?sort=nom&order=ASC">▲</a>
                <a href="?sort=nom&order=DESC">▼</a>
            </th>

            <th>Pays
                <a href="?sort=pays&order=ASC">▲</a>
                <a href="?sort=pays&order=DESC">▼</a>
            </th>

            <th>Courses
                <a href="?sort=course&order=ASC">▲</a>
                <a href="?sort=course&order=DESC">▼</a>
            </th>

            <th>Temp
                <a href="?sort=temps&order=ASC">▲</a>
                <a href="?sort=temps&order=DESC">▼</a>
            </th>
        </tr>
    </thead>

    <?php foreach($data as $value){ ?>
        <tr>
            <td><?php echo $value["nom"]; ?></td>
            <td><?php echo $value["pays"]; ?></td>
            <td><?php echo $value["course"]; ?></td>
            <td><?php echo $value["temps"]; ?></td>
        </tr>
    <?php } ?>
</table>
