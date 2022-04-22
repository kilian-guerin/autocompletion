<?php
require('./bdd.php');
$sql = $bdd->query("SELECT * FROM players WHERE Forename OR Surname LIKE '%" . $_GET['search'] . "%' LIMIT 10 ");
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./script.js"></script>
</head>

<header>
    <a href="./index.php">Gogole.com</a>
    <form id="form-search" action="recherche.php" method="get">
        <div class="search">
            <input type="text" name="search" id="autocomplete-input" class="autocomplete" autocomplete="off" placeholder="Taper votre recherche">
            <div class="dropdown-content"></div>
        </div>
    </form>
</header>
<body>
    <div class="container search-container">
        <?php
        foreach ($result as $row) { ?>
            <div class="box">
                <img src="<?= $row['ImageURL'] ?>" alt="">
                <a href="element?id=<?= $row['ID'] ?>"> <?= $row['Forename'] . " " . $row['Surname'] ?>'</a>
            </div>
        <?php } ?>
    </div>
</body>
<footer>
    <span>
        <ul>
            <li class="underline">Github</li>
        </ul>
    </span>
    <ul>
        <li class="underline">Created by Kilian Guerin</li>
        <li class="underline">Use Gogole.com</li>
    </ul>
</footer>

</html>