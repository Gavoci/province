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
    $param = $_GET['param'];
    $sql = "SELECT * FROM cap_provincia WHERE cap = '$param' OR provincia LIKE '%$param%'";
    
    $result = $conn->query($sql);

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
} else {
    $response['success'] = false;
    $response['message'] = "Parametri mancanti.";
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
