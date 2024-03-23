<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comandi CAP e Provincia</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Tabella Province</h2>
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

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>CAP</th><th>Provincia</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['cap']."</td>";
            echo "<td>".$row['provincia']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nessun risultato trovato.";
    }

    $conn->close();
    ?>

    <h2>Comandi disponibili:</h2>
    <ul>
        <li>Ricerca per CAP: <code>http://localhost/cap/search/XXXXX</code></li>
        <li>Ricerca per Provincia: <code>http://localhost/cap/search/Nome_Provincia</code></li>
        <li>Modifica Record: <code>http://localhost/cap/update/ID_RECORD/Nuovo_CAP/Nuova_Provincia</code></li>
        <li>Elimina Record: <code>http://localhost/cap/delete/ID_RECORD</code></li>
        <li>Aggiungi Record: <code>http://localhost/cap/create/Nuovo_CAP/Nuova_Provincia</code></li>
        <li>Visualizza Tabella: <code>http://localhost/cap/view_table</code></li>
    </ul>
</body>
</html>
