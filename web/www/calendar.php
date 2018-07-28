<?php
	// Repositories
	$eventRep = new EventRepository();
	$locRep   = new LocationRepository();

	// Get dates
	$currentYear  = (int) date( 'Y' );
	$currentMonth = (int) date( 'n' );
	$currentDay   = (int) date( 'j' );
	$forwardYear  = $currentYear + 2;

	$date  = new Date();
	$dates = $date->findBetweenYears( $currentYear, $forwardYear );

	// Get events
	$events = $eventRep->findBetweenYears( $currentYear, $forwardYear );
?>

<!DOCTYPE HTML>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<title>Calendrier Érasien</title>
		<link rel="icon" href="<?php echo $GLOBALS['server']; ?>web/img/favicon.png" />
		<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['server']; ?>web/css/all.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['server']; ?>web/css/calendar.css" />
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Sunshiny' />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo $GLOBALS['server']; ?>web/js/calendar.js"></script>
	</head>

	<body>
		<div id="wrap">

			<!-- Header -->
			<div id="page-header">
				<div class="headerbar">
					<div id="logo-desc">
						<a id="logo" href="http://erasia-rpg.forum-actif.net/"></a>
					</div>
				</div>
				<div class="navbar">
					<ul class="linklist navlinks">
						<li>
							<a class="mainmenu" href="http://erasia-rpg.forum-actif.net">
								<img title="Accueil" alt="Accueil" src="<?php echo $GLOBALS['server']; ?>web/img/index.png"></img>
							</a>
						</li>
						<li>
							<a class="mainmenu" href="http://erasia-rpg.forum-actif.net/portal">
								<img title="Portail" alt="Portail" src="<?php echo $GLOBALS['server']; ?>web/img/portal.png"></img>
							</a>
						</li>
						<li>
							<a class="mainmenu" href="http://erasia-rpg.forum-actif.net/faq">
								<img title="FAQ" alt="FAQ" src="<?php echo $GLOBALS['server']; ?>web/img/faq.png"></img>
							</a>
						</li>
						<li>
							<a class="mainmenu" href="http://erasia-rpg.forum-actif.net/search">
								<img title="Recherche" alt="Recherche" src="<?php echo $GLOBALS['server']; ?>web/img/search.png"></img>
							</a>
						</li>
						<li>
							<a class="mainmenu" href="http://erasia-rpg.forum-actif.net/memberlist">
								<img title="Membres" alt="Membres" src="<?php echo $GLOBALS['server']; ?>web/img/members.png"></img>
							</a>
						</li>
						<li>
							<a class="mainmenu" href="http://erasia-rpg.forum-actif.net/groups">
								<img title="Groupes" alt="Groupes" src="<?php echo $GLOBALS['server']; ?>web/img/groups.png"></img>
							</a>
						</li>
						<li>
							<a class="mainmenu" href="http://erasia-rpg.forum-actif.net/profile?mode=editprofile">
								<img title="Profil" alt="Profil" src="<?php echo $GLOBALS['server']; ?>web/img/profile.png"></img>
							</a>
						</li>
						<li>
							<a class="mainmenu" href="http://erasia-rpg.forum-actif.net/privmsg?folder=inbox">
								<img title="Messagerie" alt="Messagerie" src="<?php echo $GLOBALS['server']; ?>web/img/message.png"></img>
							</a>
						</li>
						<li>
							<a class="mainmenu" href="http://erasia-rpg.forum-actif.net/login">
								<img title="Connexion" alt="Connexion" src="<?php echo $GLOBALS['server']; ?>web/img/login.png"></img>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<!-- Explication -->
			<div height="15px">&nbsp;<br />&nbsp;</div>
			<h1>Calendrier érasien</h1>
			<div class="panel">
				<h2>Principe</h2>
				<p>
					Ce calendrier détaille les différents événements périodiques ou non qui se passent sur les terres érasiennes.&nbsp;
					Vous pouvez donc consulter ici les diverses dates durant lesquelles vous êtes invité à lancer des RP s'affiliant à
					des fêtes ou périodes particulières. Pour plus de détails, rendez-vous au règlement lié à ce sujet,
					<a href="http://erasia-rpg.forum-actif.net/t98-4-regles-et-presentation-du-role-play">ici !</a>
				</p>
				<br />

				<h2 id="search">Choix de la date</h2>
				<table width="100%">
					<tr>
						<td width="75"><b>Année&nbsp;:</b></td>
						<td class="years">
							<ul>
								<?php
									$year = $currentYear;
									while ( $year <= $forwardYear ) {
										echo '<li><a href="#search" id="'.$year.'">'.$year.'</a></li>';
										$year++;
									}
								?>
							</ul>
						</td>		
					</tr>
					<tr>
						<td><b>Mois&nbsp;:</b></td>
						<td class="months">
							<ul>
								<?php
									foreach ( $date->months as $id => $month ) {
										$id++;
										echo '<li><a href="#search" id="'.$id.'">'.$month.'</a></li>';
									}
								?>
							</ul>
						</td>
					</tr>
				</table>
				<hr class="separator" />
				<table width="100%">
					<tr>
						<td align="left"><a href="#search" id="prev">« Mois précédent</a></td>
						<td align="right"><a href="#search" id="next">Mois suivant »</a></td>
					</tr>
				</table>
			</div>

			<!-- Calendar -->
			<div class="panel">
				<h2 id="current">
					<span class="current-month"><?php echo $date->months[$currentMonth - 1]; ?></span>
					<span class="current-year"><?php echo $currentYear; ?></span>
				</h2>

				<?php foreach ( $dates as $id_year => $year ): ?>
					<?php foreach( $year as $month => $days ): ?>
						<div class="month" id="<?php echo $id_year.'-'.$month; ?>">
							<table>
								<thead>
									<tr>
										<?php
											foreach ( $date->days as $day ) {
												echo '<th>'.$day.'</th>';
											}
										?>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php
											foreach ( $days as $day => $week_day ) {
												// Add cases if not a monday
												if ( $day == 1 && $week_day != 1 ) {
													$week_day_sub = $week_day - 1;
													echo '<td colspan="'.$week_day_sub.'" class="preambule"></td>';
												}

												// Day number
												$timestamp = $id_year . '-' . $month . '-' . $day;
												if ( $timestamp == date( 'Y-n-j' ) ) {
													echo '<td class="today">';
												}
												else {
													echo '<td>';
												}
												echo '<div class="day">' . $day . '</div>';										

												// On ajoute les événements s'il y en a		
												if ( isset( $events[$timestamp] ) ) {
													echo '<ul class="events">';
													foreach ( $events[$timestamp] as $id => $event ) {
														echo '<li>';
															echo '<span class="title ';
															if ( $event->getLocation() ) {
																echo strtolower( $event->getLocation()->getCountry() );
															}
															echo '">';
																if ( $event->getTopic() ) {
																	echo '<a href="' . $event->getTopic() . '" target="_blank">';
																	echo '<span class="title-orga">Événement organisé :</span> ';
																}
																echo $event->getName();
																if ( $event->getTopic() ) {
																	echo '</a>';
																}
															echo '</span>';

															echo '<div class="desc">';
																echo '<span class="name">';
																	if ( $event->getTopic() ) {
																		echo '<span class="name-orga">Événement organisé</span><br />';
																	}
																	echo $event->getName();
																echo '</span>';
																echo '<br />';
																if ( $event->getLocation() ) {
																	echo '<span class="location ' . strtolower( $event->getLocation()->getCountry() ) . '">';
																		echo $event->getLocation()->smallString();
																	echo '</span>';
																	echo '<br /><hr class="separator" />';	
																}
																echo '<div>' . $event->getDescription() . '</div>';
															echo '</div>';
														echo '</li>';
													}
													echo '</ul>';
												}
												echo '</td>';

												// Return to line a the end of each week
												if ( $week_day == 7 ) {
													echo '</tr><tr>';
												}
											}

											// Add cases if not a sunday
											$end = end( $days );
											if ( $end != 7 ) {
												$end_sub = 7 - $end;
												echo '<td colspan="' . $end_sub . '" class="end"></td>';
											}
										?>
									</tr>
								</tbody>
							</table>
						</div>
					<?php endforeach ?>
				<?php endforeach ?>
			</div>

			<!-- Footer -->
			<div height="15px">&nbsp;<br />&nbsp;</div>
			<div id="page-footer">
				<div class="navbar">
					<div class="inner">
						<span class="corners-top"></span>
						<ul class="linklist clearfix">
							<li class="footer-home"><a href="http://erasia-rpg.forum-actif.net/">Accueil</a></li>
							<li>&nbsp;&nbsp;&nbsp;</li>
							<li><a href="<?php echo $GLOBALS['server']; ?>admin">Administration</a></li>
							<li class="rightside">
								Site web indépendant de forumactif créé et géré par
								<a href="http://erasia-rpg.forum-actif.net/u275" target="_blank">Kaé</a>.<br />
								N'hésitez pas à rapporter des bugs si vous en trouvez. ;)
							</li>
						</ul>
						<span class="corners-bottom"></span>
					</div>
				</div>
				<p class="copyright">&nbsp;</p>
			</div>

		</div>
	</body>
</html>