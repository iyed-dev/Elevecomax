<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=chat;charset=utf8", "root", "");
if(isset($_POST['pseudo']) AND isset($_POST['message']) AND !empty(['pseudo']) AND !empty(['message']))
{
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$message = htmlspecialchars($_POST['message']);
	$insertmsg = $bdd->prepare('INSERT INTO parent(pseudo, message) VALUES(?, ?)');
	$insertmsg->execute(array($pseudo, $message));
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Iyed Amri</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&display=swap" rel="stylesheet">
	<link href="css/button.css" rel="stylesheet">
	<link href="css/background.css" rel="stylesheet">
	<link href="css/text.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<section>
	<center><h1>Bienvenue</h1></center>
	<br><br><br><br><center><hr width="350"></center>
<center>
<br>
	<form method="post" action="">
		<input type="text" placeholder="Prénom" name="pseudo" style="border-radius: 5px;"/>
		<br>
		<br>
		<textarea type="text" placeholder="Message" name="message" style="border-radius: 5px;"></textarea>
		<br>
		<br>
		<input type="submit" value="Envoyer !" name="btn" style="  
  text-decoration: none;
  color: rgba(255, 255, 255, 0.8);
  background: rgb(145, 92, 182);
  padding: 15px 40px;
  border-radius: 4px;
  font-weight: normal;
  text-transform: uppercase;
  transition: all 0.2s ease-in-out;
  color: rgba(255, 255, 255, 1);
  box-shadow: 0 5px 15px rgba(100, 50, 80, .6);
  cursor: pointer;">
	</form>
	<br>
	<?php
	$allmsg = $bdd->query('SELECT * FROM parent');
	while ($msg = $allmsg->fetch())
	{
	?>
	<b>Le parent <?php echo $msg['pseudo'] ?> à dis <br></b> <p><?php echo $msg['message'] ?></p><br>
	<?php
}
	?>
</center>
</section>
</body>
</html>
