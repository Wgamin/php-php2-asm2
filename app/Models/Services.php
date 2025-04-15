<?php

namespace App\Models;

use App\Models\BaseModel;

class Services extends BaseModel
{
    protected $table = 'services';

    public function all()
    {
        $sql = "SELECT services.*, categories.name as category_name 
                FROM $this->table 
                LEFT JOIN categories ON services.category_id = categories.id
                ORDER BY services.id DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find($id) {
        $sql = "SELECT services.*, categories.name as category_name 
                FROM $this->table 
                LEFT JOIN categories ON services.category_id = categories.id 
                WHERE services.id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $sql = "INSERT INTO $this->table (name, category_id, img_thumbnail, overview, content, created_at) 
                VALUES (:name, :category_id, :img_thumbnail, :overview, :content, :created_at)";
        $stmt = $this->connection->prepare($sql);
        $data['created_at'] = date('Y-m-d H:i:s');
        return $stmt->execute($data);
    }
}
