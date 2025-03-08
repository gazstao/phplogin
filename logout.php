<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <!-- Incluindo o CSS do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-5 text-center" style="width: 400px;">
        <h1 class="mb-4">Você saiu!</h1>
        <p>Você foi desconectado com sucesso. Você será redirecionado para a página inicial.</p>
        <div class="d-flex justify-content-center">
            <a href="index.php" class="btn btn-primary">Voltar para a Página Inicial</a>
        </div>
    </div>
</div>

<!-- Incluindo o JS do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Redireciona após 3 segundos
    setTimeout(function() {
        window.location.href = 'index.php';
    }, 3000);
</script>

</body>
</html>
