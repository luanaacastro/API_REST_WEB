<?php
    /* 
Descricao :
	Cria a endereço de acesso da requisição CREATE, passando os valores recebidos para a
    funcao createDisciplina na classe disciplina, e retornando uma mensagem de confirmação
    caso tenha feito a inserção, e uma mensagem de erro caso ocorra uma falha.
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

    $data = json_decode(file_get_contents("php://input"));

    $item->descricao = $data->descricao;
    $item->professor = $data->professor;
    $item->sala = $data->sala;
    $item->periodo = $data->periodo;
    $item->curso = $data->curso;
    
    if($item->createDisciplina()){
        echo 'Disciplina criada com sucesso!';
    } else{
        echo 'Falha ao criar disciplina!';
    }
?>