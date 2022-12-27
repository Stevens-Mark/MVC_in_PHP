<?php

class Comment
{
    public string $author;
    public string $comment_date;
    public string $comment;
}

function getComments(string $identifier): array {

	$database = commentDbConnect(); // We connect to the database.

  $statement = $database->prepare(
      "SELECT *, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
  );
  $statement->execute([$identifier]);

  $comments = [];
  while (($row = $statement->fetch())) {
      $comment = new Comment();
      $comment ->author = $row['author'];
      $comment ->comment_date = $row['french_creation_date'];
      $comment ->comment = $row['comment'];
      // var_dump($comment); // great for debugging to see comment values
      $comments[] = $comment;
  }

  return $comments;
}

function createComment(string $post_id, string $author, string $comment)
{
	$database = commentDbConnect();

	$statement = $database->prepare(
    	'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())'
	);
	$commentIsAdded = $statement->execute([$post_id, $author, $comment]);

	return ($commentIsAdded > 0);
}

function commentDbConnect() {
    $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8;port=3306', 'root', 'root');
    return $database;
}