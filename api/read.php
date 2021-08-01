<?php
    /* 
Descricao :
	Cria a endereço de acesso da requisição READ, passando os array recebidos da
    funcao readDisciplina para o corpo do texto exibido.
Aluno :
	Luana Ataide Castro
Data :
	01 / 08 / 2021
*/
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/disciplina.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Disciplina($db);

    $stmt = $items->getDisciplina();
    $itemCount = $stmt->rowCount();

    if($itemCount > 0){
        
        $disciplinaLista = array();
        $disciplinaLista["body"] = array();
        

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "descricao" => $descricao,
                "professor" => $professor,
                "sala" => $sala,
                "periodo" => $periodo,
                "curso" => $curso
            );

            array_push($disciplinaLista["body"], $e);
        }
        echo json_encode($disciplinaLista);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "Nenhuma Disciplina Encontrada!")
        );
    }
?>