<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/post.php");

function homepage() {
    $postRepository = new PostRepository();
    $posts = $postRepository->getPosts();

    require($_SERVER['DOCUMENT_ROOT'] .'/templates/homepage.php');
}

// Our /src/model/post.php file is included with require_once. This is a function very similar to require, but it first checks if the file has already been included! Since /src/model/post.php is also a "code library" file, we want it to be included only once. Otherwise, the inclusion of our two controllers will trigger a double inclusion of our model and thus a PHP crash.