<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/lib/database.php'); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/model/post.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/model/comment.php'); 

use Application\Model\Comment\CommentRepository;

class UpdateComment
{
    public function execute(string $identifier)
    {
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $comment = $commentRepository->getComment($identifier);

        require($_SERVER['DOCUMENT_ROOT'] . '/templates/update_comment.php');
    }
}