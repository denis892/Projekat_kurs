<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (isset($_POST['payment_number']) && isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['password'])) {
 
        $payment_number = $_POST['payment_number'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

       
        include 'config.php';
        
        $stmt = $conn->prepare("SELECT * FROM korisnici WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Korisnik sa unetom email adresom već postoji!";
        } else {
     
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

   
            $stmt = $conn->prepare("INSERT INTO korisnici (ime, prezime, email, lozinka, tip_korisnika) VALUES (?, ?, ?, ?, 'polaznik')");
            $stmt->bind_param("ssss", $full_name, $full_name, $email, $hashed_password);

     
            if ($stmt->execute()) {
                $_SESSION['user_id'] = $conn->insert_id;
                $_SESSION['user_email'] = $email;
                echo "Uspešno ste se registrovali!";
              
                header("Location: ../panel.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
        }

       
        $stmt->close();
        $conn->close();
    } else {
        echo "Niste popunili sva polja forme!";
    }
}
?>
