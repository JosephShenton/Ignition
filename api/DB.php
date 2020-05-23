<?php
class DB {

	private $pdo;

	private static function connect() {
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=dbname;charset=utf8', 'username', 'password');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}

	public static function query($query, $params = array()) {
		$statement = self::connect()->prepare($query);
		$statement->execute($params);

		if (explode(' ', $query)[0] == 'SELECT') {
			$data      = $statement->fetchAll();
			$statement = null;
			$pdo       = null;
			return $data;
		}
	}

}

?>