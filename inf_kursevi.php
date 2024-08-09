<?php
session_start();

$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "online_kurs"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, naziv, opis, predavac_id FROM kursevi";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursevi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/kursevi.css">
</head>
<body>
<div class="header">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="img\logo.png" alt="Logo" class="logo" style="height: 70px;">
        </a>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="predavaci.php">Predavači</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kursevi
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="inf_kursevi.php">Standardni kurs</a>
                            <a class="dropdown-item" href="inf_kursevi.php">Mini grupa</a>
                            <a class="dropdown-item" href="inf_kursevi.php">Individualna nastava</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">O nama</a>
                    </li>
                    <li class="nav-item">
  <a class="nav-link" href="#" data-toggle="modal" data-target="#kontaktModal">Kontakt</a>
</li>
                    <?php if(isset($_SESSION['user_id'])): ?>
        <li class="nav-item">
            <a class="nav-link" href="php\logout.php">Odjava</a>
        </li>
    <?php else: ?>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Prijava</a>
        </li>
    <?php endif; ?>

                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="modal fade" id="kontaktModal" tabindex="-1" aria-labelledby="kontaktModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kontaktModalLabel">Kontakt informacije</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Adresa: Svetog Save 51</p>
        <p>Broj telefona: 06689923894</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
      </div>
    </div>
  </div>
</div>



<div class="container mt-5">
    <h1>Informacije o kursevima</h1>
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='col-md-12 mb-4'>
                        <div class='card'>
                            <div class='card-body'>
                                <h2 class='card-title'>{$row['naziv']}</h2>
                                <p class='card-text'>{$row['opis']}</p>
                            </div>
                        </div>
                      </div>";
            }
        } else {
            echo "<p>Nema dostupnih kurseva.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>

<?php
$conn->close();
?>
