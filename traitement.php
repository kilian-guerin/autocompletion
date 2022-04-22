<?php
require('bdd.php');

$sql = $bdd->query("SELECT * FROM players WHERE Forename OR Surname LIKE '%" . $_GET['data'] . "%' LIMIT 5 ");
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
?>