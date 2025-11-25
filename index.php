<?php
session_start();

if (!isset($_SESSION['jogos'])) {
    $_SESSION['jogos'] = array(
        array('Nome' => 'God of War Ragnarök', 'PrecoOriginal' => 299.90, 'PrecoPromocional' => 149.90),
        array('Nome' => 'Elden Ring', 'PrecoOriginal' => 249.90, 'PrecoPromocional' => 124.95),
        array('Nome' => 'Cyberpunk 2077', 'PrecoOriginal' => 199.90, 'PrecoPromocional' => 89.90),
        array('Nome' => 'Red Dead Redemption 2', 'PrecoOriginal' => 179.90, 'PrecoPromocional' => 79.90),
        array('Nome' => 'GTA V', 'PrecoOriginal' => 99.90, 'PrecoPromocional' => 39.90)
    );
}

$jogos = $_SESSION['jogos'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Black Friday - Jogos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Black Friday - Gerenciamento de Jogos</h1>
    
    <h2>Cadastrar Jogo</h2>
    <form action="processamento.php" method="POST">
        <label>Nome do Jogo:</label>
        <input type="text" name="nome" required>
        <br><br>
        
        <label>Preço sem promoção:</label>
        <input type="number" name="preco_original" step="0.01" required>
        <br><br>
        
        <label>Preço promocional:</label>
        <input type="number" name="preco_promocional" step="0.01" required>
        <br><br>
        
        <button type="submit">Cadastrar</button>
    </form>
    
    <hr>
    
    <h2>Jogos Cadastrados</h2>
    
    <?php if (empty($jogos)): ?>
        <p>Nenhum jogo cadastrado.</p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>Nome</th>
                <th>Preço Original</th>
                <th>Preço Promocional</th>
            </tr>
            <?php foreach ($jogos as $jogo): ?>
                <tr>
                    <td><?php echo htmlspecialchars($jogo['Nome']); ?></td>
                    <td>R$ <?php echo number_format($jogo['PrecoOriginal'], 2, ',', '.'); ?></td>
                    <td>R$ <?php echo number_format($jogo['PrecoPromocional'], 2, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
