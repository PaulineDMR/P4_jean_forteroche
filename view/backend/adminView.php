<?php

// Admin Index page

ob_start();
?>
	<div id="index-main">
		<div>
			<h2>Content de vous revoir <?= $name ?> !</h2>
			<p>Dernière connecion à <span class="todo">Date, heure !!!!</span></p>
		</div>

		<article class="last-event">
			<h4>Dernier article publié</h4>
			<p>Titre :</p>
			<p>Extrait  khdflqshfleurfqsjdflqjgfqsgdqjhg</p>
			<p>Date de publication :</p>
			<p>Nombre de commentaires associés : 8500 !!!</p>
			<button>Ecrire une nouvel article</button>
		</article>

		<article class="last-event">
			<h4>Dernier commentaire reçu</h4>
			<div>
				<p>Auteur : </p>
				<p>Date de publication :</p>
			</div>
			<p>Commentaire kjdhflqjsdhfkqsgdqshgdkqshgdkqshdgflqjshfdlqjhsd sdfh qskdfgq</p>
			<p>Article concerné Titre : </p>
			<button>Modérer</button>
			<button>Archiver</button>
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
			