<?php 
    /* 
Descricao :
	Classe responsável por configurar o banco de dados para a aplicação
Aluno :
	Luana Ataide Castro
Data :
	01 / 08 / 2021
*/
    class Database {
        private $host = "localhost";
        private $database_name = "disciplina";
        private $username = "root";
        private $password = "";

        public $conn;

        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>