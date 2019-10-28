<?php

namespace mvc\modules;

class PDO {

	private $pdo;
	private $stmt;
	private $prepared = [];

	public function __construct(Array $config) {

		$this->pdo = new \PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['database'], $config['user'], $config['password']);
		$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		$this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
	}

	public function query($q) {

		$this->stmt = $this->pdo->query($q);
		return $this;
	}

	public function prepare($q) {

		if (!isset($this->prepared[$q])) {

			$this->prepared[$q] = $this->pdo->prepare($q);
		}

		$this->stmt = $this->prepared[$q];
		return $this;
	}

	public function exec() {

		$this->stmt->execute(func_get_args());
		return $this;
	}

	public function rowCount() {

		return $this->stmt->rowCount();
	}

	public function getAll() {

		return $this->stmt->fetchAll();
	}

	public function getOne() {

		return $this->stmt->fetch();
	}

	public function lastID() {

		return $this->pdo->lastInsertId();
	}

	public function transaction() {

		$this->pdo->beginTransaction();
	}

	public function commit() {

		$this->pdo->commit();
	}

	public function rollBack() {

		$this->pdo->rollBack();
	}

	public function lastInsertId() {

	  return $this->pdo->lastInsertId();
  }
}