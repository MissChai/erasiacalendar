<?php

class LocationController {

	public function catalogueAction() {
		if ( !isset( $_SESSION['username'] ) or !$_SESSION['username'] ) {
			$_SESSION['loginError'] = '';
			include( 'web/www/login.php' );
			return;
		}
		$view = 'locationCatalogue';
		include( 'web/www/admin.php' );
	}

	public function createAction() {
		if ( !isset( $_SESSION['username'] ) or !$_SESSION['username'] ) {
			$_SESSION['loginError'] = '';
			include( 'web/www/login.php' );
			return;
		}
		$view      = 'locationView';
		$locId     = null;
		$errorSave = null;
		$okSave    = null;
		include( 'web/www/admin.php' );
	}

	public function viewAction( $id ) {
		if ( !isset( $_SESSION['username'] ) or !$_SESSION['username'] ) {
			$_SESSION['loginError'] = '';
			include( 'web/www/login.php' );
			return;
		}
		$view      = 'locationView';
		$locId     = $id;
		$errorSave = null;
		$okSave    = null;
		include( 'web/www/admin.php' );
	}

	public function insertAction() {
		if ( !isset( $_SESSION['username'] ) or !$_SESSION['username'] ) {
			$_SESSION['loginError'] = '';
			include( 'web/www/login.php' );
			return;
		}

		$location = new Location();
		$location->setContinent( $_POST['continent'] );
		$location->setCountry( $_POST['country'] );
		$location->setPlace( $_POST['place'] );

		$locRep = new LocationRepository();
		$save = $locRep->save( $location );

		$errorSave = null;
		$okSave    = null;
		if ( !is_a( $save, 'Location' ) ) {
			$locId     = null;
			$errorSave = $save;
		}
		else {
			$locId  = $save->getId();
			$okSave = 'Lieu sauvegardé !';
		}

		$view  = 'locationView';
		include( 'web/www/admin.php' );
	}

	public function updateAction( $id ) {
		if ( !isset( $_SESSION['username'] ) or !$_SESSION['username'] ) {
			$_SESSION['loginError'] = '';
			include( 'web/www/login.php' );
			return;
		}

		$locId     = $id;
		$errorSave = null;
		$okSave    = null;
		$locRep    = new LocationRepository();
		$location  = $locRep->findById( $id );
		
		if ( !$location ) {
			$errorSave = 'Lieu inconnu.';
		}
		else {
			$location->setContinent( $_POST['continent'] );
			$location->setCountry( $_POST['country'] );
			$location->setPlace( $_POST['place'] );
			$save = $locRep->save( $location );

			if ( !is_a( $save, 'Location' ) ) {
				$errorSave = $save;
			}
			else {
				$okSave = 'Lieu sauvegardé !';
			}
		}

		$view  = 'locationView';
		include( 'web/www/admin.php' );
	}

	public function deleteAction( $id ) {
		if ( !isset( $_SESSION['username'] ) or !$_SESSION['username'] ) {
			$_SESSION['loginError'] = '';
			include( 'web/www/login.php' );
			return;
		}
		$locRep = new LocationRepository();
		$locRep->delete( $id );
		header( 'Location: ' . $GLOBALS['server'] . 'admin/location' );
	}

}