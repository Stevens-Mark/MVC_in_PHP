<?php 
// title to be passed into layout
$title = "The Blog of AVBN"; ?>

 <!-- We call the ob_start() function which "memorizes" all the HTML output that follows. -->
<?php ob_start(); ?>

<main class="main">
<section>
<h1>The super blog of AVBN !</h1>
<h2>Latest Blog posts :</h2>

<?php
foreach ($posts as $post): ?>
    <article>
        <h3>
            <?= htmlspecialchars($post->title); ?>
            <em>le <?= $post->creation_date; ?></em>
        </h3>
        <p class="content">
            <?= nl2br(htmlspecialchars($post->content)); ?>
            <br />
            <em><a href="index.php?action=post&id=<?= urlencode($post->post_id) ?>">Comments</a></em>
            <!-- link to main contoller in index.php with parameters for action & id -->
        </p>
    </article>
<?php endforeach ?>  
</section>

</main>

<?php $content = ob_get_clean(); ?>
<!-- Then, at the end, we get the content generated with ob_get_clean() and put it in $content.
This is passed to layout -->

<?php require($_SERVER['DOCUMENT_ROOT'] . '/templates/layout.php') ?>