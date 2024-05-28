<?php
session_start();
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kupovina kursa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/kursevi.css">
</head>
<body>
<div class="header">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" alt="Logo" class="logo" style="height: 70px;">
        </a>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="predavaci.php">Predavaci</a>
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
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="php/registracija.php" method="POST" id="purchaseForm">
                <div class="form-group">
                    <label for="payment_number">Broj uplatnice</label>
                    <input type="text" class="form-control" id="payment_number" name="payment_number" required>
                </div>
                <div class="mt-4 mb-4">
                    <h2>Registracija</h2>
                    <div class="form-group">
                        <label for="full_name">Ime i prezime</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email adresa</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Šifra</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Registruj se</button>
                </div>
            </form>
        </div>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.getElementById('purchaseForm').addEventListener('submit', function(event) {
        var form = event.target;
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });
</script>
</body>
</html>
