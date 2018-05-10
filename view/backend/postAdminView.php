<?php 
ob_start();
?>
	<div id="postadmin-main">
		<h2 class="adminsection-title">GESTIONNAIRE D'ARTICLES</h2>

		<div id="publications">
			<h3>Articles publiés</h3>

			<table class="postadmin-table admin-table">
				<tr>
					<th>Titre</th>
					<th>Date de création</th>
					<th>Date de publication</th>
				</tr>
<?php
	foreach ($publishedPosts as $value) {
?>
				<tr class="tablerow">
					<td><?= htmlspecialchars($value->getTitle()); ?></td>
					<td>
						<?php 
							$postDate = $value->getPost_date();
							$postDateFr = new DateTime($postDate);
							echo $postDateFr->format('d-m-Y');
						?>	
					</td>
					<td>
						<?php
							$publicationDate = $value->getPublication_date();
							$publicationDateFr = new DateTime($publicationDate);
							echo $publicationDateFr->format('d-m-Y');
						?>	
					</td>
					<td><button><a href="index.php?action=writePost&amp;id=<?= $value->getId(); ?>">Modifier</a></button></td>
				</tr>	
<?php 
	}			
?>  			
			</table>
		

		<div id="brouillons">
			<h3>Articles en attente de publication</h3>

			<table class="postadmin-table admin-table">
				<tr>
					<th>Titre</th>
					<th>Date de création</th>	
				</tr>
<?php
	foreach ($nonPublishedPosts as $value) {
?>
				<tr class="tablerow">
					<td><?= htmlspecialchars($value->getTitle()); ?></td>
					<td>
						<?php 
							$postDate = $value->getPost_date();
							$postDateFr = new DateTime($postDate);
							echo $postDateFr->format('d-m-Y');
						?>	
					<td><button><a href="index.php?action=writePost&amp;id=<?= $value->getId(); ?>">Editer</a></button></td>
					<td><button><a href="index.php?action=publishPost&amp;id=<?= $value->getId(); ?>">Publier</a></button></td>
					<td><button><a href="index.php?action=deletePost&amp;id=<?= $value->getId(); ?>">Supprimer</a></button></td>
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

