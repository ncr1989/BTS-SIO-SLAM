<?php
session_start();

// mot de passe pour se connecter
define("MDP", "sio");

// handle post
if (!empty($_POST)) {
  if (isset($_POST["mot_de_passe"])) $_SESSION["mdp"] = $_POST["mot_de_passe"];
  if (isset($_POST["pseudo"])) $_SESSION["pseudo"] = $_POST["pseudo"];

  // check si le mdp rempli est le bon, et store la reponse dans une variable
  $_SESSION["valid_mdp"] = strcmp($_SESSION["mdp"], MDP) === 0;
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Mon site</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>


<div class="corps header">
  Vous êtes connecté avec le pseudo :   
<?php 
  // affiche le pseudo si valid et defini, sinon affiche invalide
  if (isset($_SESSION["pseudo"]) && $_SESSION["valid_mdp"] ) {
  echo "<strong style='color:green;'>";
  echo $_SESSION["pseudo"];
  }
  else {
    echo "<strong style='color:red;'>";
    echo "Invalide";
  }
  ?> </strong>
</div>

<!-- Partie HTML si la session est validée par le mot de passe -->
<?php if (isset( $_SESSION["valid_mdp"]) && $_SESSION["valid_mdp"] ): ?>
<div class="corps">

	<div class="menu">
	
		<div class="bouton">
			<a href="page.php">Accueil</a>
		</div>
		
		<div class="bouton">
			<a href="page.php?article=media">Images</a>
		</div>
		
		<div class="bouton">
			<a href="page.php?article=contact">Contacts</a>
		</div>
		
	</div>
	
	<p>
		<div class="contenu">
        <?php 
        /* 
          Affiche le contenu selon url
          - si pas de get[article] affiche le compteur
          - sinon, affiche soit media, soit contact
        */ 
        if (!isset($_GET["article"])) {
          include './inc/intro.php';
        }
        else {
          include './inc/'. $_GET["article"] . '.php'; 
        }
        ?>
		</div>
		
	</p>
	
</div>

<div class="copyright">
© Mon site | <a href="index.php?deconnection=true"> Se déconnecter </a>
</div>

<!-- Partie HTML si la session n'existe pas ou si mot de passe invalide -->
<?php else: ?>
	<div class="corps">
		<div class="contenu">
      <?php
        // si aucun post, on affiche un message pour se connecter, sinon c'est que le mdp est invalide et on demande de le resaisir
        if (empty($_POST)) {
          echo '
          <strong style="color:red;">Erreur, veuiller vous connecter</strong>
          <p>
          <a href="index.php">Se connecter</a>
          </p>';
        }
        else {
          echo '
          <strong style="color:red;">Mot de passe incorrect</strong>
          <p>
          <a href="index.php">Recommencer</a>
          </p>';
        }
      ?>
		</div>
	</div>
	
	<div class="copyright">
	© Mon site
	</div>
<?php endif; ?>

</html>
