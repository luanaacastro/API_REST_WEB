<?php
    /* 
Descricao :
	Classe Disciplina, responsável pela criação dos atributos e do construtor da disciplina.
    Realiza também a criação das função de requisição, preparando os dados que seram recebidos 
    ou devolvidos para o sql e realizando suas operações.
Aluno :
	Luana Ataide Castro
Data :
	01 / 08 / 2021
*/
    class Disciplina{

        private $conn;

        private $db_table = "disciplina";

        public $id;
        public $descricao;
        public $professor;
        public $sala;
        public $periodo;
        public $curso;

        public function __construct($db){
            $this->conn = $db;
        }

        public function getDisciplina(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        public function createDisciplina(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET 
                    descricao = :descricao, 
                    professor = :professor, 
                    sala = :sala, 
                    periodo = :periodo, 
                    curso = :curso";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->descricao=htmlspecialchars(strip_tags($this->descricao));
            $this->professor=htmlspecialchars(strip_tags($this->professor));
            $this->sala=htmlspecialchars(strip_tags($this->sala));
            $this->periodo=htmlspecialchars(strip_tags($this->periodo));
            $this->curso=htmlspecialchars(strip_tags($this->curso));
        
            $stmt->bindParam(":descricao", $this->descricao);
            $stmt->bindParam(":professor", $this->professor);
            $stmt->bindParam(":sala", $this->sala);
            $stmt->bindParam(":periodo", $this->periodo);
            $stmt->bindParam(":curso", $this->curso);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        public function getSingleDisciplina(){
            $sqlQuery = "SELECT * FROM ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);
            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->descricao = $dataRow['descricao'];
            $this->professor = $dataRow['professor'];
            $this->sala = $dataRow['sala'];
            $this->periodo = $dataRow['periodo'];
            $this->curso = $dataRow['curso'];
        }        

        public function updateDisciplina(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                    descricao = :descricao, 
                    professor = :professor, 
                    sala = :sala, 
                    periodo = :periodo, 
                    curso = :curso
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->descricao=htmlspecialchars(strip_tags($this->descricao));
            $this->professor=htmlspecialchars(strip_tags($this->professor));
            $this->sala=htmlspecialchars(strip_tags($this->sala));
            $this->periodo=htmlspecialchars(strip_tags($this->periodo));
            $this->curso=htmlspecialchars(strip_tags($this->curso));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(":descricao", $this->descricao);
            $stmt->bindParam(":professor", $this->professor);
            $stmt->bindParam(":sala", $this->sala);
            $stmt->bindParam(":periodo", $this->periodo);
            $stmt->bindParam(":curso", $this->curso);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        function deleteDisciplina(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>