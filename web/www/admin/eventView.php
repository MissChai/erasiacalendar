<?php
	$date      = new Date();
	$locRep    = new LocationRepository();
	$locations = $locRep->findAll();

	$event     = null;
	$beginDate = null;
	$endDate   = null;
	if ( $evtId ) {
		$evtRep    = new EventRepository();
		$event     = $evtRep->findById( $evtId );
		$beginDate = new DateTime( $event->getBeginDate() );
		$endDate   = new DateTime( $event->getEndDate() );
	}
?>

<h1><?php
	if ( !$event ) {
		echo 'Nouvel événement';
	}
	else {
		echo "Modification d'un événement";
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
<?php if ( $okSave or isset( $_SESSION['okSave'] ) ) { ?>
	<div class="alert alert-success" id="ok-save">
		<span class="glyphicon glyphicon-ok-sign"></span>
		<?php
		if ( !$okSave ) {
			$okSave = $_SESSION['okSave'];
		}
		$_SESSION['okSave'] = null;
		echo $okSave;
		?>
	</div>
<?php } ?>
<div id="ajax"></div>

<form action="<?php echo $GLOBALS['server']; ?>admin/event<?php if ( $event ) { echo '/' . $event->getId(); } ?>" method="post" class="form-horizontal well" id="form-event">
	<input type="hidden" name="ajax" value="1" />

	<div class="form-group">
		<label class="col-sm-2 control-label" for="name">Nom</label>
		<div class="col-sm-8">
			<input maxlength="255" class="form-control" type="text" id="name" name="name" value="<?php if ( $event ) { echo $event->getName(); } ?>"/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="description">Description</label>
		<div class="col-sm-8">
			<textarea class="form-control" rows="3" id="description" name="description"><?php if ( $event ) { echo $event->getDescription(); } ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="is_annual">Annuel</label>
		<div class="col-sm-8">
			<div class="radio" style="padding-top: 0px;">
				<label class="radio-inline">
					<input type="radio" name="is_annual" id="is_annual_yes" value="1" <?php if ( !$event or $event->getIsAnnual() ) { echo 'checked'; } ?>>
					Oui
				</label>
				<label class="radio-inline">
					<input type="radio" name="is_annual" id="is_annual_no" value="0" <?php if ( $event and !$event->getIsAnnual() ) { echo 'checked'; } ?>>
					Non
				</label>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Début</label>
		<div class="col-sm-1">
			<select name="begin_date_day" id="begin_date_day"
				class="selectpicker form-control"
				title="Jour"
				data-dropup-auto="false"
				data-live-search="true"
				data-live-search-style="startsWith"
				data-none-results-text="Date incorrecte"
			>
				<?php for ( $i = 1; $i <= 31; $i++ ) {
					echo '<option value="' . $i . '" ';
					if ( $beginDate and $beginDate->format( 'j' ) == $i ) {
						echo 'selected';
					}
					echo '>' . $i . '</option>';
				}?>
			</select>
		</div>
		<div class="col-sm-1 mini">/</div>
		<div class="col-sm-2">
			<select name="begin_date_month" id="begin_date_month"
				class="selectpicker form-control"
				title="Mois"
				data-dropup-auto="false"
			>
				<?php for ( $i = 1; $i <= 12; $i++ ) {
					echo '<option value="' . $i . '" ';
					if ( $beginDate and $beginDate->format( 'n' ) == $i ) {
						echo 'selected';
					}
					echo '>' . $date->months[$i - 1] . '</option>';
				}?>
			</select>
		</div>
		<div class="col-sm-1 mini">/</div>
		<div class="col-sm-2">
			<select name="begin_date_year" id="begin_date_year"
				class="selectpicker form-control"
				title="Année"
				data-dropup-auto="false"
				data-live-search="true"
				data-live-search-style="startsWith"
				data-none-results-text="Date incorrecte"
			>
				<?php for ( $i = 2008; $i <= (date( 'Y' ) + 10); $i++ ) {
					echo '<option value="' . $i . '" ';
					if ( $beginDate and $beginDate->format( 'Y' ) == $i ) {
						echo 'selected';
					}
					echo '>' . $i . '</option>';
				}?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Fin</label>
		<div class="col-sm-1">
			<select name="end_date_day" id="end_date_day"
				class="selectpicker form-control"
				title="Jour"
				data-dropup-auto="false"
				data-live-search="true"
				data-live-search-style="startsWith"
				data-none-results-text="Date incorrecte"
			>
				<?php for ( $i = 1; $i <= 31; $i++ ) {
					echo '<option value="' . $i . '" ';
					if ( $endDate and $endDate->format( 'j' ) == $i ) {
						echo 'selected';
					}
					echo '>' . $i . '</option>';
				}?>
			</select>
		</div>
		<div class="col-sm-1 mini">/</div>
		<div class="col-sm-2">
			<select name="end_date_month" id="end_date_month"
				class="selectpicker form-control"
				title="Mois"
				data-dropup-auto="false"
			>
				<?php for ( $i = 1; $i <= 12; $i++ ) {
					echo '<option value="' . $i . '" ';
					if ( $endDate and $endDate->format( 'n' ) == $i ) {
						echo 'selected';
					}
					echo '>' . $date->months[$i - 1] . '</option>';
				}?>
			</select>
		</div>
		<div class="col-sm-1 mini">/</div>
		<div class="col-sm-2">
			<select name="end_date_year" id="end_date_year"
				class="selectpicker form-control"
				title="Année"
				data-dropup-auto="false"
				data-live-search="true"
				data-live-search-style="startsWith"
				data-none-results-text="Date incorrecte"
			>
				<?php for ( $i = 2008; $i <= (date( 'Y' ) + 10); $i++ ) {
					echo '<option value="' . $i . '" ';
					if ( $endDate and $endDate->format( 'Y' ) == $i ) {
						echo 'selected';
					}
					echo '>' . $i . '</option>';
				}?>
			</select>
		</div>
	</div>

	<?php if ( $event and !$event->getIsAnnual() ) { ?>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="place">Passé</label>
		<div class="col-sm-8" style="height: 34px; padding: 8px 0px 0px 18px;">
			<?php if ( $event->isPassed() ) {
				echo '<span class="text-danger">Oui</span>';
			}
			else {
				echo '<span class="text-success">Non</span>';
			}?>
		</div>
	</div>
	<?php } ?>	

	<div class="form-group">
		<label class="col-sm-2 control-label" for="location">Lieu</label>
		<div class="col-sm-8">
			<select
				class="selectpicker form-control"
				name="location" id="location"
				title="Sans"
				data-dropup-auto="false"
				data-live-search="true"
				data-none-results-text="Aucun lieu trouvé"
			>
				<option value="" data-subtext="Sans" <?php if ( !$event or !$event->getLocation() ) { echo 'selected'; } ?>></option>
				<?php foreach ( $locations as $location ) {
					echo '<option value="' . $location->getId() . '" ';
					if ( $event and $event->getLocation() and $event->getLocation()->getId() == $location->getId() ) {
						echo 'selected';
					}
					echo '>' . $location->fullString() . '</option>';
				}?>
			</select>
			<p class="help-block">
				Si le lieu que vous voulez assigner n'existe pas, vous devez le
				<a href="<?php echo $GLOBALS['server']; ?>admin/location/create" target="_blank">créer</a>.
			</p>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="topic">Sujet</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" id="topic" name="topic" value="<?php if ( $event ) { echo $event->getTopic(); } ?>"/>
		</div>
	</div>

	<div class="text-center">
		<a href="<?php echo $GLOBALS['server']; ?>admin/event" class="btn btn-default">
			<span class="glyphicon glyphicon-arrow-left"></span> Retourner à la liste
		</a>
		<button type="reset" class="btn btn-primary refresh">
			<span class="glyphicon glyphicon-refresh"></span> Recommencer
		</button>
		<?php if ( $event ) { ?>
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
			<span class="glyphicon glyphicon-remove"></span> Supprimer
		</button>
		<?php } ?>
		<button type="submit" class="btn btn-success">
			<span class="glyphicon glyphicon-ok"></span> Enregister
		</button>
	</div>
</form>

<?php if ( $event ) { ?>
<div class="modal fade" id="modal-delete">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Supprimer l'événement</h4>
			</div>
			<div class="modal-body">
				Êtes-vous sûr de vouloir supprimer cet événement ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<span class="glyphicon glyphicon-arrow-left"></span> Annuler
				</button>
				<a href="<?php echo $GLOBALS['server'] . 'admin/event/' . $event->getId() . '/delete'; ?>" class="btn btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Supprimer
				</a>
			</div>
		</div>
	</div>
</div>
<?php } ?>