<?php

namespace App\Models;

use App\Models\BaseModel;

class User extends BaseModel
{
    protected $table = 'users';

    public function all() {
        $sql = "SELECT users.*, roles.name as role_name 
                FROM $this->table 
                LEFT JOIN roles ON users.role_id = roles.id 
                ORDER BY users.id DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find($id) {
        $sql = "SELECT users.*, roles.name as role_name 
                FROM $this->table 
                LEFT JOIN roles ON users.role_id = roles.id 
                WHERE users.id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $sql = "INSERT INTO $this->table (full_name, email, phone, address, img_avatar, role_id, created_at) 
                VALUES (:full_name, :email, :phone, :address, :img_avatar, :role_id, :created_at)";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($data);
    }
}