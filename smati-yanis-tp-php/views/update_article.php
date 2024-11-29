<?php
$headTitle = "Mise à jour d'un article";

if(!isset($article) || !$article){
  header("Location: /418");
  exit;
}

ob_start();
?>

<section class="main-sections">
  <article class="main-articles">
    <h1 class="main-articles-title">
      <?= $headTitle?>
    </h1>

    <form action="/articles/update" method="POST">
      <label for="title">
        Titre
      </label>
      <input type="text" name="title" id="title" value="<?= $article->title ?>" required/>

      <label for="author">
        Auteur
      </label>
      <input type="text" name="author" id="author" value="<?= $article->author ?>" required/>

      <label for="content">
        Contenu de l'article
      </label>
      <textarea name="content" id="content" required><?= $article->content?></textarea>

      <input type="hidden" value="<?= $article->id ?>" name="id" required/>
      <input type="hidden" value="<?= $article->created_date ?>" name="created_date" required/>

      <button type="submit" class="cta-btns">
        Modifier
      </button>
    </form>

  </article>
</section>

<?php
$mainContent = ob_get_clean();