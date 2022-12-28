<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/lib/database.php'); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/model/post.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/model/comment.php'); 

use Application\Model\Post\PostRepository; // used as an alias for PostRepository as this is the declard namespace in src/model/Post

function post(string $identifier)
{
    $postRepository = new PostRepository(); // make a new instance of class PostRepository
    $postRepository->connection = new DatabaseConnection(); // instantiate PostRepository with instantitated instance of DatabaseConnection
    $post = $postRepository->getPost($identifier); // instantiate PostRepository using it's method/to ask the object to send back the right blog post.

    $commentRepository = new CommentRepository();
    $commentRepository->connection = new DatabaseConnection();
    $comments = $commentRepository->getComments($identifier);

    require($_SERVER['DOCUMENT_ROOT'] . '/templates/post.php');
}
