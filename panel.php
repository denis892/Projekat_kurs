<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'php/config.php';

$sql_predavaci = "SELECT * FROM predavaci";
$result_predavaci = $conn->query($sql_predavaci);

$sql_polaznici = "SELECT * FROM korisnici WHERE tip_korisnika = 'polaznik'";

$result_polaznici = $conn->query($sql_polaznici);


$sql_lekcije = "SELECT * FROM lekcije";
$result_lekcije = $conn->query($sql_lekcije);


$sql_materijali = "SELECT * FROM materijali";
$result_materijali = $conn->query($sql_materijali);
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Kurs Engleskog Jezika</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/panel.css">
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
                            <a class="nav-link" href="#">O nama</a>
                        </li>
                        <li class="nav-item">
  <a class="nav-link" href="#" data-toggle="modal" data-target="#kontaktModal">Kontakt</a>
</li>
<li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#changeModal">Promeni podatke</a>
                </li>
    <li class="nav-item">
               <a class="nav-link" href="#" data-toggle="modal" data-target="#deleteModal">Obriši nalog</a>
                    </li>

                        <?php if(isset($_SESSION['user_id'])): ?>
    <li class="nav-item">
    <a class="nav-link" href="php/logout.php">Odjava</a>
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
    <div class="container">
        <div class="row">
            <div class="col-md-6" id="leva">
                <h2>Predavači</h2>
                <hr>
                <?php if ($result_predavaci->num_rows > 0): ?>
                    <div class="row">
                        <?php while($row = $result_predavaci->fetch_assoc()): ?>
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <img src="img/<?php echo $row['slika']; ?>" class="card-img-top" alt="<?php echo $row['ime'] . ' ' . $row['prezime']; ?>" style="width: 100px; height: 120px;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['ime'] . ' ' . $row['prezime']; ?></h5>
                                        <p class="card-text"><?php echo $row['obrazovanje']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p>Nema dostupnih predavača.</p>
                <?php endif; ?>
                <h2>Polaznici</h2>
                <hr>
                <?php if ($result_polaznici->num_rows > 0): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ime</th>
                                <th>Prezime</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $result_polaznici->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['ime']; ?></td>
                                    <td><?php echo $row['prezime']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Nema dostupnih polaznika.</p>
                <?php endif; ?>
            </div>
            <div class="col-md-6 border-left">
                <h2>Lekcije</h2>
                <hr>
                <?php if ($result_lekcije->num_rows > 0): ?>
                    <ul>
                        <?php while($row = $result_lekcije->fetch_assoc()): ?>
                            <li><?php echo $row['naziv']; ?> - <?php echo $row['sadrzaj']; ?></li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p>Nema dostupnih lekcija.</p>
                <?php endif; ?>
                <h2>Materijali</h2>
                <hr>
                <?php if ($result_materijali->num_rows > 0): ?>
                    <ul>
                        <?php while($row = $result_materijali->fetch_assoc()): ?>
                            <li><a href="<?php echo $row['putanja']; ?>"><?php echo $row['naziv']; ?></a> - <?php echo $row['opis']; ?></li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p>Nema dostupnih materijala.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
<div class="modal fade" id="changeModal" tabindex="-1" aria-labelledby="changeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changeModalLabel">Promena lozinke/email adrese</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="changeForm" method="post" action="php/promena_pod.php">
          <div class="mb-3">
            <label for="newEmail" class="form-label">Nova email adresa</label>
            <input type="email" class="form-control" id="newEmail" name="newEmail">
          </div>
          <div class="mb-3">
            <label for="currentPassword" class="form-label">Trenutna lozinka</label>
            <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
          </div>
          <div class="mb-3">
            <label for="newPassword" class="form-label">Nova lozinka</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword">
          </div>
          <button type="submit" class="btn btn-primary">Sačuvaj promene</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Obriši nalog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Da li ste sigurni da želite da obrišete svoj nalog?</p>
                    <form id="deleteForm" action="php/brisanje_naloga.php" method="POST">
                        <button type="submit" class="btn btn-danger">Obriši nalog</button>
                        <div id="deleteMessage" class="mt-3"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php

$conn->close();
?>
