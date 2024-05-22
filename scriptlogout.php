<?php
session_start();
include('script.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
            if( empty($_SESSION['loggato']) ){
                
                header("Location: LoginPage.html");
            }
            unset($_SESSION['loggato']);
            echo "LOGOUT EFFETTUATO";
        ?>
        <a href="index.php" >
                <button>Torna alla home page</button>
            </a>
</body>
</html>