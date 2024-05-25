<?php 
namespace Otazky;

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/db/config.php');

use PDO;

class QnA {
    private $conn;

    public function __construct() {        
        $this->connect();    
    }

    private function connect() {        
        $config = DATABASE;
        $options = array(            
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );        
        try {            
            $this->conn = new PDO('mysql:host=' . $config['HOST'] . ';dbname=' .                
            $config['DBNAME'] . ';port=' . $config['PORT'], $config['USER_NAME'],                
            $config['PASSWORD'], $options);        
        } catch (PDOException $e) {            
            die("Chyba pripojenia: " . $e->getMessage());        
        }    
    }

   // Metóda na vloženie otázok a odpovedí z JSON súboru do databázy
public function insertQnA(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
            if ($action == 'update') {
                $id = $_POST['id'];
                $otazka = $_POST['otazka'];
                $odpoved = $_POST['odpoved'];
                $this->updateQnA($id, $otazka, $odpoved);
            } elseif ($action == 'delete') {
                $id = $_POST['id'];
                $this->deleteQnA($id);
            }
        }
    }
    // Rest of the original insertQnA method...

        try {        
            $data = json_decode(file_get_contents(__ROOT__.'/data/datas.json'), true);        
            $otazky = $data["otazky"];        
            $odpovede = $data["odpovede"];        

            $this->conn->beginTransaction();        
            $sql = "INSERT INTO qna (otazka, odpoved) VALUES (:otazka, :odpoved)";        
            $statement = $this->conn->prepare($sql);        
            for ($i = 0; $i < count($otazky); $i++) { 
              $exists = $this->checkIfExists($otazky[$i]);
              if(!$exists){           
                $statement->bindParam(':otazka', $otazky[$i]);            
                $statement->bindParam(':odpoved', $odpovede[$i]);            
                $statement->execute();      
              }  
            }        
            $this->conn->commit();
            echo "Dáta boli vložené";
        } catch (Exception $e) {            
            echo "Chyba pri vkladaní dát do databázy: " . $e->getMessage();            
            $this->conn->rollback();        
        }    
    }

    public function createQnA($otazka, $odpoved) {
        try {
            $sql = "INSERT INTO qna (otazka, odpoved) VALUES (:otazka, :odpoved)";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':otazka', $otazka);
            $statement->bindParam(':odpoved', $odpoved);
            $statement->execute();
            echo "Otázka a odpoveď boli úspešne vytvorené.";
        } catch (PDOException $e) {
            echo "Chyba pri vytváraní otázky a odpovede: " . $e->getMessage();
        }
    }

    public function getQnA() {
        try{
            $sql = "SELECT * FROM qna";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $qna = $statement->fetchAll();
            return $qna;
        } catch (PDOException $e){
            echo "Chyba pri načítaní otázok a odpovedí: ".$e->getMessage();
        }
    }

    public function readQnA($id) {
        try {
            $sql = "SELECT * FROM qna WHERE id = :id";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            $qna = $statement->fetch();
            return $qna;
        } catch (PDOException $e) {
            echo "Chyba pri načítaní otázky a odpovede: " . $e->getMessage();
        }
    }

    public function updateQnA($id, $otazka, $odpoved) {
        try {
            $sql = "UPDATE qna SET otazka = :otazka, odpoved = :odpoved WHERE id = :id";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->bindParam(':otazka', $otazka);
            $statement->bindParam(':odpoved', $odpoved);
            $statement->execute();
            echo "Otázka a odpoveď boli úspešne aktualizované.";
        } catch (PDOException $e) {
            echo "Chyba pri aktualizácii otázky a odpovede: " . $e->getMessage();
        }
    }

    public function deleteQnA($id) {
        try {
            $sql = "DELETE FROM qna WHERE id = :id";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            echo "Otázka a odpoveď boli úspešne odstránené.";
        } catch (PDOException $e) {
            echo "Chyba pri odstraňovaní otázky a odpovede: " . $e->getMessage();
        }
    }

    private function checkIfExists($otazka) {
        $sql = "SELECT COUNT(*) FROM qna WHERE otazka = :otazka";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(":otazka", $otazka);
        $statement->execute();
        $count = $statement->fetchColumn();
        return $count > 0;
    }

    public function displayQnA(){
        try{
            $qna = $this->getQnA();
            if($qna){
                echo '<section class="container">';
                foreach($qna as $row){
                    echo '<div class="accordion">
                    <div class="question">'.$row['otazka'].'</div>
                    <div class="answer">'.$row['odpoved'].'</div>
                    </div>';
                }
                echo '</section>';
            }else{
                echo "Žiadne otázky a odpovede k dispozícii.";
            }
        } catch (PDOException $e){
            echo "Chyba pri načítaní otázok a odpovedí: ".$e->getMessage();
        }
    }

    public function handleFormSubmission() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action'])) {
                $action = $_POST['action'];
                if ($action == 'create') {
                    $this->createQnA($_POST['otazka'], $_POST['odpoved']);
                } elseif ($action == 'update') {
                    $this->updateQnA($_POST['id'], $_POST['otazka'], $_POST['odpoved']);
                } elseif ($action == 'delete') {
                    $this->deleteQnA($_POST['id']);
                }
            }
        }
    }
}
?>
