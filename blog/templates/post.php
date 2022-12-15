
  <?php $title = "The Blog of AVBN"; ?>

  <?php ob_start(); ?>
  <h1>The super blog of AVBN !</h1>
  <p><a href="index.php">Back to the list of blog posts</a></p>

  <div class="news">
      <h3>
          <?= htmlspecialchars($post['title']) ?>
          <em>le <?= $post['creation_date'] ?></em>
      </h3>
        <p>
          <?= nl2br(htmlspecialchars($post['content'])) ?>
      </p>
  </div>

  <h2>Comments</h2>

  <?php
  // ($comments as $comment) used for old way: calling getPosts & getComments seperately
  foreach ($post['comments'] as $comment) : ?>
      <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date'] ?></p>
      <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
  <?php endforeach ?> 

  <!-- form to add a comment to a post -->
<form action="index.php?action=addComment&id=<?= $post['post_id'] ?>" method="post">
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

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>