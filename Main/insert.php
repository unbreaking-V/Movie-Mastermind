<?php require_once 'functions.php';?>

<?php
    function error_redirect() {
    header("Location: main.php?error=1");
    }
if (isset($_POST["title"],$_POST["genres"], $_POST["tags"]) && 
    !empty($_POST["title"]) && !empty($_POST["genres"]) && !empty($_POST["tags"]))
    {
        $result = insert_data ($_POST["title"], $_POST["genres"], $_POST["tags"]);
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