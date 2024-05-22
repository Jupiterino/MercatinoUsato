<?php
    session_start();
    include('script.php');
    //unset($_SESSION["loggato"]);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Index</title>
    </head>
    <body>

        <!--<a href="LoginPage.html">pagina Login</a>-->

        <?php
        if( !empty($_SESSION['loggato'])){
            
            echo "<h1>Benvenuto " . $_SESSION['nome'] . "</h1>";
        }
        if( !empty($_SESSION['provaa'])){
            
            echo "<h1>" . $_SESSION['provaa'] . "</h1>";
        }

            $sql = "SELECT oggetto.Nome, Foto, Descrizione, utente.Nome, utente.Email, utente.Password FROM oggetto JOIN utente ON oggetto.IdUtente = utente.ID";   
            $result = $conn->query($sql);
            $COLONNA = mysqli_fetch_assoc($result);

            if ($result->num_rows > 0) {
                while($COLONNA = $result->fetch_assoc()) {
                if($_SESSION['pw'] != $COLONNA['Password'] && $_SESSION['email'] != $COLONNA['Email']){
                
                    echo "<div class='box'>";
                    echo "<img src= '" . $COLONNA['Foto'] .  "' alt='foto' class='Fotoo'>";
                    echo "<div>";
                    echo "<h4><b> " . $COLONNA['Nome'] . "</b></h4>";
                    echo "<p>" . $COLONNA['Descrizione'] . "</p>";
                    echo "<p> caricata da " . $COLONNA['Nome'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }   
                
                }

            }
            else {
                echo "0 results";
            }
            
           
        ?><br>

        <a class='btn btn-primary' href=' 
        <?php 
            if( !empty($_SESSION["loggato"]) ) {
                ?>
                https://www.youtube.com/
                <?php
            }
            else{
                ?>
                LoginCode.php
                <?php
            }
        ?>
        ' role='button'>Link</a>
        <br><br>
        <a class='btn btn-primary' href='profilo.php' role='button'>PROFILO PERSONALE</a><br><br>
        <a class='btn btn-primary' href='scriptlogout.php' role='button'>LOG OUT</a><br><br>
    </body>

</html>