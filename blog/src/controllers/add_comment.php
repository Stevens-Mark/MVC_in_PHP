<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/lib/database.php'); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/model/comment.php');

use Application\Model\Comment\CommentRepository;

class AddComment 
{
    public function execute(string $post_id, array $input)
    {
        $author = null;
        $comment = null;
        if (!empty($input['author']) && !empty($input['comment'])) {
            $author = $input['author'];
            $comment = $input['comment'];
        } else {
            throw new Exception("The form data is invalid.");
        }

        $commentRepository = new CommentRepository(); // make a new instance 
        $commentRepository->connection = new DatabaseConnection(); // instantiate with instantitated instance of DatabaseConnection
        $success = $commentRepository->createComment($post_id, $author, $comment); // instantiate using it's method/add user input
        if (!$success) {
            throw new Exception("Impossible to add comment !");
        } else {
            header('Location: index.php?action=post&id=' . $post_id);
        }
    }
}