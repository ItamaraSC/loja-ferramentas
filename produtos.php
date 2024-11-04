<?php
// Conectar ao banco de dados
$conn = new mysqli('localhost', 'root', '', 'loja');

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consultar os produtos
$sql = "SELECT nome, descricao, preco_vista, preco_parcelado, parcelas, imagem FROM produtos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&display=swap" rel="stylesheet"> 
    <link rel="icon" href="logo.ico">
    <link rel="stylesheet" href="produtos.css">
    <title>Ferramentas_Produtos</title>
</head>
<body>
    <header>
        <h1 class="subtitulo">Ferramentas</h1>
        <div class="header-container">
            <nav class="menu">
                <a href="index.html">Home</a>
                <a href="produtos.php">Produtos</a>
                <a href="cadastro.html">Cadastro</a>
                <a href="login.html">Login</a>
            </nav>
            <a href="carrinho.html">
                <img src="img/carrinho-compras.png" alt="Carrinho de Compras" class="carrinho">
            </a>
        </div>
    </header>
    <section id="produtos">
        <h1>Nossos Produtos</h1>
        <div class="product-list">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<img src='{$row['imagem']}' alt='{$row['nome']}' class='product-img'>";
                    echo "<h3>{$row['nome']}</h3>";
                    echo "<p>R$ " . number_format($row['preco_vista'], 2, ',', '.') . " à vista ou até {$row['parcelas']}x de R$ " . number_format($row['preco_parcelado'] / $row['parcelas'], 2, ',', '.') . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum produto encontrado.</p>";
            }
            ?>
        </div>
    </section>
    <footer>
        <p>&copy; Trabalho HTML/CSS/JS/PHP e Banco de Dados.</p>
    </footer>
</body>
</html>
<?php $conn->close(); ?>
