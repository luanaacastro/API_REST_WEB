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
        private $host = "ec2-35-172-16-31.compute-1.amazonaws.com";
        private $database_name = "d9uddncl6cld07";
        private $username = "jitisriskuoqhp";
        private $password = "f4689651833affe391abe614529d01817bb0f27bf371a0296df19749944dee12";

        public $conn;

        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("pgsql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>
