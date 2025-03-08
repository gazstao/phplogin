<?php 

$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASS');

$mensagem = "";
$tipoMensagem = ""; // 'success' ou 'danger'

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $mensagem = "Conexão bem-sucedida com o banco de dados!";
    $tipoMensagem = "success";
} catch (PDOException $e) {
    $mensagem = "Erro na conexão: " . $e->getMessage();
    $tipoMensagem = "danger";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Status da Conexão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">

    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert alert-<?php echo $tipoMensagem; ?> shadow-sm p-3">
                    <strong><?php echo $mensagem; ?></strong>
                </div>
                <a href="../index.php" class="btn btn-primary mt-3">Ir para a página inicial</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
