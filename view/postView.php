<?php $page_title = 'Commentaires'; ?>

<?php ob_start(); ?>
	
	<a href="index.php?action=listPosts">Retour à la liste des articles</a>
	<div>
		<h3><?=  htmlspecialchars($post["title"]); ?></h3>
		<p><?= nl2br(htmlspecialchars($post["content"])); ?></p>
		<p><?= htmlspecialchars($post["post_date_fr"]); ?></p>	
	</div>

	<h2>Commentaires</h2>

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
