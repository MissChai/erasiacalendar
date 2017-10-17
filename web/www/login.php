<!DOCTYPE HTML>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<title>Administration du Calendrier Érasien</title>
		<link rel="icon" href="<?php echo $GLOBALS['server']; ?>web/img/favicon.png" />
		<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['server']; ?>web/css/admin.css" />
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo $GLOBALS['server']; ?>web/js/admin.js"></script>
	</head>

	<body>
		<div class="well" style="width: 600px; margin: 15px auto;">
			<h1>S'enregistrer</h1>
			<p class="lead">
				Seuls les modérateurs peuvent administrer le calendrier érasien.
			</p>
			<br />

			<?php if ( isset( $_SESSION['loginError'] ) and $_SESSION['loginError'] ) { ?>
			<div class="alert alert-danger">
				<span class="glyphicon glyphicon-exclamation-sign"></span> <?php echo $_SESSION['loginError'] ?>
			</div>
			<br />
			<?php } ?>

			<form action="<?php echo $GLOBALS['server']; ?>admin/login" method="post">
				<div class="form-group">
					<label for="username">Nom d'utilisateur</label>
					<input type="text" class="form-control" name="username" id="username" placeholder="Nom d'utilisateur">
				</div>
				<div class="form-group">
					<label for="password">Mot de passe</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
				</div>

				<br />
				<center>
					<a href="calendar" class="btn btn-default">Retourner au calendrier</a>
					<button type="submit" class="btn btn-primary">Entrer</button>
				</center>
			</form>
		</div>
	</body>
</html>