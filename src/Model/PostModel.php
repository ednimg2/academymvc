<?php

namespace App\Model;

use App\DTO\PostDTO;
use App\Libraries\Model;
use PDO;

class PostModel extends Model
{
    public function getPosts(): array
    {
        $query = 'SELECT * FROM post';
        $stdn = $this->db->prepare($query);
        $stdn->execute();

        return $stdn->fetchAll(PDO::FETCH_CLASS, PostDTO::class);
    }

    public function getPost(int $id)
    {
        $query = 'SELECT * FROM post WHERE id = :id';
        $stdn = $this->db->prepare($query);
        $stdn->bindParam('id', $id);
        $stdn->execute();

        return $stdn->fetchObject(PostDTO::class);
    }
}