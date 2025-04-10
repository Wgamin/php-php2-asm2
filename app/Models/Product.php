<?php

namespace App\Models;

use App\Models\BaseModel;

class Product extends BaseModel
{
    protected $table = 'Products';

    public function getAllProduct()
    {
        $sql = "SELECT products.*, categories.name as category_name
        FROM products
        JOIN categories ON products.category_id = categories.id
        ORDER BY products.id DESC";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getProductById($id)
    {
        $sql = "SELECT products.*, categories.name as category_name
        FROM products
        JOIN categories ON products.category_id = categories.id
        WHERE products.id = :id LIMIT 1";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }
}
