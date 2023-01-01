
<?php $title = "The Blog of AVBN"; ?>

<?php ob_start(); ?>

<main class="main">
    
    <h1>The super blog of AVBN !</h1>
    <h2><a href="index.php?action=post&id=<?= urlencode($comment->post_id) ?>">Back to the blog post</a></h2>

    <h2>Update the Comment</h2>

    <p><?= $comment->comment_date ?></p>
      <!-- form to update comment on the post -->
    <form action="index.php?action=updateComment&id=<?= $comment->comment_id ?>" method="post">
        <div class="sr-only">
            <label for="post_id"">Post ID</label>
            <input type="hidden" id="post_id" name="post_id" value="<?php echo($comment->post_id); ?>">
        </div>
        <div>
            <label for="author">Author</label><br />
            <input type="text" id="author" name="author"  value="<?php echo strip_tags($comment->author); ?>" />
        </div>
        <div>
            <br />
            <label for="comment">Comment</label><br />
            <textarea rows="5" id="comment" name="comment"><?= strip_tags($comment->comment); ?></textarea>
        </div>
        <div>
            <br />
            <input type="submit" />
        </div>
    </form>

</main>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/templates/layout.php') ?>