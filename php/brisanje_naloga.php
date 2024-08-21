<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Niste prijavljeni!";
    exit();
}

include 'config.php';

$user_id = $_SESSION['user_id'];

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
