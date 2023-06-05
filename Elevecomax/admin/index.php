<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=elevecomax;charset=utf8", "root", "");

if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
    $supprime = (int) $_GET['supprime'];

    $req = $bdd -> prepare('DELETE FROM utilisateurs WHERE id = ?');
    $req->execute(array($supprime));
}
$membres = $bdd->query('SELECT * FROM utilisateurs');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Administration</title>
    <link rel="stylesheet" href="css/background.css">
    <link rel="stylesheet" href="css/text.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
<section>
                <div class="middle">
            <button class="button-hover" onclick="window.location.href='inscription.php';">
                <span>Créer un compte</span>
            </button>
        </div>
    <center><h1>Administration</h1></center>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <center>
    <ul>
        <?php while($m = $membres->fetch()) { ?>
            <p>id : <?= $m['id'] ?>, Prénom : <?= $m['pseudo'] ?>, Adresse ip : <?= $m['ip'] ?> <meta charset="utf-8"> - <a href="index.php?supprime=<?=$m['id'] ?>">Supprimer</a></p>
        <?php } ?>
    </ul>
</center>
</section>
</body>
</html>