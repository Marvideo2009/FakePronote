<?php
session_start();
$erreur = "";
$bdd = new PDO(
	'mysql:host=566pq.myd.infomaniak.com;dbname=566pq_famille;charset=utf8',
	'566pq_Marvideo',
	'Framboise1'
);
if(isset($_GET['exec'])) {?>
    <script type='text/javascript'>
    /*setTimeout(function() {*/
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Vous etes Connecté'
})
        /*document.location.replace('index.php');
    }, 2000);*/
    </script>
    <?php
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/form.css" />
</head>

<body>
    <?php
    if (isset($_SESSION['id'])) {
        echo "<script type='text/javascript'>document.location.replace('/pronote/eleve/');</script>";
        $TraitementFini = true;
    } else {
        if (isset($_POST['valider'])) {
            if (!isset($_POST['pseudo'], $_POST['mdp'])) {
                $erreur = "Un des champs n'est pas reconnu.";
            } else {
                if (!$bdd) {
                    echo "Erreur connexion BDD";
                } else {
                    $Pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "UTF-8");
                    $Mdp = md5($_POST['mdp']);
                    $Mdp = hash('sha256', $Mdp);
                    $req = $bdd->query("SELECT * FROM eleve WHERE username='$Pseudo' AND mdp='$Mdp'");
                    if ($req->rowCount() == 0) {
                        $erreur = "Pseudo ou mot de passe incorrect.";
                    } else {
                        #$_SESSION['pseudo'] = $Pseudo;
                        $nbperms = $bdd->query("SELECT * FROM eleve WHERE username='$Pseudo' AND mdp='$Mdp'");
                        $donnees = $nbperms->fetch();
                        //while ($donnees = $nbperms->fetch())
                            //$_SESSION['test'] = $donnees;
                            $_SESSION['id'] = $donnees['id'];
                            if(isset($_GET['redirect']) AND $_GET['redirect'] != ""){
                                echo "<script type='text/javascript'>document.location.replace('" . $_GET['redirect'] . "');</script>";
                                exit();
                            } else {
                                echo "<script type='text/javascript'>document.location.replace('/pronote/eleve/');</script>";
                                exit();
                            }
                            $TraitementFini = true;
                    }
                    //$_SESSION['id'] = "1";
                    //$_SESSION = $perms;
                }
            }
        }
    }
    if(isset($_GET['redirect']) AND $_GET['redirect'] != ""){
        $link = "connexion.php?redirect=" . $_GET['redirect'];
    } else {
        $link = "connexion.php";
    }
    if (!isset($TraitementFini)) {
        ?>
        <p>Remplissez le formulaire ci-dessous pour vous connecter:</p>
        <form method="post" action="<?= $link ?>">
            <label>Username : </label>
            <input type="text" name="pseudo" placeholder="PNOM" required>
            </br>
            </br>
            <label>Mots de passe : </label>
            <input type="password" name="mdp" placeholder="mot de passe" required>
            <a href="mdp-reset.php">Mots de passe oublié !</a>
            </br>
            </br>
            <input type="submit" name="valider" value="Connexion">
            <div class="erreur">
                <?php
                if($erreur != ""){
                    echo $erreur;
                }
                ?>
            </div>
        </form>
        </br>
    <?php
    }
    ?>
</body>

</html>