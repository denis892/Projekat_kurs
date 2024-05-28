<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
       
        $email = $_POST['email'];
        $password = $_POST['password'];

        
        $db_host = 'localhost:3308';
        $db_user = 'root';
        $db_password = '';
        $db_name = 'online_kurs';

        $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

      
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

       
        $stmt = $conn->prepare("SELECT * FROM korisnici WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['lozinka'])) {
              
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                echo "Uspešno ste se prijavili!";
                header("Location: ../panel.php");
                exit();
            } else {
                echo "Pogrešna lozinka!";
            }
        } else {
            echo "Korisnik sa unetom email adresom ne postoji!";
        }

     
        $stmt->close();
        $conn->close();
    } else {
        echo "Niste popunili sva polja forme!";
    }
}
?>
