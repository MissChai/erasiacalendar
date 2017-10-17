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

		if ( $_POST['begin_date'] ) {
			$begin      = explode( '-', $_POST['begin_date'] );
			$beginDay   = $begin[0];
			$beginMonth = ( isset( $begin[1] ) ) ? $begin[1] : '00';
			$beginYear  = ( isset( $begin[2] ) ) ? $begin[2] : '0000';
			$event->setBeginDate( $beginYear . '-' . $beginMonth . '-' . $beginDay );
		}

		if ( $_POST['end_date'] ) {
			$end      = explode( '-', $_POST['end_date'] );
			$endDay   = $end[0];
			$endMonth = ( isset( $end[1] ) ) ? $end[1] : '00';
			$endYear  = ( isset( $end[2] ) ) ? $end[2] : '0000';
			$event->setEndDate( $endYear  . '-' . $endMonth   . '-' . $endDay );
		}

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

			if ( $_POST['begin_date'] ) {
				$begin      = explode( '-', $_POST['begin_date'] );
				$beginDay   = $begin[0];
				$beginMonth = ( isset( $begin[1] ) ) ? $begin[1] : '00';
				$beginYear  = ( isset( $begin[2] ) ) ? $begin[2] : '0000';
				$event->setBeginDate( $beginYear . '-' . $beginMonth . '-' . $beginDay );
			}

			if ( $_POST['end_date'] ) {
				$end      = explode( '-', $_POST['end_date'] );
				$endDay   = $end[0];
				$endMonth = ( isset( $end[1] ) ) ? $end[1] : '00';
				$endYear  = ( isset( $end[2] ) ) ? $end[2] : '0000';
				$event->setEndDate( $endYear  . '-' . $endMonth   . '-' . $endDay );
			}
			
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