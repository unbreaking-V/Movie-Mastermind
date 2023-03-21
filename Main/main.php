<?php require_once 'functions.php';?>
<?php require_once 'header.php';?>

<body>
  <main>

  <div class="tab-content">
      <div class="tab-pane active" id="view" role="tabpanel" aria-labelledby="view-tab"> 
        <div class="container-fluid">
        <div class="row justify-content-center align-items-center g-2">
           <?php get_all_data(); ?>
        </div>
      </div>
    </div>
  </main>

  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-right mb-1">
        <a href="#">Back to top</a>
      </p>
    </div>
  </footer>

</body>

</html>