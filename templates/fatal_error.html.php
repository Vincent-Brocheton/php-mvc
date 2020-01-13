<!DOCTYPE html>
<html>
<?php require "head.html.php" ?>
    <body>


        <div class="container mt-3 pb-5 overflow-auto">
        <div class="alert alert-danger" role="alert">
            <p>Application actuellement indisponible.</p>
            <p>Veuillez contacter un administrateur.</p>
            <?php if (isset($code)): ?>
            <p>(Code d'erreur : <?= $code ?>).</p>
            <?php endif; ?>
        <?php if ($debugMode): ?>
            <p>(Exception : <?= $ex->getMessage(); ?>)</p>
        <?php endif ?>
        </div>
        </div>
<?php require "footer.html.php" ?>
<?php require "scripts.html.php" ?>
    </body>
</html>