<?php

if (empty($_SESSION)) {
	echo "Vous n'avez pas l'autorisation d'acces";

	throw new Exception("Vous n'avez pas l'autorisation d'acces");	
}

?>

<!DOCTYPE html>
<html>
	
<head>
	<meta charset="utf-8">
	<title>Espace administration</title>
	<link rel="stylesheet" type="text/css" href="view/frontend/style.css">
	<link href="https://fonts.googleapis.com/css?family=Old+Standard+TT|Oswald|Playfair+Display|Roboto" rel="stylesheet">	
	
</head>

<body>
	<header id="admin-header">
		<div>
			<h1>ESPACE ADMINISTRATEUR</h1>	
		</div>
	</header>

	<section id="admin-main">
		<nav>
			<div>
				<p>MENU</p>
			</div>
			<ul>
				<li class="menu-element">
					<img src="view/frontend/img/home.svg" alt="Home" height="30px" width="30px">
    					
					<p id="menu-element1"><a href="index.php?action=login">Accueil</a></p>
				</li>
				<li class="menu-element">
					<p id="menu-element2"><a href="index.php?action=postAdmin">Articles</a></p>
				</li>
				<li class="menu-element">
					<p id="menu-element3"><a href="index.php?action=commentAdmin">Commentaires</a></p>
				</li>
				<li class="menu-element">
					<p id="menu-element4"><a href="index.php?action=writePost">Nouvel article</a></p>
				</li>
				</li>
				<li class="menu-element">
					<img src="view/frontend/img/logout.svg" alt="Logout" height="20px"
    width="20px">
					<p id="menu-element6"><a href="index.php?action=logout">Déconnexion</a></p>
				</li>
 
			</ul>
			
		</nav>

		<div id="main-content">
			<div id="adminmain-content">
			<?= $page_content ?>
			</div>
		</div>	

	</section>
	
<!-- <div>Icons made by <a href="https://www.flaticon.com/authors/iconnice" title="Iconnice">Iconnice</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>

<div>Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>

<div>Icons made by <a href="https://www.flaticon.com/authors/elias-bikbulatov" title="Elias Bikbulatov">Elias Bikbulatov</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>

<div>Icons made by <a href="https://www.flaticon.com/authors/yannick" title="Yannick">Yannick</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div> -->

</body>

</html>