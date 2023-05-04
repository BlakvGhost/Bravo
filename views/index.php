<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle . ' | ' ?> Bravo</title>
    <link rel="favicon" type="image/ico" href="/favicon.ico">
</head>

<body>
    <header>
        <?php require_once 'partials/header.php' ?>
    </header>
    <div>
        <?php include $view ?>
    </div>
    <footer class="footer-update">
        <?php require_once 'partials/footer.php' ?>
    </footer>
</body>

</html>