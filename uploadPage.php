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
    <title>Document</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        
        <label for="">Nome del prodotto: </label>
        <input type="text" name="Nome" id="Nome">

        <label for="">Descrizione del prodotto: </label>
        <input type="text" name="Descrizione" id="Descrizione">

        <label for="">Categoria del prodotto: </label>
        <select name="Categoria" id="Categoria">
            <?php 
            
            $sql = "SELECT NomeCategoria FROM categoria";
            $result = $conn->query($sql);
            while($row = mysqli_fetch_assoc($result)){
                foreach ($row as $value) {
                echo "<option value='Categoria'>" . $value . "</option>";
                }

            }

            ?>
        </select>

        <label for="image">Scegli un'immagine:</label>
        <input type="file" name="image" id="image" required>

        <button type="submit">Upload</button>
    </form>
</body>
</html>