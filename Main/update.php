<?php include 'header.php'; ?>
<?php require_once 'update.php';?>
<?php require_once 'functions.php';?>


<div class="container mt-3">

<form action="update_action.php?movieId=<?php echo $_GET["movieId"] ?>" method="post">

    <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Enter title" 
        value='<?php $url_components = parse_url($_SERVER['REQUEST_URI']); 
        parse_str($url_components['query'], $params);
        echo $params['title']; ?>' >
        <small id="helpId" class="form-text text-muted">Please enter your movie title.</small>      
        <label for="title">Title</label>   
    </div>

    <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" name="genres" id="genres" aria-describedby="helpId" placeholder="Enter genres"
        value='<?php $url_components = parse_url($_SERVER['REQUEST_URI']); 
        parse_str($url_components['query'], $params);
        echo $params['genres']; ?>'>
        <small id="helpId" class="form-text text-muted">Please enter the genres of your movie. <br>If there is more than one genre, enter the following words using: "|" </small>      
        <label for="genres">Genres</label>   
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

    <button type="submit" class="btn btn-primary">Submit</button>
 

</form>    

</div>
