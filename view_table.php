<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cap_provincia_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$sql = "SELECT * FROM cap_provincia";
$result = $conn->query($sql);

$response = array();

if ($result->num_rows > 0) {
    $response['success'] = true;
    $response['data'] = array();
    while($row = $result->fetch_assoc()) {
        $response['data'][] = $row;
    }
} else {
    $response['success'] = false;
    $response['message'] = "Nessun risultato trovato.";
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
