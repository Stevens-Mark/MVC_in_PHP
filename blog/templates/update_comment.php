
<?php $title = "The Blog of AVBN"; ?>

<?php ob_start(); ?>

<main class="main">
    
    <h1>The super blog of AVBN !</h1>
    <h2><a href="index.php?action=post&id=<?= urlencode($comment->post_id) ?>">Back to the blog posts</a></h2>

    <h2>Update the Comment</h2>
      <!-- form to update comment on the post -->
    <form action="index.php?action=updteComment&id=<?= $comment->comment_id ?>" method="post">
        <div>
            <label for="author">Author</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Comment</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>

</main>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/templates/layout.php') ?>