<?php require_once 'db_connection.php';?>

<?php
function get_all_data(){
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM movies LIMIT 50");
    
    while ($row = mysqli_fetch_assoc($result)) {
        $rating_sql = "SELECT AVG(rating) AS rating FROM ratings WHERE movieId = " . $row["movieId"];
        $rating_result = mysqli_query($conn, $rating_sql);
        $rating_row = mysqli_fetch_assoc($rating_result);
        $rating = round($rating_row["rating"], 0);

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
        <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-2 d-flex flex-column align-self-end position-static">
        <div class="d-grid gap-2 d-md-flex justify-content-center">
            </div>
        <center>

        <p class="card-text">
                        <?php for ($i = 0; $i < $rating; $i++) {
                            ?>
                            <span class="fa fa-star" style="color: orange"></span>
                            <?php
                        }
                        for ($i = $rating; $i < 5.0; $i++) {
                            ?>
                            <span class="fa fa-star"></span>
                            <?php
                        }
                        ?>
                    </p>
        
           

                <?php get_genres($row["genres"]) ?>
                <br>
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
            <br>
                    <div class="d-flex justify-content-between align-items-end">
                        <a name="" id="" class="btn btn-sm btn-outline-secondary" href="update.php?movieId=<?php echo($row["movieId"]) ?>&title=<?php echo ($row["title"]) ?>&genres=<?php echo ($row["genres"])?>&tags=<?php echo $tags?>" role="button">Update</a>
                        <a name="" id="" class="btn btn-sm btn-outline-secondary" href="add_rating.php?movieId=<?php echo($row["movieId"]) ?>&title=<?php echo ($row["title"]) ?>&tags=<?php echo $tags?>" role="button">Add Rating</a>
                        <a name="" id="" class="btn btn-sm btn-outline-secondary" href="ratings.php?movieId=<?php echo($row["movieId"]) ?>" role="button">View Rating</a>
                        <a name="" id="" class="btn btn-sm btn-outline-secondary" href="delete.php?movieId=<?php echo($row["movieId"]) ?>" role="button">Delete</a>

                    </div>
          
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="350" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo ($row["title"]) ?></text></text></svg>
          
        </div>
      </div>
    </div>
          
        <?php
    }
}

function insert_data($title, $genres){
    global $conn;

    $sql = "INSERT INTO movies (title, genres) VALUES ('$title', '$genres')";
    $insert_m_result = mysqli_query($conn, $sql);

    if ($insert_m_result) {
        return true;
    }
    else{
        return false;
    }
}

function insert_user($Username){
    global $conn;

    $sql = "INSERT INTO user(Username) VALUES ('$Username')";
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


function display_ratings($movieId)
{
    global $conn;
    $sql = "SELECT userId,rating FROM ratings WHERE movieId=$movieId";
 
    

    $result = mysqli_query($conn, $sql);
    if (!mysqli_num_rows($result) > 0) {
        ?>
        <!-- Centered out by y and x text 'No ratings yer' -->
        <div class="d-flex justify-content-center align-items-center h-100">
            <h3 class="text-muted">No available ratings yet</h3>
        </div>
        <?php
        return;
    }
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
    
        <div class="card">
            <h5 class="card-header"><p class="card-text">User id: <?php echo($row["userId"]) ?></p></h5>
            <div class="card-body">
            
                <div class="height-50 d-flex justify-content-center align-items-center">
                    <?php
                            $rating = round($row["rating"]);
                            for ($i = 0; $i < $rating; $i++) {
                                ?>
                                <span class="fa fa-star" style="color: orange"></span>
                                <?php
                            }
                            for ($i = $rating; $i < 5.0; $i++) {
                                ?>
                                <span class="fa fa-star"></span>
                                <?php
                            }

                            ?>
            
                </div>
             <h4 class="card-title">Rating: <?php echo ($row["rating"]) ?></h4>
        </div>
    </div>
        
        <?php
    }
}

function add_rating($movieId, $userId, $rating)
{
    global $conn;
    $sql = "SELECT * FROM ratings WHERE movieId=$movieId AND userId=$userId";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return false;
    }

    // Verify if the rating is valid
    if ($rating < 0 || $rating > 5) {
        return false;
    }
    $rating = round($rating, 1);

    $sql = "INSERT INTO ratings (movieId, userId, rating) VALUES ($movieId, $userId, $rating)";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return false;
    }

    // If tags are empty, we don't need to insert them
    if (empty($tags)) {
        return true;
    } 

}

function get_users()
{
    global $conn;

    $sql = "SELECT * FROM user WHERE userId > 610;";
    $result = mysqli_query($conn, $sql);
    return $result;
}

?>