<!doctype html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title><?= isset($PageTitle) ? $PageTitle : "H1B Matters"?></title>
    <!-- Additional tags here -->

    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="http://malsup.github.io/jquery.form.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>

    <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand text-warning" href="index.php">H1B Matters</a>
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
          </li>
          <?= (isset($nav) && $nav == "companies") ? "<li class=\"nav-item active\">" : "<li class=\"nav-item\">"?>
            <a class="nav-link" href="companies.php">By Company</a>
          </li>
          </li>
          <?= (isset($nav) && $nav == "highest_paid") ? "<li class=\"nav-item active dropdown\">" : "<li class=\"nav-item dropdown\">"?>
            <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" href="#">Highest Paid</a>
            <div class="dropdown-menu" >
              <a class="dropdown-item" href="highest_paid_companies.php">By Company</a>
              <a class="dropdown-item" href="highest_paid_cities.php">By City</a>
            </div>
          </li>

        </ul>
        <?= isset($user) ?
        "<ul class=\"navbar-nav text-right\">
          <li class=\"nav-item\ active\">
              <a class=\"nav-link\" href=\"#\">🤑 ".$user."</a>
          </li>
          <li class=\"nav-item active\">
              <a class=\"nav-link\" href=\"logout.php\">Log Out</a>
          </li>
        </ul>" : "<ul class=\"navbar-nav text-right\">

        <li class=\"nav-item active\">
            <a class=\"nav-link\" href=\"login.php\">Log In</a>
        </li>
      </ul>"?>
      </div>
    </nav>
  </header>
  <main role="main">