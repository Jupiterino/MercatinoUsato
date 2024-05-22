<?php

    session_start();
    include('script.php');

    if( empty($_SESSION["loggato"]) ){
                
        header("Location: LoginPage.html");
    }

    $email = $_POST["email"];
    $password = $_POST["password"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $eta = $_POST["eta"];

    /*if() {

        //If che controlla la mail, accettate solo gmail, virgilio, yahoo, libero

    }*/
    $HASHpassword = hash('sha256', $password);
    $sql = "INSERT INTO utente (Nome, Cognome, Email, Password, Eta) VALUES ('$nome', '$cognome', '$email', '$HASHpassword', '$eta')";
    if ($conn->query($sql) == TRUE) {

        if($conn -> affected_rows == 0){

            $_SESSION["messaggio"] = "Error creating User: " . $conn->error;
            header('Location: Messaggio.php');
        }
        
        else {
            $SQL2 = "SELECT * FROM utente WHERE utente.Email = $email AND utente.Password = $HASHpassword";
            $result2 = mysqli_query($conn, $SQL2);
            $row = mysqli_fetch_assoc($result2);
            $_SESSION["IDU"] = $row['ID'];
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email;
            $_SESSION['pw'] = $HASHpassword;
            $_SESSION["loggato"] = "log";
            $_SESSION["messaggio"] = "New User created successfully";
            header('Location: Messaggio.php');
        }

    }
    
    else {

        $_SESSION["messaggio"] = "Error creating User: " . $conn->error;
        header('Location: Messaggio.php');
    }

?> 