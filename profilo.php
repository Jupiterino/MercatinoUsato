<?php
session_start();
include('script.php');

if( empty($_SESSION["loggato"]) ){
            
    header("Location: LoginPage.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Ciao 
        <?php 
            echo $_SESSION['nome'];
        ?>
    </h1>

    <a class='btn btn-primary' href='uploadPage.php' role='button'>CARICA UN PRODOTTO</a>
    <?php 
        $sql = "SELECT oggetto.Nome, Foto, Descrizione, utente.Nome, utente.Email, utente.Password FROM oggetto JOIN utente ON oggetto.IdUtente = utente.ID";   
        $result = $conn->query($sql);
        $COLONNA = mysqli_fetch_assoc($result);

        if ($result->num_rows > 0) {
            while($COLONNA = $result->fetch_assoc()) {
            if($_SESSION['pw'] == $COLONNA['Password'] && $_SESSION['email'] == $COLONNA['Email']){
            
                echo "<div class='box'>";
                echo "<img src= '" . $COLONNA['Foto'] .  "' alt='foto' class='Fotoo'>";
                echo "<div>";
                echo "<h4><b> " . $COLONNA['Nome'] . "</b></h4>";
                echo "<p>" . $COLONNA['Descrizione'] . "</p>";
                echo "</div>";
                echo "</div>";
            }   
            
            }
        }
    ?>
    <a href="index.php">
    <button>torna alla home</button></a>
</body>
</html>