<?php require_once 'functions.php';?>

<?php
    function error_redirect() {
    header("Location: main.php?error=1");
    }

if (isset($_POST["Username"]) &&  !empty($_POST["Username"]))
    {
        $result = insert_user($_POST["Username"]);
        if ($result)
        {
            header("Location: main.php"); 
        }
        else {
            error_redirect();
        }
    }
    else {
        error_redirect();

    }


?>