<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title><?= $page_title ?></title>
	<link rel="stylesheet" type="text/css" href="view/frontend/style.css">
	<link href="https://fonts.googleapis.com/css?family=Old+Standard+TT|Oswald|Playfair+Display|Roboto" rel="stylesheet">
</head>

<body>
	<header id="reader-header">
		
		<div id="reader-banner">
			<p>Billet simple pour l'Aslaska</p>
		</div>
	</header>

	<section id="reader-main">
		<aside>
			<div>
				<h1>Jean Forteroche</h1>
					
				<p>"C'est avec grand plaisir que je publie en ligne mon nouveau roman "Billet simple pour l'Alaska".</p>
				<p>Plongez au coeur d'une saga surprenante et décrouvrez chaque semaine un nouvel épisode du livre. Exprimez vous en publiant vos commentaires et partagez avec les autres lecteurs votre ressenti.</p>
				<img id="photoJean" src="view/frontend/img/man-2785071_640.jpg" alt="portrait d'un homme" name="Photo de Jean Forteroche">
				<h2>Biographie</h2>
				<p>Jean Forteroche est né en 1962 à Clermont Ferrand, il etudie le journalisme à Paris et commence à parcourir le continent Américain à l'âge de 22 ans. C'est au cours de ses voyages qu'il écrit ses premières nouvelles puis vient un roman paru en 1989, "Les Portes De L'Oubli". A ce jour, Jean Forteroche a publié 12 romans et continue de partager sa vie entre voyage et écriture.</p>
			</div>
			
		</aside>
		<div id="main-content">

			<?= $page_content ?>
			
		</div>
	</section>

	<footer id="index-footer">
		
	</footer>
	


</body>
</html>
