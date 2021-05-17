<?php 
//On demarre une sesssion
session_start();

//Esct ce que la variable global $_POST['label']n'est pas vide
if ( (isset($_POST['libelle'])) && (!empty($_POST['libelle'])) ){
    // 
    $id =strip_tags($_GET['id']);
    $label =strip_tags($_POST['libelle']);


   

    // On se connecte à la base de données
    include_once('connect.php');
    //On exécute la reque^te SQL et on stocke le résultat dans un tableau associatif 

    
    $sql ='UPDATE type_livre2 SET libelle = ? WHERE id = ?;';

    //on prepare la requete 
    $stmt = mysqli_prepare( $DataBase,$sql);

    // on relie la variable libelle et id
    mysqli_stmt_bind_param($stmt,'si', $label, $id);

//on execute la requete
    mysqli_stmt_execute($stmt);

  mysqli_stmt_close($stmt);
    //On ferme la connexion 
    //include_once('close.php');
    
        $_SESSION['message'] ='Le type de livre "' . $label . '"a été modifié' ;

        header('Location: index.php');
       
    
}else {
//Esct ce que l'id existe et n'est pas vite dans l'URL
if ((isset($_GET['id'])) && !empty($_GET['id']))
{
    $id =strip_tags($_GET['id']);


   

    // On se connecte à la base de données
    include_once('connect.php');
    //On exécute la reque^te SQL et on stocke le résultat dans un tableau associatif 

    
    $sql ='SELECT id, libelle FROM type_livre2 WHERE id = ?;';

    //on prepare la requete 
    $stmt = mysqli_prepare($DataBase,$sql);

    // on relie la variable id
    mysqli_stmt_bind_param($stmt,'i',$id);

//on execute la requete
    mysqli_stmt_execute($stmt);

    //on definit les variable qui va recup le type de livre
    mysqli_stmt_bind_result($stmt, $id, $label);

    mysqli_stmt_fetch($stmt);

    //On ferme la connexion 
    //include_once('close.php');
    
}
}

    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Mofier</title>
    </head>
    <body>
    <main class ="container">
        <div class="row">
            <section class="col-12">
            <h1>Mofier le type de  livre <?php print($label); ?></h1>

            <form method="POST">
            <div class="mb-3">

            <p>ID : <?php print($id) ;?> </p>
            
                
            <label for="label">Libéllé</label>
            <input type="hidden" id='id_t' name="id_t" value="<?php print($id) ;?>">
            <input type="text" id="libelle" name="libelle" class="form-control" value="<?php print($label); ?>">
            </div>
            <p>
            
                <a class ="btn btn-info" href="index.php"> Retour à la liste </a>
                <button class="btn btn-primary"> Modifier</button>
                
            </p>
            </form>
            </section>
        </div>
    </main>
        
    </body>
    </html>