<?php
	$locRep    = new LocationRepository();
	$locations = $locRep->findAll();
?>

<div class="pull-right">
	<a href="<?php echo $GLOBALS['server']; ?>admin/location/create" class="btn btn-info">
		<span class="glyphicon glyphicon-plus-sign"></span>
		Nouveau
	</a>
</div>
<h1>Lieux</h1>
<p class="lead">
	Ci-dessous se trouve la liste des lieux utilisés pour les événements.
</p>
<br />
<table id="table-location" class="table table-striped table-data">
	<thead>
		<tr>
			<th>ID</th>
			<th>Continent</th>
			<th>Pays / Tribu</th>
			<th>Lieu</th>
			<th>Fréquence</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ( $locations as $location ) {
		$editUrl   = $GLOBALS['server'] . 'admin/location/' . $location->getId();
		$frequency = $locRep->getFrequency( $location->getId() );

		echo '<tr>';
		echo '<td>' . $location->getId() . '</td>';
		echo '<td><a href="' . $editUrl . '">' . $location->getContinent() . '</a></td>';
		echo '<td><span class="' . strtolower( $location->getCountry() ) . '">' . $location->getCountry() . '</span></td>';
		echo '<td>' . $location->getPlace() . '</td>';
		echo '<td>';
		if ( !$frequency ) {
			echo '<span class="text-danger">' . $frequency . '</span>';
		}
		else {
			echo $frequency;
		}
		echo '</td>';
		echo '</tr>';
		} ?>
	</tbody>
</table>
