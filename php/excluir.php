<?php 
    //Incluir conexão
    include("conexao.php");
    //Obter Dados
    $obterDados = file_get_contents("php://input");
    //Extrair Dados JSON
    $extrair = json_decode($obterDados);
    //Separar dados JSON
    $idcurso = $extrair->cursos->idCurso;
    
    //SQL
    $sql = "DELETE FROM cursos WHERE idCurso=$idCurso";
    mysqli_query($conexao,$sql);
    //Exportar dados JSON
    

?>