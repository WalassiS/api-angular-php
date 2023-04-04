
<?php
    //Incluir conexão
    include("conexao.php");

    //Obter dados
    $obterDados = file_get_contents("php://input");

    //Extrair dados JSON
    $extrair = json_decode($obterDados);

    //SQL
    $sql = "UPDATE cursos SET nomeCurso = '$nomeCurso', valorCurso = $valorCurso WHERE idCurso=$idCurso";
    mysqli_query($conexao, $sql);
    
    //Separar dados JSON
    $idCurso = $extrair->cursos->idCurso;
    $nomeCurso = $extrair->cursos->nomeCurso;
    $valorCurso = $extrair->cursos->valorCurso;

    //Exportar dados cadastrados   
    $curso = [
        'nomeCurso'=> $nomeCurso,
        'valorCurso'=> $valorCurso
    ]
    
    //json_encode(['curso'=>$curso]);
    json_encode(['curso']=>$curso);


?>



