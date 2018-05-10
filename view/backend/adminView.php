<?php

// Admin Index page

ob_start();
?>
	<div id="index-main">
		<div>
			<h2>Content de vous revoir <?= $adminName ?> !</h2>
		</div> 

		<article class="last-event">
			<h4>Dernier article publié</h4>
			<p>Titre : <?= htmlspecialchars($lastPostTitle); ?></p>
			<p>Publié le : <?= $lastPostPubDateFr->format('d-m-Y'); ?>	
			</p>
		</article>

		<article class="last-event">
			<h4>Dernier commentaire reçu</h4>
			<div>
				<p>Auteur : <?= htmlspecialchars($lastCommentAuthor); ?></p>
				<p>Posté le : <?= $LastCommentPubDateFr->format('d-m-Y'); ?>
				</p>
			</div>
			<p>Commentaire : <?= htmlspecialchars($lastCommentContent); ?></p>
			<p>Au sujet de l'épisode : <?= htmlspecialchars($CommentPostTitle) ?></p>
		</article>
	</div>

<?php 
$page_content = ob_get_clean();

require('template.php');

 ?>
			