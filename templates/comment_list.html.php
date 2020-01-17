<?php $comments = $post->getComments();?>
<?php foreach ($comments as $comment): ?>
<p>
<?= $comment->datetime; ?> </br>
<?= $comment->content; ?> </br>
</p>
<?php endforeach; ?>