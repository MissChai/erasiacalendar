<?php
	$loc        = new Location();
	$continents = $loc->continents;

	$location = null;
	$events   = null;
	if ( $locId ) {
		$locRep    = new LocationRepository();
		$evtRep    = new EventRepository();
		$location  = $locRep->findById( $locId );
		$frequency = $locRep->getFrequency( $location->getId() );
		$events    = $evtRep->findByLocation( $location->getId() );
	}
?>

<h1><?php
	if ( !$location ) {
		echo 'Nouveau lieu';
	}
	else {
		echo "Modification d'un lieu";
	}
?></h1>
<br />

<?php if ( $errorSave ) { ?>
	<div class="alert alert-danger">
		<span class="glyphicon glyphicon-exclamation-sign"></span>
		<strong>Erreur lors de la sauvegarde :</strong>
		<?php echo $errorSave; ?>
	</div>
<?php } ?>
<?php if ( $okSave ) { ?>
	<div class="alert alert-success">
		<span class="glyphicon glyphicon-ok-sign"></span>
		<?php echo $okSave; ?>
	</div>
<?php } ?>

<form action="<?php echo $GLOBALS['server']; ?>admin/location<?php if ( $location ) { echo '/' . $location->getId(); } ?>" method="post" class="form-horizontal well">

	<div class="form-group">
		<label class="col-sm-2 control-label" for="continent">Continent</label>
		<div class="col-sm-8">
			<select class="selectpicker form-control" name="continent" id="continent">
				<?php foreach ( array_keys( $continents ) as $continent ) {
					echo '<option ';
					if ( $location and $location->getContinent() == $continent ) {
						echo 'selected';
					}
					echo '>' . $continent . '</option>';
				}?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="country">Pays / Tribu</label>
		<div class="col-sm-8">
			<select class="selectpicker form-control" title="Tous" name="country" id="country">
				<option data-subtext="Tous" <?php if ( $location and $location->getCountry() == '' ) { echo 'selected'; } ?> ></option>
				<optgroup class="optgroup-erasia" label="Pays">
					<option <?php if ( $location and $location->getCountry() == 'Terros' ) { echo 'selected'; } ?> >
						Terros
					</option>
					<option <?php if ( $location and $location->getCountry() == 'Mizuhan' ) { echo 'selected'; } ?> >
						Mizuhan
					</option>
					<option <?php if ( $location and $location->getCountry() == 'Flamen' ) { echo 'selected'; } ?> >
						Flamen
					</option>
					<option <?php if ( $location and $location->getCountry() == 'Nalcia' ) { echo 'selected'; } ?> >
						Nalcia
					</option>
				</optgroup>
				<optgroup class="optgroup-midgard" label="Tribus">
					<option <?php if ( $location and $location->getCountry() == 'Abyan' ) { echo 'selected'; } ?> >
						Abyan
					</option>
					<option <?php if ( $location and $location->getCountry() == 'Aliphyr' ) { echo 'selected'; } ?> >
						Aliphyr
					</option>
					<option <?php if ( $location and $location->getCountry() == 'Torcan' ) { echo 'selected'; } ?> >
						Torcan
					</option>
					<option <?php if ( $location and $location->getCountry() == 'Dyrinn' ) { echo 'selected'; } ?> >
						Dyrinn
					</option>
				</optgroup>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="place">Lieu</label>
		<div class="col-sm-8">
			<input maxlength="255" class="form-control" type="text" id="place" name="place" value="<?php if ( $location ) { echo $location->getPlace(); } ?>"/>
		</div>
	</div>

	<?php if ( $location ) { ?>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="place">Fréquence</label>
		<div class="col-sm-8" style="height: 34px; padding: 8px 0px 0px 18px;">
			<?php if ( $frequency ) {
				echo '<span class="text-danger">' . $frequency . '</span>';
			}
			else {
				echo $frequency;
			}?>
		</div>
	</div>
	<?php } ?>

	<div class="text-center">
		<a href="<?php echo $GLOBALS['server']; ?>admin/location" class="btn btn-default">
			<span class="glyphicon glyphicon-arrow-left"></span> Retourner à la liste
		</a>
		<button type="reset" class="btn btn-primary refresh">
			<span class="glyphicon glyphicon-refresh"></span> Recommencer
		</button>
		<?php if ( $location ) { ?>
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
			<span class="glyphicon glyphicon-remove"></span> Supprimer
		</button>
		<?php } ?>
		<button type="submit" class="btn btn-success">
			<span class="glyphicon glyphicon-ok"></span> Enregister
		</button>
	</div>
</form>

<?php if ( $location ) { ?>
<div class="modal fade" id="modal-delete">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Supprimer le lieu</h4>
			</div>
			<div class="modal-body">
				Êtes-vous sûr de vouloir supprimer ce lieu ?
				
				<?php if ( $frequency ) { ?>
				<br /><br />
				<div class="alert alert-danger">
					<span class="glyphicon glyphicon-exclamation-sign"></span>
					<strong>Attention,</strong>
					ce lieu est utilisé par les événements suivants :
					<ul>
						<?php foreach ( $events as $event ) {
							echo '<li>' . $event->getName() . '</li>';
						}?>
					</ul>
				</div>
				<?php } ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<span class="glyphicon glyphicon-arrow-left"></span> Annuler
				</button>
				<a href="<?php echo $GLOBALS['server'] . 'admin/location/' . $location->getId() . '/delete'; ?>" class="btn btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Supprimer
				</a>
			</div>
		</div>
	</div>
</div>
<?php } ?>