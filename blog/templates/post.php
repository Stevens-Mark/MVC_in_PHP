
<?php $title = "The Blog of AVBN"; ?>

<?php ob_start(); ?>

<main class="main">
    <section>
        <h1>The super blog of AVBN !</h1>
        <h2><a href="index.php">Back to the list of blog posts</a></h2>

        <article>
            <h3>
                <?= htmlspecialchars($post->title) ?>
                <em>le <?= $post->creation_date ?></em>
            </h3>
              <p  class="content">
                <?= nl2br(htmlspecialchars($post->content)) ?>
            </p>
        </article>
    </section>

    <section>
        <h2>Comments</h2>

        <?php
        foreach ($comments as $comment) : ?>
            <article>
                <!-- access to the properties of an object ($object->property) -->
                <p><strong><?= htmlspecialchars(ucfirst($comment->author)) ?></strong> le <?= $comment->comment_date ?> <em><a href="index.php?action=updateComment&id=<?= urlencode($comment->comment_id) ?>">(Modify)</a></em></p>
                <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
            </article>
        <?php endforeach ?> 
    </section>

    <section>
        <h2>Add a Comment</h2>
          <!-- form to add a comment to a post -->
        <form action="index.php?action=addComment&id=<?= $post->post_id ?>" method="post">
            <div>
                <label for="author">Author</label><br />
                <input type="text" id="author" name="author" />
            </div>
            <div>
                <br />
                <label for="comment">Comment</label><br />
                <textarea rows="5" id="comment" name="comment"></textarea>
            </div>
            <div>
                <br />
                <input type="submit" />
            </div>
        </form>
    </section>
</main>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/templates/layout.php') ?>