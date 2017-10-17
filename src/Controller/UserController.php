<?php

class UserController {

	public function loginAction() {
		$userRep = new UserRepository();
		$user    = $userRep->findByUsername( $_POST['username'] );
		if ( !$user ) {
			$_SESSION['loginError'] = "Nom d'utilisateur incorrect.";
			include( 'web/www/login.php' );
			return;
		}
		if ( !isset( $_POST['password'] ) or $_POST['password'] != $user->getPassword() ) {
			$_SESSION['loginError'] = "Mot de passe incorrect.";
			include( 'web/www/login.php' );
			return;
		}

		$_SESSION['loginError'] = '';
		$_SESSION['username']   = $_POST['username'];
		header( 'Location: ' . $GLOBALS['server'] . 'admin' );
	}

	public function logoutAction() {
		error_log($_SESSION['username']);
		$_SESSION['username'] = '';
		header( 'Location: ' . $GLOBALS['server'] . 'admin' );
	}

}