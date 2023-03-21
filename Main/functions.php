<?php require_once 'db_connection.php';?>

<?php
function get_all_data(){
    global $conn;

    $result = mysqli_query($conn, "SELECT * FROM movies WHERE movieId < 50");
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="col-4">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg"
                aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" role="img" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                  dy=".3em"> <?php echo ($row["title"]) ?></text>
              </svg>

              <div class="card border-primary">
                  <div class="card-body">
            
            <center>
               <?php get_genres($row["genres"]) ?>
            </center>

                    <div class="d-flex justify-content-between align-items-center">
                        <a name="" id="" class="btn btn-sm btn-outline-secondary" href="update.php?movieId=<?php echo($row["movieId"]) ?>&title=<?php echo ($row["title"]) ?>&genres=<?php echo ($row["genres"])?>" role="button">Update</a>
                        <a name="" id="" class="btn btn-sm btn-outline-secondary" href="delete.php?movieId=<?php echo($row["movieId"]) ?>" role="button">Delete</a>
                    </div>
                    </div>
                </div>
              </div>
            </div>
        <?php
    }
}

function insert_data($title, $genres){
    global $conn;

    $sql = "INSERT INTO movies (title, genres) VALUES ('$title', '$genres')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return true;
    }
    else{
        return false;
    }
}

function delete_movie($movieId)
{
    global $conn;

    $sql = "DELETE FROM movies WHERE movieId=$movieId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return true;
    }
    return false;

}

function update_movie($movieId, $title, $genres)
{
    global $conn;

    $query = "UPDATE movies SET title='$title', genres='$genres' WHERE movieId=$movieId";

    $result = mysqli_query($conn, $query);
    if ($result) {
        return true;
    }
    return false;

}


function get_genres($genres)
{
    $genres_array = explode("|", $genres);
    // if the genres are empty, display a badge with the text "No genres"
    if (count($genres_array) == 1 && $genres_array[0] == "") {
        ?>

        <span class="badge rounded-pill bg-secondary">No genres</span>
        <?php
        return;
    }
    foreach ($genres_array as $genre) {
        ?>
     <span class="badge rounded-pill bg-primary">
            <?php echo $genre ?>
        </span>
        <?php
    }
}
?>