<?php

namespace App\Models;

use App\Models\BaseModel;

class Category extends BaseModel
{
    protected $table = 'categories';

    public function all() {
        $sql = "SELECT * FROM $this->table ORDER BY id DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find($id) {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $sql = "INSERT INTO $this->table (name) VALUES (:name)";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $sql = "UPDATE $this->table SET name = :name WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}