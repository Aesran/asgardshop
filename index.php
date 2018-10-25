<?php
// Inclusion des fonctions / classes nécéssaires
// include('class/PDO.class.php');
// include('class/fonctions.php');
//Fonction pour charger une class donnée
/*w = lettre seulement.
d = nombre seulement
s = espace seulement
W = tout sauf les lettres.
D = tout sauf les nombres
S = tout sauf les espaces
*/
$string = "
Nom: $$$ la Hache d'Or Sacree
Amelioration exceptionelle
Poids: 48   Niveau minimum: 80
Remort minimum: 3
Type: hache
Dommages: 191 (+111)
Types de degats:
  dégats tranchants : 100%
Modifications:
  constitution (+2)
  dexterite (+5)
  vie max (+85)
  magie max (+100)
  sens (+23)
  sort [regeneration] (+18)
  force (+31)
  protection contre froid (+23)
  sagesse (+1)
Pouvoirs:
 - protection contre [dégats de feu] : proba 287/1000    valeur 70%
 - desenchantement : proba 297/1000    puissance 72%
 - sanctuaire : proba 100/1000    puissance 100
";

// preg_match('#Niveau minimum: ([0-9]+)#', $string, $match);
// preg_match('#Nom: ([a-z\s]+)#', $string, $match);
// reg_match_all('#^  ([a-z]+ \(\+[0-9]+\))#im', $string, $match);
// preg_match_all('#^ (\- \D+ : proba \d+.\d+    \w+ \d+%?)#im', $string, $match);
preg_match('#^(.+)\s$#i', $string, $match);
var_dump($match);

'(tyutr)'

/*function chargerClasse($class) {

  require 'class.' . $class . '.php';
}
$db = new PDO('mysql:host=localhost;dbname=asgard', 'asgard', '7566Pur16');
//Fonction qui appelle automatiquement une fonction donnée au chargement
spl_autoload_register('chargerClasse');
/*$data = array(
"Nom" => "George",
"MotdePasse" => 1234,
"DateInscription" => time(),
"Permission" => 'membre',
"Faction" => "Les defairouilleurs",
"Email" => "truc@chain.fr",
  );
$manager = new MembreManager($db);
*/


//##### On verifie si l'individu est connecté, ou a tenté de se connecté. Si c'est le cas, on créer un objet $membre
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title> Asgard Shop</title>

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="bootstrap-theme.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>


  <body>

    <!-- BARRE DE NAVIGATION -->
    <nav class="navbar navbar-expand-md navbar-dark">
      <a class="navbar-brand" href="#">Asgard Shop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbar">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Catalogue <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">A propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </nav>


    <!-- BARRE DE CONNEXION -->
    <!--
      ######## Si le visiteur n'est pas connecté,
      on affiche une barre avec un formulaire de connexion /
      inscription
    -->
     <div class="container-fluid barre-connexion">
      <div class="container">


          <form class="form-inline">
            <h8>CONNEXION</h8>
            <input class="form-control" type="text" placeholder="Login" aria-label="Login">
            <input class="form-control" type="text" placeholder="Password" aria-label="Password">
            <input class="form-control" type="submit" aria-label="OK" />
          </form>

      </div>
    </div>



<!-- CONTENU DE LA PAGE -->

<?php
include('catalogue.php')
?>



<!-- FIN ET PIED DE PAGE -->








    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>

<?php
// ### Si un objet $membre existe, alors on créer une session avec l'identifiant pour que l'objet sois recréer
// ### On verifie également qu'une session n'éxiste pas déjà
?>
