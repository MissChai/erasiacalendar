<?php

class UserRepository {

	/**
	 * Return a list of all users
	 *
	 * @return array List of Location
	 */
	public function findAll() {
		global $dataBase;

		$sql = "
			SELECT *
			FROM t_user
			ORDER BY usr_username
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute();
		$result = $sth->fetchAll();

		$users = array();
		foreach ( $result as $row ) {
			array_push( $users, $this->buildDomainObject( $row ) );
		}
		return $users;
	}

	/**
	 * Returns an user matching the supplied identifier
	 *
	 * @param int $usrId Location identifier
	 * @return User
	 */
	public function findById( $usrId ) {
		global $dataBase;

		$sql = "
			SELECT *
			FROM t_user
			WHERE usr_id = ?
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute( array( $usrId ) );
		$row = $sth->fetch();

		if ( $row ) {
			return $this->buildDomainObject( $row );
		}
	}

	/**
	 * Returns an user matching the supplied username
	 *
	 * @param int $usrUsername User identifier
	 * @return User
	 */
	public function findByUsername( $usrUsername ) {
		global $dataBase;

		$sql = "
			SELECT *
			FROM t_user
			WHERE usr_username = ?
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute( array( $usrUsername ) );
		$row = $sth->fetch();

		if ( $row ) {
			return $this->buildDomainObject( $row );
		}
	}

	/**
	 * Saves an user into the database
	 *
	 * @param User $user User to save
	 * @return User Saved user
	 */
	function save( $user ) {
		if ( $user->getId() ) {
			return $this->update( $user );
		}
		else {
			return $this->insert( $user );
		}
	}

	/**
	 * Inserts an user into the database
	 *
	 * @param User $user User to save
	 * @return User Saved user
	 */
	function insert( $user ) {
		global $dataBase;

		$sql = "
			INSERT INTO t_user ( usr_username, usr_password, usr_role )
			VALUES ( :username, :password, :role )
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute( array(
			'username' => htmlspecialchars( $user->getUsername() ),
			'password' => htmlspecialchars( $user->getPassword() ),
			'role'     => htmlspecialchars( $user->getRole() ),
		) );

		return $this->findById( $dataBase->lastInsertId() );
	}

	/**
	 * Updates an user into the database
	 *
	 * @param User $user User to save
	 * @return User Saved user
	 */
	function update( $user ) {
		global $dataBase;

		$sql = "
			UPDATE t_user
			SET usr_username = :username, usr_password = :password, usr_role = :role
			WHERE usr_id = :id
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute( array(
			'id'       => $user->getId(),
			'username' => htmlspecialchars( $user->getUsername() ),
			'password' => htmlspecialchars( $user->getPassword() ),
			'role'     => htmlspecialchars( $user->getRole() ),
		) );

		return $this->findById( $user->getId() );
	}

	/**
	 * Removes an user from the database
	 *
	 * @param int $usrId User identifier
	 */
	function delete( $usrId ) {
		global $dataBase;

		$sql = "
			DELETE FROM t_user
			WHERE usr_id = ?
		";

		$sth = $dataBase->prepare( $sql );
		$sth->execute( array( $usrId ) );
	}

	/**
	 * Creates an User using on a database row
	 *
	 * @param array $row Database row containing the data
	 * @return User
	 */
	protected function buildDomainObject( $row ) {
		$user = new User();

		$user->setId( $row['usr_id'] );
		$user->setUsername( $row['usr_username'] );
		$user->setPassword( $row['usr_password'] );
		$user->setRole( $row['usr_role'] );

		return $user;
	}
}