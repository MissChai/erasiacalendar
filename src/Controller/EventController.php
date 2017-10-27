<?php

class EventController {

	public function catalogueAction() {
		if ( !isset( $_SESSION['username'] ) or !$_SESSION['username'] ) {
			$_SESSION['loginError'] = '';
			include( 'web/www/login.php' );
			return;
		}
		$view = 'eventCatalogue';
		include( 'web/www/admin.php' );
	}

	public function createAction() {
		if ( !isset( $_SESSION['username'] ) or !$_SESSION['username'] ) {
			$_SESSION['loginError'] = '';
			include( 'web/www/login.php' );
			return;
		}
		$view      = 'eventView';
		$evtId     = null;
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
		$view      = 'eventView';
		$evtId     = $id;
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

		$event = new Event();
		$event->setName( $_POST['name'] );
		$event->setDescription( $_POST['description'] );
		$event->setTopic( $_POST['topic'] );
		$event->setIsAnnual( ( $_POST['is_annual'] ) ? true : false );

		if ( $_POST['location'] ) {
			$locRep   = new LocationRepository();
			$location = $locRep->findById( $_POST['location'] );
			if ( $location ) {
				$event->setLocation( $location );
			}
		}

		$beginDay   = ( isset( $_POST['begin_date_day'] ) )   ? $_POST['begin_date_day']   : '00';
		$beginMonth = ( isset( $_POST['begin_date_month'] ) ) ? $_POST['begin_date_month'] : '00';
		$beginYear  = ( isset( $_POST['begin_date_year'] ) )  ? $_POST['begin_date_year']  : '0000';
		$event->setBeginDate( $beginYear . '-' . $beginMonth . '-' . $beginDay );

		$endDay   = ( isset( $_POST['end_date_day'] ) )   ? $_POST['end_date_day']   : '00';
		$endMonth = ( isset( $_POST['end_date_month'] ) ) ? $_POST['end_date_month'] : '00';
		$endYear  = ( isset( $_POST['end_date_year'] ) )  ? $_POST['end_date_year']  : '0000';
		$event->setEndDate( $endYear  . '-' . $endMonth   . '-' . $endDay );

		$evtRep = new EventRepository();
		$save   = $evtRep->save( $event );

		$errorSave = null;
		$okSave    = null;
		if ( !is_a( $save, 'Event' ) ) {
			$evtId     = null;
			$errorSave = $save;
		}
		else {
			$evtId  = $save->getId();
			$okSave = 'Événement sauvegardé !';
			$_SESSION['okSave'] = 'Événement sauvegardé !';
		}

		if ( $_POST['ajax'] ) {
			if ( $errorSave ) {
				echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> <strong>Erreur lors de la sauvegarde :</strong> ' . $errorSave . '</div>';
			}
			else {
				echo $GLOBALS['server'] . 'admin/event/' . $evtId;
			}
		}
		else {
			$view  = 'eventView';
			include( 'web/www/admin.php' );
		}
	}

	public function updateAction( $id ) {
		if ( !isset( $_SESSION['username'] ) or !$_SESSION['username'] ) {
			$_SESSION['loginError'] = '';
			include( 'web/www/login.php' );
			return;
		}

		$evtId     = $id;
		$errorSave = null;
		$okSave    = null;
		$evtRep    = new EventRepository();
		$event     = $evtRep->findById( $id );
		
		if ( !$event ) {
			$errorSave = 'Événement inconnu.';
		}
		else {
			$event->setName( $_POST['name'] );
			$event->setDescription( $_POST['description'] );
			$event->setTopic( $_POST['topic'] );
			$event->setIsAnnual( ( $_POST['is_annual'] ) ? true : false );
			
			if ( $_POST['location'] ) {
				$locRep   = new LocationRepository();
				$location = $locRep->findById( $_POST['location'] );
				if ( $location ) {
					$event->setLocation( $location );
				}
			}

			$beginDay   = ( isset( $_POST['begin_date_day'] ) )   ? $_POST['begin_date_day']   : '00';
			$beginMonth = ( isset( $_POST['begin_date_month'] ) ) ? $_POST['begin_date_month'] : '00';
			$beginYear  = ( isset( $_POST['begin_date_year'] ) )  ? $_POST['begin_date_year']  : '0000';
			$event->setBeginDate( $beginYear . '-' . $beginMonth . '-' . $beginDay );

			$endDay   = ( isset( $_POST['end_date_day'] ) )   ? $_POST['end_date_day']   : '00';
			$endMonth = ( isset( $_POST['end_date_month'] ) ) ? $_POST['end_date_month'] : '00';
			$endYear  = ( isset( $_POST['end_date_year'] ) )  ? $_POST['end_date_year']  : '0000';
			$event->setEndDate( $endYear  . '-' . $endMonth   . '-' . $endDay );
			
			$save = $evtRep->save( $event );

			if ( !is_a( $save, 'Event' ) ) {
				$errorSave = $save;
			}
			else {
				$okSave = 'Événement sauvegardé !';
				$_SESSION['okSave'] = 'Événement sauvegardé !';
			}
		}

		if ( $_POST['ajax'] ) {
			if ( $errorSave ) {
				echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> <strong>Erreur lors de la sauvegarde :</strong> ' . $errorSave . '</div>';
			}
			else {
				echo $GLOBALS['server'] . 'admin/event/' . $evtId;
			}
		}
		else {
			$view  = 'eventView';
			include( 'web/www/admin.php' );
		}
	}

	public function deleteAction( $id ) {
		if ( !isset( $_SESSION['username'] ) or !$_SESSION['username'] ) {
			$_SESSION['loginError'] = '';
			include( 'web/www/login.php' );
			return;
		}
		$evtRep = new EventRepository();
		$evtRep->delete( $id );
		header( 'Location: ' . $GLOBALS['server'] . 'admin/event' );
	}

}