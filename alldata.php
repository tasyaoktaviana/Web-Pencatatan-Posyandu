<?php

require './config.php';

class DataBayi
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }

    // public function read()
    // {
        // $page = isset($_GET['page']) ? $_GET['page'] : 0;
        // $query = "SELECT * FROM film ORDER BY title LIMIT {$page}, 12";
        // $sql = $this->db->prepare($query);
        // $sql->execute();
        // $data = [];
// 
        // while ($row = $sql->fetch()) {
            // array_push($data, $row);
        // }
// 
        // header("Content-Type: application/json");
        // echo json_encode($data);
    // }

    public function create($data)
    {
        foreach ($data as $key => $value) {
            $value = is_array($value) ? trim(implode(',', $value)) : trim($value);
                $data[$key] = (strlen($value) > 0 ? $value : NULL);
            }

            $query = "INSERT INTO bayi VALUES (Null, :nama_ayah, :nama_ibu, :nama_bayi, :tempat_lahir, :tanggal_lahir, :alamat, NOW())";

            $sql = $this->db->prepare($query);

            $sql->bindParam(':nama_ayah', $data['nama_ayah'], PDO::PARAM_STR);
            $sql->bindParam(':nama_ibu', $data['nama_ibu'], PDO::PARAM_STR);
            $sql->bindParam(':nama_bayi', $data['nama_bayi'], PDO::PARAM_STR);
            $sql->bindParam(':tempat_lahir', $data['tempat_lahir'], PDO::PARAM_STR);
            $sql->bindParam(':tanggal_lahir', $data['tanggal_lahir'], PDO::PARAM_STR);
            $sql->bindParam(':alamat', $data['alamat'], PDO::PARAM_STR);
        
        try {
            $sql->execute();
        } catch (PDOException $e) {
            $this->db = Null;
            http_response_code(500);
            die($e->getMessage());
        }
        $this->db = Null;

    }
}

$film = new DataBayi();

switch ($_GET['action']) {
    case 'create':
        $film->create($_POST);
        break;

    default:
        $film->read();
        break;
}
