<?php
 class Db
 {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db = 'api';

    public function connect() {
      try {
        $pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
      } catch (PDOException $error) {
        die('Bağlantı Hatası' . $error->getMessage());
      }
    }
 }
