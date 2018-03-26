<?php $page_title = 'Jean Forteroche - Alaska'; ?>

<?php ob_start(); ?>


<p>Dernieres publications :</p>

<?php 

for ($index = 0; $index < sizeof($resp); $index++ ) {
?>

	<div>
		<h3><?= htmlspecialchars($resp["$index"]->getTitle()); ?></h3>
		<p><?= nl2br(htmlspecialchars($resp["$index"]->getContent())); ?></p>
		<p><?= htmlspecialchars($resp["$index"]->getPost_date()); ?></p>
		<a href="index.php?action=post&amp;id=<?= $resp["$index"]->getId(); ?>">Commentaires</a>
	</div>

<?php
} 

//$resp->closeCursor();

$page_content = ob_get_clean();

require('template.php');

?>