<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/controllers/add_comment.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/controllers/update_comment.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/controllers/homepage.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/controllers/post.php');

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {

        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                $postpage = new Postpage(); // create new instance of class /controller
                $postpage->displaypostpage($identifier); // call method to display page
                // (new Postpage())->displaypostpage($identifier); // shorthand version
            } else {
              throw new Exception("No blog ID sent");
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                $input = $_POST;

                $addComment = new AddComment(); // create new instance of class /controller
                $addComment->execute($identifier, $input); // call method 'execute' to add comment with identifier/post_id  & user input data as parameters
                // (new AddComment())->execute($identifier, $input); // shorthand version
            } else {
                throw new Exception("No Post ID sent");
            }
        } elseif ($_GET['action'] === 'updateComment') {
          if (isset($_GET['id']) && $_GET['id'] > 0) {
              $identifier = $_GET['id'];
              // $input = $_POST;

              $updateComment = new updateComment(); // create new instance of class /controller
              $updateComment->execute($identifier, $input); // call method 'execute' to update comment with identifier/post_id  & user input data as parameters
              // (new updateComment())->execute($identifier, $input); // shorthand version
          } else {
              throw new Exception("No comment ID sent");
          }
        } else {
          throw new Exception("The page you are looking for does not exist.");
        }
    } else {
        $homepage = new Homepage(); // create new instance of class /controller
        $homepage->displayHomepage(); // call method to display page
        // (new Homepage())->displayHomepage(); // shorthand version
    }

} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    
    require($_SERVER['DOCUMENT_ROOT'] .'/templates/error.php');
}

// The "router" (HERE) is a component of the code that has the role of receiving all the requests from the application and routing each one to the right controller.
// We prefer to create one file per controller, all gathered in the same folder. Inside, each file defines a function, which will be called by the router.
// When working with "code library" type PHP files, you have to use require_once to avoid crashes.