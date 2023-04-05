<?php 
    //Incluir conexão
    include("conexao.php");
    //Obter Dados
    $obterDados = file_get_contents("php://input");
    //Extrair Dados JSON
    $extrair = json_decode($obterDados);
    //Separar dados JSON
    $idcurso = $extrair->cursos->idCurso;
    $nomeCurso = $extrair->cursos->nomeCurso;
    $valorCurso = $extrair->cursos->valorCurso;
    //SQL
    $sql = "UPDATE cursos SET nomeCurso='$nomeCurso', valorCurso=$valorCurso WHERE idCurso=$idCurso";
    mysqli_query($conexao,$sql);
    //Exportar dados JSON
    $curso = [
        'idCurso' => $idCurso,
        'nomeCurso' => $nomeCurso,
        'valorCurso' => $valorCurso
    ]
    //TODO ERROR
    json_encode(['curso']=>$curso);


?>