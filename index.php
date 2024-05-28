<?php
session_start();
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Kurs Engleskog Jezika</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
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


<div class="row">
 <div class="col-2">
 </div>
 <div class="col-8">
    <h1 id="nsl">Kurs engleskog jezika online</h1><br>
   <img src="img\Engleski-jezik.-Kurs-engleskog-jezika.-London-300x150.jpg" alt="" width="400px" id="pocetna"><br>
 <section>
 <p><strong>Intenzivni Premium kursevi engleskog jezika</strong>&nbsp;namenjeni su svim polaznicima koji imaju&nbsp;potrebu 
 <strong>za brzim učenjem engleskog jezika.</strong>&nbsp;Nastava je organizovana tako da uz intenzivniji tempo rada od uobičajenog
  i za kraći vremenski period,&nbsp;<ins>savladaš</ins>&nbsp;sve ono što jedan kurs jezika podrazumeva.</p>
</section><br>
<div class="container" >
    <div class="row">
        <div class="col-md-4">
            <div class="card" id="kartice">
                <div class="card-body">
                    <h5 class="card-title">Standardni kurs</h5>
                    <p class="card-text">Standardni kurs engleskog jezika je namenjen svima koji žele razviti sve jezičke veštine – govor, 
                        čitanje, pisanje i slušanje na engleskom jeziku. Većinu vremena provešćemo na razvijanju komunikacije.</p>
                        <div class="card-button">
            <a href="kursevi.php" class="btn btn-secondary">Kupi kurs</a>
        </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" id="kartice">
                <div class="card-body" >
                    <h5 class="card-title">Mini grupa</h5>
                    <p class="card-text">Ovaj vid nastave se najčešće odlučuju članovi porodice ili bračni partneri, 
                        ponekad i kolege sa posla koji ne mogu ili ne žele da se prilagođavaju radu u grupi.</p>
                        <div class="card-button">
            <a href="kursevi.php" class="btn btn-secondary">Kupi kurs </a>
        </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" id="kartice">
                <div class="card-body" >
                    <h5 class="card-title">Individualna nastava</h5>
                    <p class="card-text">Individualni časovi engleskog jezika su ono na šta se odlučuje veliki broj polaznika. 
                        Tempo rada i sam rad prilagođavaju se Vama i Vašoj brzini savladavanja gradiva.</p>
                        <div class="card-button">
            <a href="kursevi.php" class="btn btn-secondary">Kupi kurs</a>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<table class="table table-hover" id="tabela">
 <thead>
 <tr>
 
 <th scope="col">KURS</th>
 <th scope="col">CENA</th>
 <th scope="col">STUDENTI/CLANOVI ISTE PORODICE</th>
 </tr>
 </thead>
 <tbody>
 <tr >
 <td>Standardni kurs</td>
 <td>24 000 RSD</td>
 <td>19 000 (6000 RSD x 3)+1000 RSD</td>
 </tr>
 <tr class="table-active">
 <td>Mini grupa</td>
 <td>30 000 RSD</td>
 <td>	27 000 RSD (9000 RSD x 3)t</td>
 </tr>
 <tr>
 <td>Individualni časovi</td>
 <td>2400-3000 RSD</td>
 <td>---</td>
 </tr>
                    </table>
 <br>
 <h3>O Engleskom</h3>
 <p>Engleski jezik pripada zapadnoj podgrani germanske grupe indoevropske porodice jezika. Danas je to najrasprostranjeniji jezik sveta; 
    ukupno 600-700 miliona ljudi upotrebljava engleski redovno. Oko 377 miliona ljudi koristi engleski kao svoj maternji jezik, a podjednakž
     broj ljudi koristi ga kao svoj drugi strani jezik. U širokoj je upotrebi u više od 100 zemalja širom sveta. Osim toga, engleski je zauzeo 
     primarno mesto u međunarodnim,
     akademskim i poslovnim krugovima. Trenutni status engleskog jezika upoređuje se sa položajem latinskog u prošlosti.</p>
 </div>
 
 <div class="col-2">
 </div>
 <footer >
    <div class="container">
        <p>&copy; 2024 Online Kurs Engleskog Jezika</p>
    </div>
</footer>

 </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
