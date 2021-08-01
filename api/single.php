<?php
    /* 
Descricao :
	Cria a endereço de acesso da requisição SINGLE, recebendo no endereço o id solicitado
    e passando para o array recebido da funcao singleDisciplina para o corpo do texto exibido.
Aluno :
	Luana Ataide Castro
Data :
	01 / 08 / 2021
*/
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/disciplina.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Disciplina($db);

    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getSingleDisciplina();

    if($item->descricao != null){
        $disciplinaLista = array(
            "id" =>  $item->id,
            "descricao" => $item->descricao,
            "professor" => $item->professor,
            "sala" => $item->sala,
            "periodo" => $item->periodo,
            "curso" => $item->curso
        );
      
        http_response_code(200);
        echo json_encode($disciplinaLista);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Nenhuma disciplina encontrada!");
    }
?>