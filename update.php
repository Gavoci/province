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

if(isset($_GET['param1']) && isset($_GET['param2']) && isset($_GET['param3'])) {
    $id = $_GET['param1'];
    $new_cap = $_GET['param2'];
    $new_provincia = $_GET['param3'];

    $sql = "UPDATE cap_provincia SET cap='$new_cap', provincia='$new_provincia' WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Record aggiornato con successo.";
    } else {
        $response['success'] = false;
        $response['message'] = "Errore nell'aggiornamento del record: " . $conn->error;
    }
} else {
    $response['success'] = false;
    $response['message'] = "Parametri mancanti.";
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
