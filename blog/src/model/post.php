<?php

// used for linking files & links to pages
$rootPath = $_SERVER['DOCUMENT_ROOT'];
$rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

class Post
{
    public string $post_id;
    public string $title;
    public string $creation_date;
    public string $content;
}

class PostRepository
{
	public ?PDO $database = null;

  public function getPost(/* PostRepository $this, */ string $identifier): Post
  {
      $this->dbConnect();  // We connect to the database.
      
      $statement = $this->database->prepare(
          "SELECT post_id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts WHERE post_id = ?"
      );
      $statement->execute([$identifier]);

      $row = $statement->fetch();
      $post = new Post();
      $post ->post_id = $row['post_id'];
      $post ->title = $row['title'];
      $post ->creation_date = $row['french_creation_date'];
      $post ->content = $row['content'];

      return $post;
  }

  public function getPosts(): array 
  {
      $this->dbConnect();  // We connect to the database.

      // We retrieve the 5 last blog posts.
      $statement = $this->database->query(
          "SELECT *, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5"
      );
      $posts = [];
      while (($row = $statement->fetch())) {
          $post = new Post();
          $post ->post_id = $row['post_id'];
          $post ->title = $row['title'];
          $post ->creation_date = $row['french_creation_date'];
          $post ->content = $row['content'];

          $posts[] = $post;
      }

      return $posts;
  }

  public function dbConnect() {
    if ($this->database === null) {
        $this->database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8;port=3306', 'root', 'root');
    }
  }
  
}




