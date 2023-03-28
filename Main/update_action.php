<?php require_once 'functions.php';?>

<?php
    function error_redirect() {
        header("Location: main.php?error=1");
    }
    if (isset($_POST["title"],$_POST["genres"], $_POST["tags"]) && 
    !empty($_POST["title"]) && !empty($_POST["genres"]) )
    {
        
        $result = update_movie($_GET["movieId"],$_POST["title"], $_POST["genres"]);
        $result_tags = update_tags($_GET["movieId"], $_POST["tags"]);
        if ($result && $result_tags)
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