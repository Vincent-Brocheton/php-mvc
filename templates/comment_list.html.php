<?php $comments = $post->getComments();?>
<?php if (count($comments)):?>
<?php foreach ($comments as $comment): ?>
<p>
<?= $comment->datetime; ?> </br>
<?= $comment->content; ?> </br>
</p>
<?php endforeach; ?>
<?php endif; ?>
<?php require "comment_list_form.html.php"; ?>