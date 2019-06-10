<?php 
include 'model/class.php';
?>

<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Sticky Footer Navbar Template · Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    <header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Fixed navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="dev.php">Development <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="insertitems.php">Development <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
  <br><br>
<form action="" method="post">
<input type="text" name="name" placeholder="Название">
<input type="number" name="price_start" min="1" max="100" step="0.2" placeholder="От">
<input type="number" name="price_end" min="1" max="100" step="0.2" placeholder="До">
<input type="hidden" name="method" value="post">
<button type="submit" name="submit">Поиск</button>
</form>

<!-- <a href="insert.php">Добавить</a> -->
<main role="main">
  <div class="album py-5 ">
    <div class="container">
      <div class="row">
    <div class="row">
<?php

if(isset($_POST['submit']))	{

if(empty($_POST['name'])) {
    $_POST['name'] = '';
};
$name =        $_POST['name'];
$price_start = $_POST['price_start'];
$price_end =   $_POST['price_end'];
$method =      $_POST['method'];

$response = new Client($name, $price_start, $price_end, $method);
$clientarray = $clientBase = $response->ClientStore();
$array = $response->GetArray();

//$array = $response->mergeValue();

// echo '<pre>';
// echo 'server side';
// echo '<hr>';
// print_r($array);
// echo '<br>';
// echo 'client side';
// echo '<hr>';
// print_r($clientarray);
// echo '</pre>';

foreach($clientarray as $key => $value) {


    echo '<div class="col-md-4">';
    echo '<div class="card mb-4 shadow-sm">';
    echo '<img class="bd-placeholder-img card-img-top" width="100%" height="225" src="img/' . $value['img']  . '"  xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>';
    echo '<div class="card-body">';
    echo '<h1 class="mt-5">' . $value['name'] . '</h1>';
    echo '<p class="card-text">' . $value['description'] . '</p>';
    echo '<div class="d-flex justify-content-between align-items-center">';
    echo '<div class="btn-group">';
    echo '<button type="button" class="btn btn-sm btn-outline-secondary">View</button>';
    echo '<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>';
    echo '</div>';
    echo '<small class="text-muted">9 mins</small>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

if($array['status_message'] === 'Invalid Request') {
print $array['status_message'];
} elseif($array['data'] === 'Not found') {
print $array['data'];
} else {
    foreach($array['data'] as $key => $value) {
    echo '<div class="col-md-4">';
    echo '<div class="card mb-4 shadow-sm">';
    echo '<img class="bd-placeholder-img card-img-top" width="100%" height="225" src="img/' . $value['img']  . '"  xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>';
    echo '<div class="card-body">';
    echo '<h1 class="mt-5">' . $value['name'] . '</h1>';
    echo '<p class="card-text">' . $value['description'] . '</p>';
    echo '<div class="d-flex justify-content-between align-items-center">';
    echo '<div class="btn-group">';
    echo '<button type="button" class="btn btn-sm btn-outline-secondary">View</button>';
    echo '<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>';
    echo '</div>';
    echo '<small class="text-muted">9 mins</small>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
        }
    }
}

?>
      </div>
    </div>
  </div>
</main>

  </div>
</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted"></span>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="/docs/4.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>