<?php $page_title = 'Commentaires'; ?>

<?php ob_start(); ?>

<?php 

?>
	
	<a href="index.php?action=listPosts">Retour à la liste des articles</a>
	<div>
		<h3><?=  htmlspecialchars($post->getTitle()); ?></h3>
		<p><?= nl2br(htmlspecialchars($post->getContent())); ?></p>
		<p><?= htmlspecialchars($post->getPost_date()); ?></p>	
	</div>

	<div id="add-comment">
		<h2>Nouveau commentaire</h2>

		<form method="post" action="index.php?action=comment&amp;id=<?= $post->getId(); ?>">
			<label for="pseudo">Votre pseudo :</label><br>
			<input type="pseudo" name="pseudo" id="pseudo" placeholder="monPseudo18" required><br>
			<label for="comment">Votre commentaire :</label><br>
			<textarea name="comment" id="comment" required></textarea><br>
			<input type="submit" value="Publier">
		</form>
		
	</div>

	<h2>Commentaires précédents</h2>

	<?php
		for ($ix = 0; $ix < sizeof($comments); $ix++) {
	?>
			<h4><strong><?= htmlspecialchars($comments[$ix]->getAuthor()); ?></strong> le <?= htmlspecialchars($comments[$ix]->getComment_date()); ?></h4>
			<p><?= nl2br(htmlspecialchars($comments[$ix]->getComment())); ?></p>

			<form method="post" action="index.php?action=warning&amp;id=<?= $post->getId() ?>&amp;commentId=<?= $comments[$ix]->getId(); ?>">
				<input type="submit" value="Signaler">
			</form>		
	<?php 
		} 
	
	//$resp->closeCursor();
	?>

<?php $page_content = ob_get_clean(); ?>

<?php require('template.php'); ?>
