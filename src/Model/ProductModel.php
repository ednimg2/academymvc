<?php

namespace App\Model;

use App\Libraries\Model;

class ProductModel extends Model
{
    public function getAllProducts(int $limit = 10): array
    {
        $query = 'SELECT * FROM product LIMIT '. $limit;
        $stdn = $this->db->prepare($query);
        $stdn->execute();

        return $stdn->fetchAll();
    }
}