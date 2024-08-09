<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Niste prijavljeni!";
    exit();
}

$db_host = 'localhost:3308';
$db_user = 'root';
$db_password = '';
$db_name = 'online_kurs';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

// Delete user from database
$sql_delete = "DELETE FROM korisnici WHERE id = ?";
$stmt = $conn->prepare($sql_delete);
$stmt->bind_param("i", $user_id);
if ($stmt->execute()) {
    session_destroy();
    echo "Vaš nalog je obrisan. Bićete preusmereni na prijavu.";
} else {
    echo "Došlo je do greške pri brisanju naloga. Pokušajte ponovo.";
}
$stmt->close();
$conn->close();
?>
