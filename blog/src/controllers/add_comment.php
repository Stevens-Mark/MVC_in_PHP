<?php

require_once('src/model/comment.php');

function addComment(string $post, array $input)
{
    $author = null;
    $comment = null;
    if (!empty($input['author']) && !empty($input['comment'])) {
        $author = $input['author'];
        $comment = $input['comment'];
    } else {
        die('The form data is invalid.');
    }

    $success = createComment($post, $author, $comment);
    if (!$success) {
        die('Impossible to add comment !');
    } else {
        header('Location: index.php?action=post&id=' . $post);
    }
}