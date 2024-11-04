<?php
// Inclui o arquivo de conexão
include 'conexao.php';

// Consulta os produtos
$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Saída de dados de cada linha
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. " - Preço à vista: R$ " . $row["preco_vista"]. "<br>";
    }
} else {
    echo "0 resultados";
}

// Fechar a conexão
$conn->close();
?>
