<?php

namespace Application\Model\Comment;

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/lib/database.php'); 

class Comment
{
    public string $author;
    public string $comment_date;
    public string $comment;
}

class CommentRepository
{   // property $connection: of type class DatabaseConnection (object) which contains method getConnection
    public \DatabaseConnection $connection;

    public function getComments(string $identifier): array {
          // make the connection by calling getConnection method of property connection  
          $statement = $this->connection->getConnection()->prepare(
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

      public function createComment(string $post_id, string $author, string $comment): bool
      {   // make the connection by calling getConnection method of property connection  
          $statement = $this->connection->getConnection()->prepare(
              'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())'
          );
          $commentIsAdded = $statement->execute([$post_id, $author, $comment]);

          return ($commentIsAdded > 0);
      }
}