<?php $page_title = 'Jean Forteroche - Alaska'; ?>

<?php ob_start(); ?>


<p>Dernieres publications :</p>

<?php 

/*var_dump($resp);
echo "<br>";
echo sizeof($resp);*/


for ($index = 0; $index < sizeof($resp); $index++ ) {
?>

	<div>
		<h3><?= htmlspecialchars($resp["$index"]["title"]); ?></h3>
		<p><?= nl2br(htmlspecialchars($resp["content"])); ?></p>
		<p><?= htmlspecialchars($resp["post_date_fr"]); ?></p>
		<a href="index.php?action=post&amp;id=<?= $resp["id"] ?>">Commentaires</a>
	</div>

<?php

} 
?>

<!--
/*foreach ($resp as $key => $value) {
?>
	<div>
		<h3><?php echo htmlspecialchars($resp["title"]); ?></h3>
		<p><?= nl2br(htmlspecialchars($resp["content"])); ?></p>
		<p><?= htmlspecialchars($resp["post_date_fr"]); ?></p>
		<a href="index.php?action=post&amp;id=<?= $resp["id"] ?>">Commentaires</a>
	</div>
	
	-->

<?php
/*

$resp->closeCursor();

$page_content = ob_get_clean();

require('template.php');
*/

?>*/