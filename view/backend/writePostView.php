<?php 

ob_start();

?>
	<div id="new-article">
		<h2>
			<?php 
				if ($_GET["action"] == "writePost" && isset($_GET["id"])) {
					echo "Modifier l'article";
				} else {
					echo "Nouvel Article";
				}
			?>
		</h2>

		<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  		<script>tinymce.init({ selector:'textarea' });</script>

		<form method="post" action="index.php?<?= $url ?>">
			<label for="titre"></label><input type="text" name="titre" id="titre" value="<?= $title ?>" required>
			<textarea id="contenu" name="contenu"s required><?= $content ?></textarea>
			<input type="submit" value="<?= $submit ?>">
		</form>

	</div>



<?php

$page_content = ob_get_clean();

require("template.php");

?>