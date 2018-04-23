<?php

// Admin Index page

ob_start();
?>
	<div id="index-main">
		<div>
			<h2>Content de vous revoir <?= $name ?> !</h2>
			<!-- Fonctionnalité possible : <p>Dernière connecion à <span class="todo">Date, heure !!!!</span></p>  -->
		</div> 

		<article class="last-event">
			<h4>Dernier article publié</h4>
			<p>Titre : <?= $lastPost->getTitle(); ?></p>
			<p>Publié le : 
				<?php
					$publicationDate = $lastPost->getPublication_date();
					$publicationDateFr = new DateTime($publicationDate);
					echo $publicationDateFr->format('d-m-Y');
				?>	
			</p>
			<p>Nombre de commentaires associés : <!-- /*$commentsNumber;*/  --></p>
		</article>

		<article class="last-event">
			<h4>Dernier commentaire reçu</h4>
			<div>
				<p>Auteur : <?= $lastComment->getAuthor(); ?></p>
				<p>Posté le : 
					<?php 
						$publicationDate = $lastComment->getComment_date();
						$publicationDateFr = new DateTime($publicationDate);
						echo $publicationDateFr->format('d-m-Y');
					?>
				</p>
			</div>
			<p>Commentaire : <?= $lastComment->getComment(); ?></p>
			<p>Au sujet de l'épisode : <?= $post->getTitle(); ?></p>
		</article>

		<article class="last-event">
			<h4>Commentaire signalé</h4>
			<div>
				<p>Auteur : </p>
				<p>Date de publication :</p>
			</div>
			<p>Commentaire kjdhflqjsdhfkqsgdqshgdkqshgdkqshdgflqjshfdlqjhsd sdfh qskdfgq</p>
			<p>Article concerné Titre : </p>
			<button>Modérer</button>
			<button>Archiver</button>
		</article>


	</div>

<?php 
$page_content = ob_get_clean();

require('template.php');

 ?>
			