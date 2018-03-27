<?php $page_title = 'Jean Forteroche - Alaska'; ?>

<?php ob_start(); ?>


<p>Dernieres publications :</p>

<?php 
foreach ( $resp AS $value ) {
?>

	<div>
		<h3><?= htmlspecialchars($value->getTitle()); ?></h3>
		<p><?= nl2br(htmlspecialchars($value->getContent())); ?></p>
		<p><?= htmlspecialchars($value->getPost_date()); ?></p>
		<a href="index.php?action=post&amp;id=<?= $value->getId(); ?>">Commentaires</a>
	</div>

<?php
} 
?>

	<div>
		<a href="index.php?action=login">Espace administrateur</a>
	</div>

<?php

$page_content = ob_get_clean();

require('template.php');

?>