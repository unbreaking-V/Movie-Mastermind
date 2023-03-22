<?php require_once 'header.php';?>

<body>

<div class="container mt-3">
  <h2>Add a new movie</h2>
  <form action="insert.php" method="post">
    <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Enter title">
        <small id="helpId" class="form-text text-muted">Please enter your movie title.</small>      
        <label for="title">Title</label>   
    </div>

    <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" name="genres" id="genres" aria-describedby="helpId" placeholder="Enter genres">
        <small id="helpId" class="form-text text-muted">Please enter the genres of your movie.</small>      
        <label for="genres">Genres</label>   
    </div>

    <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" name="tags" id="tags" aria-describedby="helpId" placeholder="Enter tags">
        <small id="helpId" class="form-text text-muted">Please enter the tags of your movie.</small>      
        <label for="tags">Tags</label>   
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
