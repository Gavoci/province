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

if(isset($_GET['param1']) && isset($_GET['param2'])) {
    $new_cap = mysqli_real_escape_string($conn, $_GET['param1']);
    $new_provincia = mysqli_real_escape_string($conn, $_GET['param2']);

    $sql = "INSERT INTO cap_provincia (cap, provincia) VALUES ('$new_cap', '$new_provincia')";
    
    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Record aggiunto con successo.";
    } else {
        $response['success'] = false;
        $response['message'] = "Errore nell'aggiunta del record: " . $conn->error;
    }
} else {
    $response['success'] = false;
    $response['message'] = "Parametri mancanti.";
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
