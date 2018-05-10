<?php 
ob_start();
?>
	<div id="commentadmin-main">
		<h2 class="adminsection-title">GESTIONNAIRE DE COMMENTAIRES</h2>

		<div id="moderation">
			<h3>Nouveaux commentaires</h3>

			<table class="commentadmin-table admin-table" width="100%">
				<tr>
					<th class="commentth_1">Auteur</th>
					
					<th class="commentth_3">Episode</th>
					<th class="commentth_4">Commentaire</th>
					<th class="commentth_5">Signalé</th>
					<th class="commentth_6">Actions</th>
				</tr>
<?php
	foreach ($comments as $value) {
		if ( $value->getModerated() == false) {
?>
				<tr class="tablerow" height="40px">
					<td><?= htmlspecialchars($value->getAuthor()); ?></td>
					
					<td>
						<?php
							$postId = $value->getPost_id();
							foreach ($posts AS $postValue) {
								if ($postValue->getId() == $postId) {
									echo htmlspecialchars($postValue->getTitle());
								}	
							}
						?>
					</td>
					<td><?= htmlspecialchars($value->getComment()); ?></td>
					<td>
						<?php echo ($value->getWarning() ? 'OUI' : ''); ?>
					</td>
					<td class="actionButtons">
						<button><a href="index.php?action=moderate&amp;id=<?= $value->getId(); ?>">
						<?php 
							echo ($value->getWarning() ? 'Modérer' : 'Valider');
						?></a></button><br/><button><a href="index.php?action=deleteComment&amp;id=<?= $value->getId(); ?>">Supprimer</a></button>
					</td>
				</tr>		
<?php 
		}
	}			
?>  			
			</table>
		</div>
		

		<div id="comments-list">
			<h3>Commentaires modérés</h3>

			<table class="commentadmin-table admin-table" width="100%">
				<tr>
					<th class="commentth_1">Auteur</th>
					<th class="commentth_3">Episode</th>
					<th class="commentth_4">Commentaire</th>
					<th class="commentth_5">Action</th>	
				</tr>
<?php
	foreach ($comments as $value) {
		if ( $value->getModerated() == true) {
?>
				<tr class="tablerow" height="40px">
					<td><?= htmlspecialchars($value->getAuthor()); ?></td>
					
					<td>
						<?php
							$postId = $value->getPost_id();
							foreach ($posts AS $postValue) {
								if ($postValue->getId() == $postId) {
									echo htmlspecialchars($postValue->getTitle());
								}	
							}
						?>
					</td>
					<td><?= htmlspecialchars($value->getComment()); ?></td>
					<td class="actionButtons">
						<button><a href="index.php?action=deleteComment&amp;id=<?= $value->getId(); ?>">Supprimer</a></button>
					</td>	
				</tr>	
<?php 
		}
	}			
?>  
			</table>
		</div>

		
	

<?php

$page_content = ob_get_clean();

require("template.php");

?>