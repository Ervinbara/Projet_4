   <?php
   $bdd = new PDO("mysql:host=127.0.0.1;dbname=blog;charset=utf8", "root", "");
   if(isset($_POST['article_titre'], $_POST['article_contenu'])) {
   if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {
      
      $article_titre = htmlspecialchars($_POST['article_titre']);
      $article_contenu = htmlspecialchars($_POST['article_contenu']);
      $ins = $bdd->prepare('INSERT INTO post (title, content, creation_date) VALUES (?, ?, NOW())');
      $ins->execute(array($article_titre, $article_contenu));
      $message = 'Votre Chapitre a bien été posté';
   } else {
      $message = 'Veuillez remplir tous les champs';
   }
}
?>