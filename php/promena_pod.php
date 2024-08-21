<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

include 'config.php';

$currentPassword = $_POST['currentPassword'];
$newEmail = $_POST['newEmail'];
$newPassword = $_POST['newPassword'];
$userId = $_SESSION['user_id'];


$stmt = $conn->prepare("SELECT lozinka FROM korisnici WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    if (password_verify($currentPassword, $user['lozinka'])) {
  
        if (!empty($newEmail)) {
            $stmt = $conn->prepare("UPDATE korisnici SET email = ? WHERE id = ?");
            $stmt->bind_param("si", $newEmail, $userId);
            $stmt->execute();
        }

      
        if (!empty($newPassword)) {
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE korisnici SET lozinka = ? WHERE id = ?");
            $stmt->bind_param("si", $newPasswordHash, $userId);
            $stmt->execute();
        }

        echo "Podaci uspešno ažurirani!";
    } else {
        echo "Trenutna lozinka nije tačna!";
    }
} else {
    echo "Korisnik nije pronađen!";
}

$conn->close();
header("Location: ../panel.php");
exit();
?>
