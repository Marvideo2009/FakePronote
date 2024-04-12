<?php
echo "<script type='text/javascript'>document.location.replace('connexion.php');</script>";
$bdd = new PDO(
	'mysql:host=566pq.myd.infomaniak.com;dbname=566pq_famille;charset=utf8',
	'566pq_Marvideo',
	'Framboise1'
);

$recipesStatement = $bdd->prepare('SELECT * FROM eleve');
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

foreach ($recipes as $recipe) {
    ?>
        <p><?php echo $recipe['prenom']; ?></p>
    <?php
    }
?>