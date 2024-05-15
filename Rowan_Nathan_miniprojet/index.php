<!-- ICI un code PHP pour effacer la session utilisateur ... -->

<!DOCTYPE html>
<html>
<head>
<title>Mon site</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />

</head>

<body>

<div class="corps">
	<p>
	<div class="contenu">
		
		<h3>Page d'introduction</h3>

		<p>

		<form method="post" action="page.php">
			
				<p>
					<label>Votre pseudo :</label>
					<input type="text" name="pseudo">
				</p>
			
				<p>
					<label>Mot de passe :</label>
					<input type="password" name="mot_de_passe">
				</p>
			
				<p>
					<input type="submit" value="Valider">
				</p>
			
		</form>

		</p>

	</div>
	</p>
</div>

<div class="copyright">
© Mon site
</div>

</html>
