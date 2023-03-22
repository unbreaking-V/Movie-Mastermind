<!doctype html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Uladzislau Abeziuk and Artiom Zajanczkowski">
  <meta name="generator" content="Hugo 0.72.0">

  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/album/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


</head>



<header>
    <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-1 col-md-2 py-4">
          <nav class="nav flex-column">
              <a class="nav-link active" aria-current="page" href="insert_page.php">Add movie</a>
              <a class="nav-link active" aria-current="page" href="insert_user_page.php">Add user</a>
          </nav>
          </div>
          <div class="col-sm-8 offset-md-2 py-4">
          <h4 class="text-white">About</h4>
            <p class="text-muted">This is a basic internet application for managing the Movie-Lens dataset, 
                                  which provides functionalities to insert, delete, modify movies, add or remove tags from movies, 
                                  add new users and ratings, and view movies, ratings, and tags.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="/main.php" class="navbar-brand d-flex align-items-center">
        <strong>Movie-Mastermind</strong>

      <style>
          .svg-icon {
            width: 2em;
            height: 2em;
          }

          .svg-icon path,
          .svg-icon polygon,
          .svg-icon rect {
            fill: #A020F0;
          }

          .svg-icon circle {
            stroke: #A020F0;
            stroke-width: 1;
          }
      </style>

        <svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M17.919,4.633l-3.833,2.48V6.371c0-1-0.815-1.815-1.816-1.815H3.191c-1.001,0-1.816,0.814-1.816,1.815v7.261c0,1.001,0.815,1.815,1.816,1.815h9.079c1.001,0,1.816-0.814,1.816-1.815v-0.739l3.833,2.478c0.428,0.226,0.706-0.157,0.706-0.377V5.01C18.625,4.787,18.374,4.378,17.919,4.633 M13.178,13.632c0,0.501-0.406,0.907-0.908,0.907H3.191c-0.501,0-0.908-0.406-0.908-0.907V6.371c0-0.501,0.407-0.907,0.908-0.907h9.079c0.502,0,0.908,0.406,0.908,0.907V13.632zM17.717,14.158l-3.631-2.348V8.193l3.631-2.348V14.158z"></path>
				</svg>
          
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
          aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>
