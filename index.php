<!DOCTYPE HTML>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<title>Calendrier Érasien</title>
		<link rel="stylesheet" type="text/css" href="css/all.css" />
		<link rel="stylesheet" type="text/css" href="css/calendar.css" />
		<link href='http://fonts.googleapis.com/css?family=Sunshiny' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</head>
	
	<body>
		<div id="wrap">
			<div id="page-header">
				<div class="headerbar">
					<div class="inner">
						<span class="corners-top"></span>
						<div id="logo-desc">
							<a id="logo" href="http://erasia-rpg.forum-actif.net/"></a>
						</div>
						<span class="corners-bottom"></span>
					</div>
				</div>
				<div class="navbar">
					<div class="inner">
						<span class="corners-top"></span>
						<ul class="linklist navlinks">
						    <li>
						        <a class="mainmenu" href="http://erasia-rpg.forum-actif.net">
						            <img title="Accueil" alt="Accueil" src="img/index.png"></img>
						        </a>
						    </li>
						    <li>
						        <a class="mainmenu" href="http://erasia-rpg.forum-actif.net/portal">
						            <img title="Portail" alt="Portail" src="img/portal.png"></img>
						        </a>
						    </li>
						    <li>
						        <a class="mainmenu" href="http://erasia-rpg.forum-actif.net/faq">
						            <img title="FAQ" alt="FAQ" src="img/faq.png"></img>
						        </a>
						    </li>
						    <li>
						        <a class="mainmenu" href="http://erasia-rpg.forum-actif.net/search">
						            <img title="Recherche" alt="Recherche" src="img/search.png"></img>
						        </a>
						    </li>
						    <li>
						        <a class="mainmenu" href="http://erasia-rpg.forum-actif.net/memberlist">
						            <img title="Membres" alt="Membres" src="img/members.png"></img>
						        </a>
						    </li>
						    <li>
						        <a class="mainmenu" href="http://erasia-rpg.forum-actif.net/groups">
						            <img title="Groupes" alt="Groupes" src="img/groups.png"></img>
						        </a>
						    </li>
						    <li>
						        <a class="mainmenu" href="http://erasia-rpg.forum-actif.net/profile?mode=editprofile">
						            <img title="Profil" alt="Profil" src="img/profile.png"></img>
						        </a>
						    </li>
						    <li>
						        <a class="mainmenu" href="http://erasia-rpg.forum-actif.net/privmsg?folder=inbox">
						            <img title="Messagerie" alt="Messagerie" src="img/message.png"></img>
						        </a>
						    </li>
						    <li>
						        <a class="mainmenu" href="http://erasia-rpg.forum-actif.net/login">
						            <img title="Connexion" alt="Connexion" src="img/login.png"></img>
						        </a>
						    </li>
						</ul>
						<span class="corners-bottom"></span>
					</div>
				</div>
			</div>
			
			<div height="15px">&nbsp;</div>
			
			<?php
				// Require
				require("config.php");
				require("date.php");
				require("event.php");
		
				// Get all dates
				$current_year = date("Y");
				$current_month = date("n");
				$current_day = date("j");
				$forward_year = $current_year + 2;
				$date = new Date();
				$dates = $date->getAll($current_year, $forward_year);
		
				// Get all events
				$event = new Event();
				$events = $event->getAll($current_year, $forward_year);
			?>
			<h1>Calendrier érasien</h1>
			<div class="panel">
				<div class="inner">
					<span class="corners-top"></span>
					<h2>Principe</h2>
					<p>
						Ce calendrier détaille les différents événements périodique ou non qui se passent sur les terres érasiennes.&nbsp;
						Vous pouvez donc consulter ici les diverses dates durant lesquelles vous êtes invité à lancer des RP s'affiliant à
						des fêtes ou périodes particulières. Pour plus de détails, rendez-vous au règlement lié à ce sujet,
						<a href="http://erasia-rpg.forum-actif.net/t98-4-regles-et-presentation-du-role-play">ici !</a>
					</p>
					<br />
					<h2 id="search">Choix de la date</h2>
					<table width="100%">
						<tr>
							<td width="75"><b>Année:</b></td>
							<td class="years">
								<ul>
									<?php
										$year = $current_year;
										while ($year <= $forward_year) {
											echo '<li><a href="#search" id="'.$year.'">'.$year.'</a></li>';
											$year++;
										}
									?>
								</ul>
							</td>		
						</tr>
						<tr>
							<td><b>Mois:</b></td>
							<td class="months">
								<ul>
									<?php
										foreach ($date->months as $id=>$month)
										{
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
					<span class="corners-bottom"></span>
				</div>
			</div>
			
			<div class="panel">
				<div class="inner">
					<span class="corners-top"></span>
					<h2 id="current">
						<span class="current-month"><?php echo $date->months[$current_month - 1]; ?></span>
						<span class="current-year"><?php echo $current_year; ?></span>
					</h2>
					<?php foreach ($dates as $id_year=>$year): ?>
						<?php foreach($year as $month=>$days): ?>
							<div class="month" id="<?php echo $id_year.'-'.$month; ?>">
								<table>
									<thead>
										<tr>
											<?php
												foreach ($date->days as $day)
													echo '<th>'.$day.'</th>';
											?>
										</tr>
									</thead>
									<tbody>
										<tr>
											<?php
												foreach ($days as $day=>$week_day)
												{
													// On ajoute des cases si on ne commence pas par un lundi
													if ($day == 1 && $week_day != 1)
													{
														$week_day_sub = $week_day - 1;
														echo '<td colspan="'.$week_day_sub.'" class="preambule"></td>';
													}
												
													// On compléte les cases avec le numéro
													$timestamp = strtotime($id_year.'-'.$month.'-'.$day);
													if ($timestamp == strtotime(date('Y-n-d')))
														echo '<td class="today">';
													else
														echo '<td>';
													echo '<div class="day">'.$day.'</div>';
											
													// On ajoute le jour de la semaine
											
											
													// On ajoute les événements s'il y en a		
													if (isset($events[$timestamp]))
													{
														echo '<ul class="events">';
														foreach ($events[$timestamp] as $id=>$event)
														{
															echo '<li>';
																echo '<span class="title '.$event->getCountry().'">';
																	if ($event->topic)
																	{
																		echo '<a href="'.$event->topic.'" target="_blank">';
																		echo '<span class="title-orga">Événement organisé :</span> ';
																	}
																	echo $event->name;
																	if ($event->topic)
																		echo '</a>';
																echo '</span>';

																echo '<div class="desc">';
																	echo '<span class="name">';
																		if ($event->topic)
																			echo '<span class="name-orga">Événement organisé</span><br />';
																		echo $event->name;
																	echo '</span>';
																	echo '<br />';
																	echo '<span class="location '.$event->getCountry().'">';
																		echo $event->location;
																	echo '</span>';
																	echo '<br /><hr class="separator" />';
																	echo '<div>'.$event->description.'</div>';
																echo '</div>';
															echo '</li>';
														}
														echo '</ul>';
													}
												
													echo '</td>';
											
													// On retourne à la ligne à chaque fin de semaine
													if ($week_day == 7)
														echo '</tr><tr>';
												}
										
												// On compléte si on ne finit pas par un dimanche
												$end = end($days);
												if ($end != 7)
												{
													$end_sub = 7 - $end;
													echo '<td colspan="'.$end_sub.'" class="end"></td>';
												}
											?>
										</tr>
									</tbody>
								</table>
							</div>
						<?php endforeach ?>
					<?php endforeach ?>
				</div>
				<span class="corners-bottom"></span>
			</div>
			
			<div height="15px">&nbsp;<br />&nbsp;</div>
			<div id="page-footer">
				<div class="navbar">
					<div class="inner">
						<span class="corners-top"></span>
						<ul class="linklist clearfix">
							<li class="footer-home"><a class="icon-home" href="http://erasia-rpg.forum-actif.net/">Accueil</a></li>
							<li class="rightside">
								Site web indépendant de forumactif créé et géré par
								<a href="http://erasia-rpg.forum-actif.net/u275" target="_blank">Kaé</a> ;
								n'hésitez pas à rapporter des bugs si vous en trouvez. ;)
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