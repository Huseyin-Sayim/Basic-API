<?php
  include "connection.php";

  class Functions extends Db
  {
    public function index()
    {
      $query = "Select * from person";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function add_person($name, $age, $birthday)
    {
        $query = "Insert Into person (name, age, birthday) VALUES  (:name, :age, :brt)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([
          ':name' => $name,
          ':age' => $age,
          ':brt' => $birthday
        ]);
        return $stmt;
    }

  }