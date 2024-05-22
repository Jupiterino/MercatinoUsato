<?php
session_start();
include('script.php');

if( empty($_SESSION["loggato"]) ){
            
    header("Location: LoginPage.html");
}



        

        $nome = $_POST['Nome'];
        $descrizione = $_POST['Descrizione'];
        $categoria = $_POST['Categoria'];
        $image = $_FILES['image'];
        
        // PORTA IL FILE NELLA CARTELLA DEDICATA [V]
        $imgContent = file_get_contents($image['tmp_name']);
        $CARTELLA = 'imgs/';
        $imageName = basename($image['name']);
        $targetFilePath = $CARTELLA . time() . '_' . $imageName;
        
        if (!move_uploaded_file($image['tmp_name'], $targetFilePath)) {
            $_SESSION["messaggio"] = "Errore durante il salvataggio dell'immagine.";
            header('Location: Messaggio.php');

        }
        $imageLink = $targetFilePath;
        $_SESSION['provaa'] = $imageLink;
        /*
        $sql1 = "SELECT ID FROM categoria WHERE categoria.NomeCategoria = '$categoria'";

        $result1 = mysqli_query($conn, $sql1);
        if ($result1 && mysqli_num_rows($result1) > 0) {
            $row = mysqli_fetch_assoc($result1);
            $id = $row['ID'];
            $ID_CAT = $id;
        } else {
            echo "Nessuna categoria trovata con il nome specificato.";
        }  NON FA ZIO PERAAAAA*/ 
        //$result1 = $conn->query($sql1);
        //$row1 = $result1->fetch_assoc();
        //$ID_CAT = $row1['ID'];
        
        
        

        $email = $_SESSION["email"];
        $pw = $_SESSION["pw"];
        $idu = $_SESSION["IDU"];

        
        //$sql2 = "SELECT ID FROM utente WHERE utente.Email = '$email' && utente.Password = '$pw'";
        //$result2 = $conn->query($sql2);
        //$row2 = mysqli_fetch_assoc($result2);
        //$ID_UT = $row2['ID'];
        $_SESSION["provaa"] = "dati=  " . $descrizione . " " . $imageLink . " " . $ID_CAT . " " . $idu . " " . $nome . "";
        
        $sql3 = "INSERT INTO oggetto (Descrizione, Foto, IDCategoria, IdUtente, Nome) VALUES ('$descrizione', '$imageLink', 2, $idu, '$nome')";
        if ($conn->query($sql3) == TRUE) {
            $_SESSION["messaggio"] = "Prodotto caricato correttamente";
        } else {
            $_SESSION["messaggio"] = "Errore durante il caricamento del prodotto: " . $conn->error;
        }

        header('Location: Messaggio.php');

    


?>