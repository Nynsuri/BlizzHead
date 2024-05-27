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
            $this->conn = new PDO('mysql:host=' . $config['HOST'] . ';dbname=' . $config['DBNAME'] . ';port=' . $config['PORT'], $config['USER_NAME'], $config['PASSWORD'], $options);        
        } catch (PDOException $e) {            
            die("Database connection failed: " . $e->getMessage());        
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
        try {
            $sql = "SELECT * FROM qna";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $qna = $statement->fetchAll();
            return $qna;
        } catch (PDOException $e) {
            echo "Chyba pri načítaní otázok a odpovedí: " . $e->getMessage();
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

    public function displayQnA() {
        try {
            $qna = $this->getQnA();
            if ($qna) {
                echo '<div class="accordion" id="qnaAccordion">';
                foreach ($qna as $row) {
                    $id = $row['id'];
                    echo '<div class="card">';
                    echo '<div class="card-header" style="background-color:black;   "id="heading' . $id . '">';
                    echo '<h2 class="mb-0">';
                    echo '<button class="btn btn-link text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $id . '" aria-expanded="true" aria-controls="collapse' . $id . '">';
                    echo htmlspecialchars($row['otazka']);
                    echo '</button>';
                    echo '</h2>';
                    echo '</div>';
                    echo '<div style="background-color:rgb(19,19,19);"  id="collapse' . $id . '" class="collapse" aria-labelledby="heading' . $id . '" data-bs-parent="#qnaAccordion">';
                    echo '<div class="card-body text-white">';
                    echo htmlspecialchars($row['odpoved']);
                    echo '<form method="POST" class="edit-form">';
                    echo '<input type="hidden" name="id" value="' . $id . '">';
                    echo '<textarea name="otazka" class="form-control mb-2" required>' . htmlspecialchars($row['otazka']) . '</textarea>';
                    echo '<textarea name="odpoved" class="form-control mb-2" required>' . htmlspecialchars($row['odpoved']) . '</textarea>';
                    echo '<button class="btn btn-primary edit-button me-2" type="submit" name="action" value="update">Upraviť</button>';
                    echo '<button class="btn btn-danger" type="submit" name="action" value="delete">Odstrániť</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo "Žiadne otázky a odpovede k dispozícii.";
            }
        } catch (PDOException $e) {
            echo "Chyba pri načítaní otázok a odpovedí: " . $e->getMessage();
        }
    }
    
    
    

    public function handleFormSubmission() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action'])) {
                $action = $_POST['action'];
                $id = isset($_POST['id']) ? $_POST['id'] : null;
                $otazka = isset($_POST['otazka']) ? $_POST['otazka'] : null;
                $odpoved = isset($_POST['odpoved']) ? $_POST['odpoved'] : null;
                
                if ($action == 'create' && $otazka && $odpoved) {
                    $this->createQnA($otazka, $odpoved);
                } elseif ($action == 'update' && $id && $otazka && $odpoved) {
                    $this->updateQnA($id, $otazka, $odpoved);
                } elseif ($action == 'delete' && $id) {
                    $this->deleteQnA($id);
                }
            }
        }
    }
}
?>
