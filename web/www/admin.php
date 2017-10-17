<!DOCTYPE HTML>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<title>Administration du Calendrier Érasien</title>
		<link rel="icon" href="<?php echo $GLOBALS['server']; ?>web/img/favicon.png" />
		
		<!-- JQuery -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<!-- Bootstrap Select -->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css" />
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

		<!-- DataTables -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" />
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

		<!-- Custom -->
		<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['server']; ?>web/css/admin.css" />
		<script type="text/javascript" src="<?php echo $GLOBALS['server']; ?>web/js/admin.js"></script>
	</head>

	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="http://erasia-rpg.forum-actif.net/">
						<img style="max-height: 100%;" src="<?php echo $GLOBALS['server']; ?>web/img/favicon.png">
					</a>
				</div>
				<ul class="nav navbar-nav">
					<li>
						<a href="<?php echo $GLOBALS['server']; ?>calendar">Calendrier</a>
					</li>
					<li <?php if ( preg_match( '/event/', $view ) ) { echo 'class="active"'; } ?> >
						<a href="<?php echo $GLOBALS['server']; ?>admin/event">Événements</a>
					</li>
					<li <?php if ( preg_match( '/location/', $view ) ) { echo 'class="active"'; } ?> >
						<a href="<?php echo $GLOBALS['server']; ?>admin/location">Lieux</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo $GLOBALS['server']; ?>admin/logout">Déconnexion</a></li>
				</ul>
			</div>
		</nav>

		<div style="margin: 70px 15px 15px 15px;">
			<?php
			switch ( $view ) {
				case 'eventCatalogue':
					include( 'web/www/admin/eventCatalogue.php' );
					break;
				case 'eventView':
					include( 'web/www/admin/eventView.php' );
					break;
				case 'locationCatalogue':
					include( 'web/www/admin/locationCatalogue.php' );
					break;
				case 'locationView':
					include( 'web/www/admin/locationView.php' );
					break;
			}
			?>
		</div>
	</body>
</html>