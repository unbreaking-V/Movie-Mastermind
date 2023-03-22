<?php require_once 'db_connection.php';?>

<?php
function get_all_data(){
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM movies LIMIT 50");
    while ($row = mysqli_fetch_assoc($result)) {
        $sql = "SELECT DISTINCT * FROM tags WHERE movieId = " . $row["movieId"];
        $full_line = mysqli_query($conn, $sql);
        $tags = "";
        while ($line = mysqli_fetch_assoc($full_line)) {
            $position = strpos($tags, $line["tag"]);
            if ($position === false) {
                $tags .= $line["tag"] . ", ";
            }
        }
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
            <center>
                <?php
                if ($tags != "") {
                    view_tags($tags);
                } else {
                    ?>
                    <span class="badge bg-danger">No tags</span>
                    <?php
                }
                ?>
            </center>

                    <div class="d-flex justify-content-between align-items-center">
                        <a name="" id="" class="btn btn-sm btn-outline-secondary" href="update.php?movieId=<?php echo($row["movieId"]) ?>&title=<?php echo ($row["title"]) ?>&genres=<?php echo ($row["genres"])?>&tags=<?php echo $tags?>" role="button">Update</a>
                        <a name="" id="" class="btn btn-sm btn-outline-secondary" href="delete.php?movieId=<?php echo($row["movieId"]) ?>" role="button">Delete</a>
                    </div>
                    </div>
                </div>
              </div>
            </div>
        <?php
    }
}

function insert_data($title, $genres, $insert_tags){
    global $conn;

    $sql = "INSERT INTO movies (title, genres) VALUES ('$title', '$genres')";
    $insert_m_result = mysqli_query($conn, $sql);

    $test1 = "SELECT movieId FROM movies WHERE title=$title";

    $insert__t_query = "INSERT INTO tags (movieId, tag) VALUES ('$test1','$insert_tags')";
    $insert_t_result = mysqli_query($conn, $insert__t_query);

    if ($insert_m_result && $insert_t_result) {
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
    $delete_m_result = mysqli_query($conn, $sql);

    $delete_tags = "DELETE FROM tags WHERE movieId=$movieId";
    $delete_t_result = mysqli_query($conn, $delete_tags);

    if ($delete_m_result && $delete_t_result) {
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

function update_tags($movieId, $new_tags)
{
    global $conn;
    $tags_query = "INSERT INTO tags (movieId, tag) VALUES ('$movieId', '$new_tags')";
    $tags_result = mysqli_query($conn, $tags_query);
    $tags_query = "UPDATE tags SET tag='$new_tags' WHERE movieId=$movieId";
    
    if($new_tags == " "){
        $tags_query = "DELETE FROM tags WHERE movieId=$movieId";
    }
    
    $tags_result = mysqli_query($conn, $tags_query);
    if ($tags_result) {
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

function view_tags($tags)
{
    if (substr($tags, -2) == ", ") {
        $tags = substr($tags, 0, -2);
    }
    $tags_array = explode(", ", $tags);
    foreach ($tags_array as $tag) {
        ?>
        <span class="badge bg-info text-dark">
            <?php echo $tag ?>
        </span>
        <?php
    }
}


?>