<?php
 $rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <!-- title contents passed as variable -->
        <title><?= $title ?></title>
        <link rel="stylesheet" href="<?php echo($rootUrl.'templates/css/style.css'); ?>">
    </head>

    <body class="body">
      <!-- template(s) placed here -->
        <?= $content ?>
    </body>
</html>
