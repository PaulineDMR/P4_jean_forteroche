<?php 
ob_start();
?>
	<div id="postadmin-main">
		<h2>GESTIONNAIRE D'ARTICLES</h2>

		<div id="publications">
			<h3>Articles publiés</h3>

			<table class="postadmin-table">
				<tr>
					<th>Titre</th>
					<th>Date de création</th>
					<th>Date de publication</th>
					<th>nombre de commentaires</th>
				</tr>
<?php
	foreach ($publishedPosts as $value) {
?>
				<tr>
					<td><?= $value->getTitle(); ?></td>
					<td><?= $value->getPost_date(); ?></td>
					<td><?= $value->getPublication_date(); ?></td>
					<td><span class="todo">Nbre de commentaires</span></td>
					<td><button>Modifier ?</button></td>
				</tr>	
<?php 
	}			
?>  			
			</table>
		

		<div id="brouillons">
			<h3>Articles en attente de publication</h3>

			<table class="postadmin-table">
				<tr>
					<th>Titre</th>
					<th>Date de création</th>	
				</tr>
<?php
	foreach ($nonPublishedPosts as $value) {
?>
				<tr>
					<td><?= $value->getTitle(); ?></td>
					<td><?= $value->getPost_date(); ?></td>
					<td><a href="index.php?action=writePost&amp;id=<?= $value->getId(); ?>"><button>Editer</button></a></td>
					<td><a href="index.php?action=publishPost&amp;id=<?= $value->getId(); ?>"><button>Publier</button></td>
					<td><button>Supprimer</button></a></td>
				</tr>	
<?php 
	}			
?>  
			</table>
		</div>			
	</div>

		
	

<?php

$page_content = ob_get_clean();

require("template.php");

?>

