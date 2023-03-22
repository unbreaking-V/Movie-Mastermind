<?php require_once 'header.php';?>
<?php require_once 'functions.php';?>

<center>
    <div class="w-50 p-3">
        <div class="d-flex bd-highlight mb-2">
        <div class="p-2 flex-fill bd-highlight"><?php display_ratings($_GET["movieId"]);?></div>
        </div>
    </div>
</center>



<?php include("footer.php") ?>
