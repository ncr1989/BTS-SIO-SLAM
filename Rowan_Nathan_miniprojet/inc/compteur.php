
<!-- COMPTEUR DE VISITE EN PHP -->
<?php
  $fichier = "compteur.txt";

  if ( ! file_exists($fichier) ) {
    touch($fichier); $data=0;
  } 
  else {
    $data = file_get_contents($fichier);

  if ( ! is_numeric($data) ) $data=0;
  }

  if( ! isset($_SESSION['var'])){
      $_SESSION['var']=true;
      $data++;
      file_put_contents($fichier, $data);
  }
  echo $data, " visites";
?>
