<?php $page_title = 'Commentaires'; ?>

<?php ob_start(); ?>
	
	<a href="index.php?action=listPosts">Retour à la liste des articles</a>
	<div>
		<h3><?=  htmlspecialchars($post["title"]); ?></h3>
		<p><?= nl2br(htmlspecialchars($post["content"])); ?></p>
		<p><?= htmlspecialchars($post["post_date_fr"]); ?></p>	
	</div>

	<div id="add-comment">
		<h2>Nouveau commentaire</h2>

		<form method="post" action="index.php?action=comment&amp;id=<?= $post['id'] ?>">
			<label for="pseudo">Votre pseudo :</label><br>
			<input type="pseudo" name="pseudo" id="pseudo" placeholder="monPseudo18" required><br>
			<label for="comment">Votre commentaire :</label><br>
			<textarea name="comment" id="comment" required></textarea><br>
			<input type="submit" value="Publier">
		</form>
		
	</div>

	<h2>Commentaires précédents</h2>

	<?php
		while ($comment = $comments->fetch())
		{
	?>
			<h4><strong><?= htmlspecialchars($comment["author"]); ?></strong> le <?= htmlspecialchars($comment["comment_date_fr"]); ?></h4>
			<p><?= nl2br(htmlspecialchars($comment["comment"])); ?></p>
	<?php		
		}
	$comments->closeCursor();
	?>

<?php $page_content = ob_get_clean(); ?>

<?php require('template.php'); ?>
