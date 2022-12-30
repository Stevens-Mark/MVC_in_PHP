<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/lib/database.php'); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/model/post.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/model/comment.php'); 

use Application\Model\Comment\CommentRepository;

class UpdateComment
{
    public function execute(string $comment_id, $input)
    {   
        // It handles the form submission when there is an input.
        if ($input !== null) {
        $author = null;
        $comment = null;
        if (!empty($input['author']) && !empty($input['comment'])) {
            $author = $input['author'];
            $comment = $input['comment'];
        } else {
            throw new Exception("The updated form data is invalid.");
        }

        $commentRepository = new CommentRepository(); // make a new instance 
        $commentRepository->connection = new DatabaseConnection(); // instantiate with instantitated instance of DatabaseConnection
        $success = $commentRepository->updateComment($comment_id, $author, $comment); // instantiate using it's method/add updated user input
        if (!$success) {
            throw new Exception("Impossible to update comment !");
        } else {
            header('Location: index.php?action=post&id=' . $input['post_id']);
        }

      } else {
        // Otherwise, it displays the form.
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $comment = $commentRepository->getComment($comment_id);
        require($_SERVER['DOCUMENT_ROOT'] . '/templates/update_comment.php');
      }
    }
}