<?php $page_title = 'Jean Forteroche - Alaska'; ?>

<?php ob_start(); ?>

	<div id="posts">
		<p>EPISODES</p>

<?php 
foreach ( $resp AS $value ) {
?>
		<div class="post-excerpt-container">
			<div>
				<h3><?= htmlspecialchars($value->getTitle()); ?></h3>
				<p>
					<?php
						$date = $value->getPublication_date();
						$date_fr = new DateTime($date);
						echo "Publié le " .$date_fr->format('d-m-Y');	
					?>				
				</p>
			</div>
			
			<a class="comment-link" href="index.php?action=post&amp;id=<?= $value->getId(); ?>&amp;page=<?= $pageNumber; ?>">
				<img src="view/frontend/img/reading.svg" alt="chat icon" height="30px" width="30px">
				<p>Lire l'épisode</p>	
			</a>		
		</div>
<?php
} 
?>
	</div>

	<div id="pagination">
		<ul>
			<?php
				for ($page = 1; $page < $numberOfPages; $page++) {
					if (isset($_GET["page"]) && $page == $_GET["page"]) {
					?>
						<li>
							<p><span id="pageActuelle"><?= $page; ?></span> - </p>
						</li>
					<?php  
					} elseif (!isset($_GET["page"]) && $page == 1) { 
					?>
						<li>
							<p><span id="pageActuelle"><?= $page; ?></span> - </p>
						</li>
					<?php   
					} else {
					?>
						<li>
							<p><a href="index.php?action=listPosts&amp;page=<?= $page; ?>"><?= $page; ?></a> - </p>
						</li>
					<?php 
					}	
					?>
				<?php 
				}

				if (isset($_GET["page"]) && $page == $_GET["page"]) {
				?>
					<li>
						<p><span id="pageActuelle"><?= $page; ?></span></p>
					</li>
				<?php
				} else {
				?>
					<li>
						<p><a href="index.php?action=listPosts&amp;page=<?= $page; ?>"><?= $page; ?></a></p>
					</li>
				<?php
				}  	
				?>
				
		</ul>
		
	</div>
	<div id="admin-link">
		<a href="index.php?action=login">Espace administrateur</a>
	</div>

<?php

$page_content = ob_get_clean();

require('template.php');

?>