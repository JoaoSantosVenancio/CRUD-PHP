<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD - Controle de alunos</title>
</head>

<body>

<a href="index.html">Home</a> | <a href="consulta-versaoLink.php">Consulta</a>
<hr>

<h2>Exclusão de Alunos</h2>

<?php

if (!isset($_GET["raAluno"])) {
    echo "Selecione o aluno a ser excluído!";
} else {
    $ra = $_GET["raAluno"];

    try {

        include("conexaoBD.php");

        $stmt = $pdo->prepare('DELETE FROM alunos WHERE ra = :ra');
        $stmt->bindParam(':ra', $ra);
        $stmt->execute();

        echo $stmt->rowCount() . " aluno(s) de RA $ra removido!";

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    $pdo = null;
}

?>

</body>
</html>