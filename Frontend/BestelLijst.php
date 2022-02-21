<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/ExcellentTaste/css/ReservOverzicht.css" media="screen" />
  <title>Excellent Taste</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="index.php">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/ExcellentTaste/Frontend/ReserveringenOverzicht.php">Reserveringen</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Serveren
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/ExcellentTaste/Frontend/Overzichtkok.php">Voor Kok</a></li>
              <li><a class="dropdown-item" href="#">Voor Barman</a></li>
              <li><a class="dropdown-item" href="#">Voor Ober</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Gegvens
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/ExcellentTaste/Frontend/Dranken.php">Drinken</a></li>
              <li><a class="dropdown-item" href="#">Eten</a></li>
              <li><a class="dropdown-item" href="#">Klanten</a></li>
              <li><a class="dropdown-item" href="#">Gerecht Hoofdgroepen</a></li>
              <li><a class="dropdown-item" href="#">Gerecht Subgroepen</a></li>

            </ul>
          </li>
      </div>
    </div>
  </nav>
  <?php
  require '../backend/BestellingController.php';
  $bestel = new BestellingController();

  $bestel->LijstBestelling();
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>