<?php $comments = $post->getComments();?>
<?php foreach ($comments as $comment): ?>
<?= $comment->datetime; ?> </br>
<?= $comment->content; ?> </br>
<?php endforeach; ?>