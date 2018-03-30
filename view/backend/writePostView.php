<?php 

ob_start();

?>
	<div id="new-article">
		<h2>Nouvel Article</h2>

		<form method="post" action="index.php?action=newPost">
			<label for="titre">Titre de l'article : </label><input type="text" name="titre" id="titre" required>
			<textarea id="contenu" name="contenu" required>Votre text</textarea>
			<input type="submit" value="Créer">
		</form>

	</div>



<?php

$page_content = ob_get_clean();

require("template.php");

?>



