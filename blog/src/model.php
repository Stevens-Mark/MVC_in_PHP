<?php

// used for linking files & links to pages
$rootPath = $_SERVER['DOCUMENT_ROOT'];
$rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

function dbConnect() {
    try {
      $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8;port=3306', 'root', 'root');

      return $database;
    } catch(Exception $e) {
        die('Error : '.$e->getMessage());
    }
}

function getPosts(): array {

    $database = dbConnect();  // We connect to the database.

    // We retrieve the 5 last blog posts.
    $statement = $database->query(
        "SELECT *, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5"
    );
    $posts = [];
    while (($row = $statement->fetch())) {
      $post = [
          'post_id' => $row['post_id'],
          'title' => $row['title'],
          'creation_date' => $row['french_creation_date'],
          'content' => $row['content'],
      ];

      $posts[] = $post;
    }

    return $posts;
}

function getPost(string $identifier) {

    $database = dbConnect();  // We connect to the database.
    
    $statement = $database->prepare(
        "SELECT post_id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts WHERE post_id = ?"
    );
    $statement->execute([$identifier]);

    $row = $statement->fetch();
    $post = [
        'post_id' => $row['post_id'],
        'title' => $row['title'],
        'creation_date' => $row['french_creation_date'],
        'content' => $row['content'],
        ];

    return $post;
}

function getPostWithComments(string $identifier) {

    $database = dbConnect();  // We connect to the database.

    // retrieve post from post table & all associated comments from comment table
    $retrievePostWithComments = $database->prepare(
        "SELECT *, DATE_FORMAT(c.comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date, DATE_FORMAT(p.creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_post_date FROM posts p LEFT JOIN comments c on p.post_id = c.post_id WHERE p.post_id = :post_id"
    );
    $retrievePostWithComments->execute([
        'post_id' => $identifier,
    ]);
    
    $postWithComments = $retrievePostWithComments->fetchAll(PDO::FETCH_ASSOC);

    $post = [
        'post_id' => $postWithComments[0]['post_id'],
        'title' => $postWithComments[0]['title'],
        'content' => $postWithComments[0]['content'],
        'creation_date' => $postWithComments[0]['french_post_date'],
        'comments' => [],
    ];

    // if comment table not empty then populate all comment data into post comment array
    foreach($postWithComments as $comment) {
        if (!is_null($comment['id'])) {
            $post['comments'][] = [
                'id' => $comment['id'],
                'author' => $comment['author'],
                'comment' => $comment['comment'],
                'comment_date' => $comment['french_creation_date'],
            ];
        }
    }

    return $post;
}


