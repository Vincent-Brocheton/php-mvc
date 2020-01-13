<!DOCTYPE html>
<html>
<?php require "head.html.php" ?>
    <body>

<?php require "post_list_form.html.php" ?>
        <div class="container mt-3 pb-5 overflow-auto">
        <?php foreach($postArray as $post):?>
        
            <div class="card mb-3" style="width: 18rem;">
            <div class="card-body">
            <h5 class="card-title"><?= $post->title; ?></h5>
            <p class="card-text"><?= $post->content; ?></p>
            </div>
            <div class="card-footer text-muted">
            <?php require "comment_list.html.php" ?>
            </div>
            </div>
            <?php endforeach; ?>
        </div>
<?php require "footer.html.php" ?>
<?php require "scripts.html.php" ?>
    </body>
</html>