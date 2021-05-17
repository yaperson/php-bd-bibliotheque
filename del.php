<?php

function  SupprimerBD ( )
{
 
  session_start();
  if ((isset($_GET['id']) && !empty($_GET['id']))) {

      $id = strip_tags($_GET['id']);
      include_once('connect.php');

      $sql = 'DELETE FROM type_livre2 WHERE id = ?;' ;

      $stmt = mysqli_prepare($db, $sql);

      mysqli_stmt_bind_param($stmt, 'i', $id);

      mysqli_stmt_execute($stmt);

      mysqli_stmt_bind_result($stmt, $id, $libelle);
      mysqli_stmt_fetch($stmt);
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
        <title>Oui</title>
    </head>
    <body>
    <p>Etes vous sur de vouloir supprimer ?</p>
    <form action="SupprimerBD">
    <input type="submit" class="btn btn-danger">Confirmer</input>
    </form>
    </body>
    </html>