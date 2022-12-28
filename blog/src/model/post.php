<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/lib/database.php'); 
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
    // property $connection: of type class DatabaseConnection (object) which contains method getConnection
    public DatabaseConnection $connection;

    public function getPost(/* PostRepository $this, */ string $identifier): Post
    {   // make the connection by calling getConnection method of property connection  
        $statement = $this->connection->getConnection()->prepare(
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
        // make the connection by calling getConnection method of property connection 
        // We retrieve the 5 last blog posts.
        $statement = $this->connection->getConnection()->query(
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
}




