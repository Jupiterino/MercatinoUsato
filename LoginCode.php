<?php

    session_start();
    include('script.php');
    unset($_SESSION['messaggio']);


    $email = $_POST["email"];
    $password = $_POST["password"];
    $HASHpassword = hash('sha256', $password);

    $_SESSION["errore"] = "";

    $sql = "SELECT * FROM utente WHERE Email = '$email' && Password = '$HASHpassword'";
    $result = $conn->query($sql);

    if ($result == FALSE) {
        $_SESSION['messaggio'] = " NON SEI ANCORA REGISTATO!!!";
        header('Location: Messaggio.php');
      }

    else {

        if($result->num_rows == 0) {

            $_SESSION['messaggio'] = " NON SEI ANCORA REGISTATO!!!";
            header('Location: Messaggio.php');
        } 

        else {

            $row = $result->fetch_assoc();

            if($HASHpassword != $row["Password"]) {

                $_SESSION["messaggio"] = "Error wrong password: " . $conn->error;
                header('Location: Messaggio.php');
            } 
            
            else {
                
                $_SESSION["loggato"]="log";
                $_SESSION["IDU"] = $row['ID'];
                $_SESSION["nome"] = $row['Nome'];
                $_SESSION["email"] = $email;
                $_SESSION["pw"] = $HASHpassword;
                header('Location: index.php');
            }

        }
    }
?> 