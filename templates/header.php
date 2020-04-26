<!doctype html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title><?= isset($PageTitle) ? $PageTitle : "H1B Matters"?></title>
    <!-- Additional tags here -->

    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="http://malsup.github.io/jquery.form.js"></script>
  </head>
  <body>

    <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand text-warning" href="#">H1B Matters</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <?= (isset($nav) && $nav == "home") ? "<li class=\"nav-item active\">" : "<li class=\"nav-item\">"?>
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <?= (isset($nav) && $nav == "cases") ? "<li class=\"nav-item active\">" : "<li class=\"nav-item\">"?>
            <a class="nav-link" href="cases.php">All H1B Cases</a>
          </li>
          <?= (isset($nav) && $nav == "cities") ? "<li class=\"nav-item active\">" : "<li class=\"nav-item\">"?>
            <a class="nav-link" href="cities.php">By City</a>
          </li>
        </ul>
        <?= isset($user) ?
        "<ul class=\"navbar-nav text-right\">
          <li class=\"nav-item\ active\">
              <a class=\"nav-link\" href=\"#\">🤑 ".$user."</a>
          </li>
          <li class=\"nav-item active\">
              <a class=\"nav-link\" href=\"#\">Log Out</a>
          </li>
        </ul>" : ""?>
      </div>
    </nav>
  </header>
  <main role="main">