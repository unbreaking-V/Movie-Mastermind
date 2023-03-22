<?php require_once 'header.php';?>

<body>

<div class="container mt-3">
  <h2>Add a new user</h2>
  <form action="insert_user.php" method="post">
        <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" name="Username" id="Username" aria-describedby="helpId" placeholder="Enter nickname">
        <small id="helpId" class="form-text text-muted">Please enter your nickname.</small>      
        <label for="genres">Nickname</label>   
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
