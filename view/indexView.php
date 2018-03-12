<?php $page_title = 'Jean Forteroche - Alaska'; ?>

<?php ob_start(); ?>


<p>Dernieres publications :</p>

<?php
while ($data = $resp->fetch())
{
?>

	<div>
		<h3><?php echo htmlspecialchars($data["title"]); ?></h3>
		<p><?= nl2br(htmlspecialchars($data["content"])); ?></p>
		<p><?= htmlspecialchars($data["post_date_fr"]); ?></p>
		<!-- <a href="../index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a> -->
	</div>
	
<?php
}
$resp->closeCursor();
?>

<?php $page_content = ob_get_clean(); ?>

<?php require('template.php'); ?>