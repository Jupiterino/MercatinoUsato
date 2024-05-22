<?php

    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbName = "mercatinousato";

    mysqli_report(MYSQLI_REPORT_OFF);
    $conn = new mysqli($servername, $username, $password, $dbName);

    if($conn->connect_error){
        echo "Errore connessione";

    }

    //INSERT INTO `oggetto` (`ID`, `Nome`, `Foto`, `Descrizione`, `IDCategoria`, `IdUtente`) VALUES (NULL, 'Libro', 'link della foto', 'descrizione...', NULL, '1')
    //INSERT INTO `oggetto` (`ID`, `Nome`, `Foto`, `Descrizione`, `IDCategoria`, `IdUtente`) VALUES (NULL, 'Mestolo', 'foto...', 'descrizione...', NULL, '1')
?>