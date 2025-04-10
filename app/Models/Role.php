<?php
namespace App\Models;

use App\Models\BaseModel;

class Role extends BaseModel
{
    protected $table = 'roles';

    public function all() {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}