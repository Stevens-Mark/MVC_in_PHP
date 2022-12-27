
<?php $title = "Error"; ?>

<?php ob_start(); ?>

<main class="main">
    <section>
        <h1>The super blog of AVBN !</h1>

        <div class="error">
            <h2>
                <?= $errorMessage ?>
            </h2>
            <h2><a href="index.php">Back to the list of blog posts</a></h2>
        </div>
    </section>
</main>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/templates/layout.php') ?>