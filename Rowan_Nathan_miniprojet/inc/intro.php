
  <!-- PAGE PAR DEFAUT -->

  <?=  "<h3>Bienvenu ". $_SESSION["pseudo"] ."</h3>"?>
  <p>...</p>
  <p style="color:darkblue;">Bravo, cette page utilise PHP</p>
    
  <!-- Un compteur de visite en PHP à inclure ? -->
  <?php 
    $phrase = "Nous sommes le ".date("H:i:s")."<br/>il est ".date("j/m/Y");
    echo "$phrase</br>";

    echo "<p>...</p>";
    include './inc/compteur.php'; 
  ?>
