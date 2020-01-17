<form method="post" action="<?= $path; ?>/comment/insert/<?= $post->id ?>">
    Texte : <br>
    <textarea class="form-control" name="content" rows="3" cols="100" placeholder="Saisir un texte." required></textarea><br>
    <div class="form-group row d-flex justify-content-end">
    <input class="btn btn-outline-secondary" type="submit" name="btnCommentIt" value="Comment">
    </div>
</form>