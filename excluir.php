<?php
    //Incluir conexão
    include("conexao.php");

    //Obter Dados
    $obterDados = file_get_contents("php://input");

    //Extrair dados do JSON
    $extrair = json_decode($obterDados);

    //Separar dados do JSON
    $idCurso = $extrair->cursos->idCurso;

    //SQL
    $sql = "DELETE FROM cursos WHERE idCurso=$idCurso";
    mysqli_query($conexao, $sql);

?>