<?php
// On demarre la session
session_start();
// on Verifie si les données du formulaire on été envoyé

if ((isset($_POST['label'])) && (!empty($_POST['label']))) {
    $_SESSION['message'] = ' not empty-Nouveau type de livre : "' . $_POST['label'] . '"';





    // On se connecte à la base de données

    include_once 'connect.php';

    try {
        // On nettoi les données envoyés
        $label = strip_tags($_POST['label']);

        //On prepare la requete
        $sql = "INSERT INTO type_livre2 (libelle) VALUES(?);";
        $stmt = mysqli_prepare($DataBase, $sql);
        mysqli_stmt_bind_param($stmt, 's', $label);

        // On execute la requete
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } catch (Exception $e) {
        $_SESSION['erreur'] = "Une erreur est intervenue : " . $e->getMessage();
    }


    // On redige un message pour l'utilisateur
    $_SESSION['message'] = 'Le type de livre "' . $label . '" a été enregistré';

    // On ferme la connexion
    include_once 'close.php';

    // On renvoi vers la page principale
    header('Location: index.php');
}
// On affiche le fomulaire de saiso d'uun nouveau type de livre

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Ajouter un type de livre</title>
</head>

<body>
    <main class="container">
        <div class="row">

            <section class="col-12">
                <?php
                if (!empty($_SESSION['erreur'])) {
                    print('<div class="alert alert-danger" role="alert">' . $_SESSION['erreur'] . '</div>');

                    $_SESSION['erreur'] = "";
                }

                ?>
                <h1>Ajouter un type de livre</h1>

                <form method="POST">
                    <div class="mb-3">
                        <label>Libéllé</label>
                        <input type="text" id="label" name="label" class="form-control">
                    </div>
                    <button class="btn btn-primary">Enregistrer</button>
                    <a class="btn btn-info" href="index.php"> Retour à la liste</a>
                </form>
                </session>
        </div>

    </main>
</body>

</html>