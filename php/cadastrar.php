<?php
    //Incluir conexão
    include("conexao.php");

    //Obter Dados
    $obterDados = file_get_contents("php://input");

    //Extrair dados do JSON
    $extrair = json_decode($obterDados);

    //Separar dados do JSON
    $nomeCurso = $extrair->cursos->nomeCurso;
    $valorCurso = $extrair->cursos->valorCurso;

    //SQL
    $sql = "INSERT INTO cursos (nomeCurso, valorCurso) values ('$nomeCurso', $valorCurso)";
    mysqli_query($conexao, $sql);

    //Exportar dados cadastrados
    $curso = [
        'idcurso' => $idCurso,
        'nomeCurso' => $nomeCurso,
        'valorCurso' => $valorCurso
    ];

    json_encode(['curso'=>$curso]);




?>