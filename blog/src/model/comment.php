<?php

// require_once('src/model.php');

function getComments(string $identifier) {

	$database = commentDbConnect(); // We connect to the database.
  // $database = dbConnect(); 

  $statement = $database->prepare(
      "SELECT *, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
  );
  $statement->execute([$identifier]);

  $comments = [];
  while (($row = $statement->fetch())) {
      $comment = [
          'author' => $row['author'],
          'comment_date' => $row['french_creation_date'],
          'comment' => $row['comment'],
      ];
      $comments[] = $comment;
  }

  return $comments;
}

function createComment(string $post, string $author, string $comment)
{
	$database = commentDbConnect();
  // $database = dbConnect();

	$statement = $database->prepare(
    	'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())'
	);
	$affectedLines = $statement->execute([$post, $author, $comment]);

	return ($affectedLines > 0);
}

function commentDbConnect()
{
	try {
    	$database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8;port=3306', 'root', 'root');

    	return $database;
	} catch(Exception $e) {
    	die('Error : '.$e->getMessage());
	}
}