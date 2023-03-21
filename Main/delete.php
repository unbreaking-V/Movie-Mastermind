<?php require_once 'functions.php';?>

<?php
function error_redirect() {
        header("Location: main.php?error=1");
    }

$result = delete_movie($_GET["movieId"]);
if ($result)
    {
        header("Location: main.php"); 
    }
    else 
    {
        error_redirect();
    }

?>