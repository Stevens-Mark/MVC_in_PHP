<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/controllers/add_comment.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/controllers/homepage.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/controllers/post.php');

if (isset($_GET['action']) && $_GET['action'] !== '') {
    if ($_GET['action'] === 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $identifier = $_GET['id'];

            post($identifier); // call post controller/function with identifier as parameter
        } else {
            echo 'Error: no blog ID sent';
            die;
        }
    } elseif ($_GET['action'] === 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $identifier = $_GET['id'];

            addComment($identifier, $_POST); // call add_comment controller/function with identifier & user input data as parameters
        } else {
            echo 'Error: no Post ID sent';
            die;
        }
    } else {
        echo "404 error: the page you are looking for does not exist.";
    }
} else {
	  homepage(); // call homepage controller/function
}

// The "router" (HERE) is a component of the code that has the role of receiving all the requests from the application and routing each one to the right controller.
// We prefer to create one file per controller, all gathered in the same folder. Inside, each file defines a function, which will be called by the router.
// When working with "code library" type PHP files, you have to use require_once to avoid crashes.