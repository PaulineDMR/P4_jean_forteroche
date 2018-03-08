<?php $page_title = 'Jean Forteroche - Blog'; ?>

<?php ob_start(); ?>

<h1>Jean Forteroche<br/>
Ecrivain</h1>
<p>Dernieres publications :</p>

<?php
while ($data = $resp->fetch())
{
?>

	<div>
		<h3><?= htmlspecialchars($data["title"]); ?></h3>
		<p><?= nl2br(htmlspecialchars($data["content"])); ?></p>
		<p><?= htmlspecialchars($data["post_date_fr"]); ?></p>
	</div>
	
<?php
}
$resp->closeCursor();
?>

<?php $page_content = ob_get_clean(); ?>

<?php require('template.php'); ?>