<?php include 'header.php'; ?>
<?php require_once 'functions.php';?>


<div class="container mt-3">

<form action="rating_action.php?movieId=<?php echo $_GET["movieId"] ?>" method="post">

    <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Enter title" 
        value='<?php $url_components = parse_url($_SERVER['REQUEST_URI']); 
        parse_str($url_components['query'], $params);
        echo $params['title']; ?>' disabled>
        <label for="title">Title</label>   
    </div>

    <div class="mb-3">
        <label for="rating">Rating</label>   
        <select class="form-select" name="rating" id="">
                            <?php
                            $stars = array(1,2,3,4,5);
                            foreach ($stars as $star) {
                            ?>
                                <option value="<?php echo $star; ?>">
                                <?php echo $star; ?>
                                </option> 
                                <?php
                            }
                            ?>
                        </select>

    </div>

    <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" name="tags" id="tags" aria-describedby="helpId" placeholder="Enter tags"
        value='<?php $url_components = parse_url($_SERVER['REQUEST_URI']); 
        parse_str($url_components['query'], $params);
        echo $params['tags'];
        ?>'>
        <small id="helpId" class="form-text text-muted">Please enter the tags of your movie. <br>If there is more than one tag, enter the following words using: ","</small>      
        <label for="tags">Tags</label>   
    </div>
    <div class="mb-3 ">
                        <label for="" class="form-label">User</label>
                        <select class="form-select" name="userId" id="">
                            <?php
                            $users = get_users();
                            foreach ($users as $user) {
                                echo "<option value='$user[userId]'>$user[Username]</option>";
                            }
                            ?>
                        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
 

</form>    

</div>
