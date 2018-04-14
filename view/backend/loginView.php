<?php

session_start();

?>

<!DOCTYPE html>
<html>
	
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../frontend/style.css">	
</head>

<body>
	<div>
		<p>Veuillez vous identifier</p>
	</div>

	<div>
		<?= $errorLoginMessage ?>
	</div>

	<form action="index.php?action=authentification " method="POST">
		<label for="pseudo">Pseudo : <input type="pseudo" name="pseudo" id="pseudo" maxlength="20" required>
		</label>
		<label for="mdp">Mot de passe : <input type="password" name="mdp" id="mdp" maxlength="50" required>
		</label>

		<input type="submit" value="Valider">
	</form>

</body>

</html>