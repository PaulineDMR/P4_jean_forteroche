<?php 

ob_start();

?>
	<div id="new-article">
		<h2>Nouvel Article</h2>

<!-- <body>
  <textarea>Next, start a free trial!</textarea>
</body> -->
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  		<script>tinymce.init({ selector:'textarea' });</script>


		<form method="post" action="index.php?action=newPost">
			<label for="titre"></label><input type="text" name="titre" id="titre" required value="<?= $title ?>">
			<textarea id="contenu" name="contenu" required><?= $content ?></textarea>
			<input type="submit" value="Créer">
		</form>

	</div>



<?php

$page_content = ob_get_clean();

require("template.php");

?>



<!--  -->