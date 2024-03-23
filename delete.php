<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cap_provincia_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$response = array();

if(isset($_GET['param'])) {
    $id = $_GET['param'];

    $sql = "DELETE FROM cap_provincia WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Record eliminato con successo.";
    } else {
        $response['success'] = false;
        $response['message'] = "Errore nell'eliminazione del record: " . $conn->error;
    }
} else {
    $response['success'] = false;
    $response['message'] = "Parametri mancanti.";
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
