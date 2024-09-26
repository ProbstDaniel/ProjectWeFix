<?php
$servername = "localhost";
$username = "WeFix";
$password = "123456";
$dbname = "ProjectWeFix";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta para buscar dados
$sql = "SELECT id, subject, created_date, updated_date, status FROM requests";
$result = $conn->query($sql);

$requests = [];

if ($result->num_rows > 0) {
    // Armazena os resultados em um array
    while ($row = $result->fetch_assoc()) {
        $requests[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();

// Enviar os dados para o JavaScript em formato JSON
echo "<script>var requestData = " . json_encode($requests) . ";</script>";
?>
