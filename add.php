<?php
// On demarre une session
session_start();

// On verifie l'envoie du formulaire

// Connection a la BD

// Netoyge des donnés envoyées

// Préparation de requete

// Execution de la requete

// Message d'indication

// Fermeture de la session

// On renvoie vers la page principale

// Si erreur

// On affiche le formulaire de saisie d'un nouveau "type de livre"

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un type de livre</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php
                if (!empty($_SESSION['erreur'])) {
                    print('<div class="alert alert-danger" role="alert"></div>');
                    $_SESSION['erreur'] = "";
                }
                ?>
                <h1>Ajouter un type de livre</h1>
                <form>

                </form>
            </section>
        </div>
    </main>
</body>

</html>