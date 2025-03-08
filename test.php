<?php
$host = 'localhost';
$dbname = 'login_system';
$username = 'login_user';
$password = 'SenhaForteAqui';

$mensagem = "";
$tipoMensagem = ""; // success (verde) ou danger (vermelho)

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $mensagem = "Conexão bem-sucedida!";
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
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
