<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbtestepratico";

// Cria conexão
$conn = new mysqli('localhost', 'root', '', 'dbtestepratico');

// Verifica conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

// SQL para apagar o registro
$sql = "DELETE FROM users WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Registro apagado com sucesso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
