<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="alert alert-primary" role="alert">
      Vous etes connecté !
    </div>
    <?php
    session_start();
    include_once('conf.php');
    $bdd = mysqli_connect(SERVEUR,USER,MDP,DB);
    $resultat = mysqli_query($bdd,'SELECT libelle FROM type_livre ');
    echo mysqli_num_rows($resultat);
    echo '</br>';
    while($donnees = mysqli_fetch_assoc($resultat)){
        echo $donnees['libelle'] . " " . $donnees['message'] . '</br>';
    }

    function  ConsulterBD (){
        //--- Début de table en HTML
        echo "<center>" ;
        echo "<table class='table'>" ;
        echo "<caption> <h2> Clients </h2> </caption>" ;
        echo "<tr> <th> Nom </th> <th> Prénom </th> <th> Age </th> <th> Sexe </th> <th> Metier </th> <th> Departement </th> </tr>" ;
      
        //--- Connection au SGBDR 
        $DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;
        //--- Ouverture de la base de données
        mysqli_select_db ( $DataBase, "bd04" ) ;
      
        //--- Préparation de la requête
        $Requete = "Select * From client join departement on client.NumDep=departement.NumDep order by IDPers DESC ;" ;
          
        //--- Exécution de la requête (fin du script possible sur erreur ...)
        $Resultat = mysqli_query ( $DataBase, $Requete )  or  die(mysqli_error($DataBase) ) ;
      
        //--- Enumération des lignes du résultat de la requête
        while (  $ligne = mysqli_fetch_array($Resultat)  )
        {
          //--- Afficher une ligne du tableau HTML pour chaque enregistrement de la table 
          echo "<tr>\n" ;
          $id_option= $ligne['IDPers'] ;
          echo "<td>" . $ligne['NomFamille']    . "</td>\n" ;
          echo "<td>" . $ligne['Prenom']        . "</td>\n" ;
          echo "<td>" . $ligne['Age']           . "</td>\n" ;
          echo "<td>" . $ligne['Sexe']          . "</td>\n" ;
          echo "<td>" . $ligne['Metier']        . "</td>\n" ;
          echo "<td>" . $ligne['NomDep']        . "</td>\n" ;
          echo "<td>  <form action='?.php'> 
                      <input type=hidden name=IDPers value='$id_option'>
                      <input type=hidden name=action value='Modifier'>                
                      <input type=submit value=Modifier>
                      </form></td>" ;
          echo "</tr>\n" ;
      
      
        }
         
        //--- Libérer l'espace mémoire du résultat de la requête
        mysqli_free_result ( $Resultat ) ;
      
        //--- Déconnection de la base de données
        mysqli_close ( $DataBase ) ;  
      
        //--- Fin de table en HTML
        echo "</table>" ;
        echo "</center>" ;
      }

      ConsulterBD();
    ?>
    </div>
</div>
</body>
</html>