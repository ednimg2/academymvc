<?php

namespace App\Controller;

use App\DTO\PostDTO;
use App\Libraries\Controller;
use App\Model\PostModel;
use PDO;

class PostController extends Controller
{
    private PostModel $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();

        $this->render('post/list.php', [
            'posts' => $posts,
            'title' => 'Title',
        ]);
    }

    public function get()
    {
        $post = $this->postModel->getPost(1);

        $this->render('post/post.php', [
            'post' => $post,
        ]);
    }
}