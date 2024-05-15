
<!-- PAGE contact -->

<h3> Nous contacter </h3>

<?php
    // traitement du formulaire
    if( isset( $_POST['goto_send'] )) {
        if (isCaptchaValid()) {
          handleForm();
        }
        else {
            echo "<h4 style='color:red'>Captcha invalide</h4>";
          }
       }
?>

		<form method="post" action="page.php?article=contact">
			
			<div class="formulaire">
			
				<p>
					<input type="text" placeholder="Votre nom" name="c_nom" required/>
				</p>
			
				<p>
					<input type="text" placeholder="Prénom" name="c_pnom" required/>
				</p>
				
				<p>
					<input type="tel" placeholder="N° de téléphone" name="c_tel" pattern="0[0-9]{9}" required/>
				</p>
				
				<p>
					<input type="email" placeholder="Email" name="c_mail" required/>
				</p>
					<textarea  placeholder="Votre message ..." style="height:150px" name="c_msg" required></textarea>

      <img src="./inc/captcha.php" onclick="this.src='./inc/captcha.php?' + Math.random();" alt="captcha" style="cursor:pointer;">
      <input type="text" name="captcha">

				<p>
					<input type="submit" name="goto_send" value="Envoyer...">
				</p>
				
			</div>


			
		</form>


		
		<br />
		<p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8660.313309264926!2d-2.786165006204506!3d47.64835089853568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48101c1ee660f85f%3A0x37b8927e9d6ad86b!2sGreta%20De%20Bretagne%20Sud%20-%20Agency%20De%20Vannes!5e0!3m2!1sen!2sfr!4v1700818312982!5m2!1sen!2sfr" 
          width="600" 
          height="450"
          style="border:0;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
		</p>


<?php 

    function isCaptchaValid() {
      return isset($_POST['captcha'], $_SESSION['code']) && $_POST['captcha'] == $_SESSION['code'];
    }

    function handleForm() {
          $nom; $pnom; $tel; $mail; $msg;
          if (isset($_POST["c_nom"])) $nom = $_POST["c_nom"];
          if (isset($_POST["c_pnom"])) $pnom = $_POST["c_pnom"];
          if (isset($_POST["c_tel"])) $tel = $_POST["c_tel"];
          if (isset($_POST["c_mail"])) $mail = $_POST["c_mail"];
          if (isset($_POST["c_msg"])) $msg = $_POST["c_msg"];


          // crée le texte à ajouter au fichier
          $text = $nom . " " . $pnom . ", " . $tel . ", " . $mail . ", \n" . $msg . "\n\n";
          $fichier = "./contact.txt";

          $is_file_send = file_put_contents($fichier, $text, FILE_APPEND);

          // affiche si message envoyé ou non
          if ($is_file_send) {
            echo "<h4 style='color:green'>Le formulaire a été expédié !</h4>";
          }
          else {
            echo "<h4 style='color:red'>Le formulaire n'a pas été expédié !</h4>";
          }  
    }
?>
