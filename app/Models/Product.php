<?php

namespace App\Models;

use App\Models\BaseModel;

class Product extends BaseModel
{
    protected $table = 'products';

    public function getAllProduct()
    {
        $sql = "SELECT products.*, categories.name as category_name
                FROM $this->table
                LEFT JOIN categories ON products.category_id = categories.id
                ORDER BY products.id DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getProductById($id)
    {
        $sql = "SELECT products.*, categories.name as category_name
                FROM $this->table
                LEFT JOIN categories ON products.category_id = categories.id
                WHERE products.id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $sql = "INSERT INTO $this->table (category_id, name, price, active, img_thumbnail) 
                VALUES (:category_id, :name, :price, :active, :img_thumbnail)";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE $this->table SET 
                category_id = :category_id,
                name = :name,
                price = :price,
                active = :active,
                img_thumbnail = :img_thumbnail
                WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
