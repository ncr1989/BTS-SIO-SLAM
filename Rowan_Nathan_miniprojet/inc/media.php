
<!-- PAGE MEDIA -->
<h1> Les Images </h1> 

<?php
// crée un tableau avec les paths vers chaque image: ["./image/books.jpg", "./image/bridge.jpg", ...]
$glob_dir = "./image/";
$images = glob($glob_dir . "*");

// boucle qui parcourt tous les paths
foreach ($images as $img) {
  // extrait le nom de l'image du path en séparant chaque partie dans un tableau: "./image/books.jpg" -> [image,books,jpg], ensuite on extrait l'avant dernier élément.
  $split = preg_split("~[/.]~", $img);
  $title = ucfirst($split[count($split) - 2]); // ucfirst met la première lettre en majuscule, count() -2 prend l'avant dernière valeur:

  echo "
    <h2> ". $title . "</h2>
    <img src='". $img . "' alt=''>
  ";
}

?>				
