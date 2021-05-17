<?php
//------------------------------------------------------------------------------
//  Consultation de la BD et affichage des enregistrements dans un tableau
//

function  SupprimerBD ( $NomRecherche )
{
  $id = $_GET['id'] ;
  
  

  //--- Connection au SGBDR 
  include_once('connect.php');

  //--- Ouverture de la base de données
  

  
  
  // Delete FROM personne where nom='DUPONT' Limit 1;
  $sql = "DELETE From Type_de_livre Where id_t='". $id ."' Limit 1;" ;
  //--- Préparation de la requête
  $stmt = mysqli_prepare($DataBase,$sql);
    
  //--- Exécution de la requête 
  mysqli_stmt_execute($stmt);

  mysqli_stmt_close($stmt);



  //--- Déconnection de la base de données
  header('Location: index.php');
  
}
//------------------------------------------------------------------------------
//  Programme Principal
//
if (  isset($_GET['id'])  )
{
  $id = $_GET['id'] ;

  if (  isset($id)  &&  ($id!='')  )
  {
    //--- Suppression ...
    SupprimerBD ( $id ) ;
  }
}
 
//------------------------------------------------------------------------------
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
    <p>Etes vous sur de vouloir supprimer</p>
<?php
    echo "<input type='button' value='OUI'>";
    echo"<input type='button' value='NON'>";

    $btn = document.querySelector('input');

    $btn.addEventListener('click', updateBtn);
    function updateBtn() {
    if ($btn.value === 'OUI') {
        if (  isset($_GET['id_t'])  )
  {
    $id = $_GET['id_t'] ;

    if (  isset($id)  &&  ($id!='')  )
    {
      //--- Suppression ...
      SupprimerBD ( $id ) ;
    }
  }

    
  } else {
    header('Location: index.php');
    
  }
}
?>
        
    </body>
    </html>