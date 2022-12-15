<?php

require_once('src/model.php');
// require_once('src/model/comment.php'); for old way

function post(string $identifier)
{
    // old way
    // $post = getPost($identifier);
    // $comments = getComments($identifier);

    $post = getPostWithComments($identifier);
    require('templates/post.php');
}

// just asked you for a new feature! We'd like to be able to display a page with the comments of each post.
// Remember the "Comments" link under each post?
// When we click on it, we will display a page with the post and its list of comments.
// Um, but how do we do this with an MVC architecture? 🤔
// I suggest the following plan to get you there:
// You start by writing the view. After all, your main goal is still to display the comments page to the user!
// Then you will write a controller, but in a very fast version, that will pass fake data to the view. This will allow you to check that your display matches your expectations.
// You will refine the controller by making it dynamic and start imagining the services you would like to ask to your model.
// You will finish by implementing your model, so that it responds correctly to the requests of your controller.

// pass fake data to the view 

// $post = [
//     'title' => 'Un faux titre.',
//     'french_creation_date' => '03/03/2022 à 12h14min42s',
//     'content' => "Le faux contenu de mon billet.\nC'est fantastique !",
// ];
// $comments = [
//     [
//         'author' => 'Un premier faux auteur',
//         'french_creation_date' => '03/03/2022 à 12h15min42s',
//         'comment' => 'Un faux commentaire.\n Le premier.',
//     ],
//     [
//         'author' => 'Un second faux auteur',
//         'french_creation_date' => '03/03/2022 à 12h16min42s',
//         'comment' => 'Un faux commentaire.\n Le second.',
//     ],
// ];