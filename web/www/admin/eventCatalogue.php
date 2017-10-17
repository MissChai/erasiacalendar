<?php
	$date      = new Date();
	$eventRep  = new EventRepository();
	$annual    = $eventRep->findAnnual();
	$aperiodic = $eventRep->findAperiodic();
?>

<div class="pull-right">
	<a href="<?php echo $GLOBALS['server']; ?>admin/event/create" class="btn btn-info">
		<span class="glyphicon glyphicon-plus-sign"></span>
		Nouveau
	</a>
</div>
<h1>Événements</h1>

<br />
<ul id="tabs-event" class="nav nav-tabs nav-justified">
	<li class="active">
		<a href="#annual" aria-controls="annual" data-toggle="tab">Festivals</a>
	</li>
	<li>
		<a href="#aperiodic" aria-controls="aperiodic" data-toggle="tab">Événements</a>
	</li>
</ul>
<br />

<div class="tab-content">
	<div class="tab-pane fade in active" id="annual">
		<p class="lead">
			Ci-dessous se trouve la liste des festivals annuels sur Érasia.
		</p>
		<br />
		<table id="table-annual" class="table table-striped table-data">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nom</th>
					<th>Description</th>
					<th>Début</th>
					<th>Fin</th>
					<th>Lieu</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $annual as $event ) {
				$beginDate = new DateTime( $event->getBeginDate() );
				$endDate   = new DateTime( $event->getEndDate() );
				$editUrl   = $GLOBALS['server'] . 'admin/event/' . $event->getId();

				echo '<tr>';
				echo '<td>' . $event->getId() . '</td>';
				echo '<td><a href="' . $editUrl . '">' . $event->getName() . '</a></td>';
				echo '<td>';
					if ( strlen( $event->getDescription() ) > 50 ) {
						echo substr( $event->getDescription(), 0, 50 ) . '...';
					}
					else {
						echo $event->getDescription();
					}
				echo '</td>';
				echo '<td>' . $beginDate->format( 'j' ) . ' ' . strtolower( $date->months[$beginDate->format( 'n' ) - 1] ) . '</td>';
				echo '<td>' . $endDate->format( 'j' ) . ' ' . strtolower( $date->months[$endDate->format( 'n' ) - 1] ) . '</td>';
				echo '<td>';
					if ( $event->getLocation() ) {
						echo '<span class="' . strtolower( $event->getLocation()->getCountry() ) . '">';
						echo $event->getLocation()->smallString();
						echo '</span>';
					}
				echo '</td>';
				echo '</tr>';
				} ?>
			</tbody>
		</table>
	</div>
	<div class="tab-pane fade" id="aperiodic">
		<p class="lead">
			Ci-dessous se trouve la liste des événements spéciaux se déroulant ou s'étant déroulé sur Érasia.
		</p>
		<br />
		<table id="table-aperiodic" class="table table-striped table-data">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nom</th>
					<th>Description</th>
					<th>Sujet</th>
					<th>Début</th>
					<th>Fin</th>
					<th>Passé</th>
					<th>Lieu</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $aperiodic as $event ) {
				$beginDate = new DateTime( $event->getBeginDate() );
				$endDate   = new DateTime( $event->getEndDate() );
				$editUrl   = $GLOBALS['server'] . 'admin/event/' . $event->getId();

				echo '<tr>';
				echo '<td>' . $event->getId() . '</td>';
				echo '<td><a href="' . $editUrl . '">' . $event->getName() . '</a></td>';
				echo '<td>';
					if ( strlen( $event->getDescription() ) > 50 ) {
						echo substr( $event->getDescription(), 0, 50 ) . '...';
					}
					else {
						echo $event->getDescription();
					}
				echo '</td>';
				echo '<td>';
				if ( $event->getTopic() ) {
					echo '<a href="' . $event->getTopic() . '">News</a>';
				}
				echo '</td>';
				echo '<td>' . $beginDate->format( 'j' ) . ' ' . strtolower( $date->months[$beginDate->format( 'n' ) - 1] ) . ' ' . $beginDate->format( 'Y' ) . '</td>';
				echo '<td>' . $endDate->format( 'j' ) . ' ' . strtolower( $date->months[$endDate->format( 'n' ) - 1] ) . ' ' . $beginDate->format( 'Y' ) . '</td>';
				echo '<td>';
				if ( $event->isPassed() ) {
					echo '<span class="text-danger">Oui</span>';
				}
				else {
					echo '<span class="text-success">Non</span>';
				}
				echo '</td>';
				echo '<td>';
					if ( $event->getLocation() ) {
						echo '<span class="' . strtolower( $event->getLocation()->getCountry() ) . '">';
						echo $event->getLocation()->smallString();
						echo '</span>';
					}
				echo '</td>';
				echo '</tr>';
				} ?>
			</tbody>
		</table>
	</div>


</div>
