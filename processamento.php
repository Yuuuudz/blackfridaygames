<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $precoOriginal = $_POST['preco_original'];
    $precoPromocional = $_POST['preco_promocional'];
    
    if (!isset($_SESSION['jogos'])) {
        $_SESSION['jogos'] = array();
    }
    
    $_SESSION['jogos'][] = array(
        'Nome' => $nome,
        'PrecoOriginal' => floatval($precoOriginal),
        'PrecoPromocional' => floatval($precoPromocional)
    );
    
    header('Location: index.php');
    exit;
}
?>
