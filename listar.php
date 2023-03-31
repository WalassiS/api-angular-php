<?php
    //Incluir conexão
    include("conexao.php");

    //Sql
    $sql = "SELECT * FROM cursos";

    //Executar
    $executar = mysqli_query($conexao, $sql);

    //vetor
    $cursos = [];
    $indice = 0;

    //Loop
    while($linha = mysqli_fetch_assoc($executar)){
        $cursos[$indice]['idCurso'] = $linha['idCurso'];
        $cursos[$indice]['nomeCurso'] = $linha['nomeCurso'];
        $cursos[$indice]['valorCuso'] = $linha['valorCurso'];
        $indice++;
    }
    //JSON
    json_encode(['cursos'=>$cursos]);

    

?>