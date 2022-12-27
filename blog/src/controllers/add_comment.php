<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/model/comment.php');

function addComment(string $post_id, array $input)
{
    $author = null;
    $comment = null;
    if (!empty($input['author']) && !empty($input['comment'])) {
        $author = $input['author'];
        $comment = $input['comment'];
    } else {
        throw new Exception("The form data is invalid.");
    }

    $commentAddedSuccess = createComment($post_id, $author, $comment);
    if (!$commentAddedSuccess) {
        throw new Exception("Impossible to add comment !");
    } else {
        header('Location: index.php?action=post&id=' . $post_id);
    }
}