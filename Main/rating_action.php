<?php
require_once "functions.php";

if (!empty($_POST)) {
    if (
        isset($_GET["movieId"]) && isset($_POST["rating"]) && isset($_POST["tags"]) 
        && !empty($_GET["movieId"]) && !empty($_POST["rating"]) )
     {
        $result = add_rating($_GET["movieId"], $_POST["userId"], $_POST["rating"]);
        $result_tags = update_tags($_GET["movieId"], $_POST["tags"]);

        if (!$result) {
            header("Location: add_rating.php?movieId=$_POST[movieId]&error=1");
        } else {
            header("Location: main.php");
        }
    } else {
        // Redirect to the update page with an error
        header("Location: add_rating.php?movieId=$_POST[movieId]&error=2");
    }
}
?>