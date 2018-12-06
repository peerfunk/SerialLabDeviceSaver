<?php

require_once("configuration.php");
require_once('lib/BootStrap.php');

class DatabaseObject extends BootStrap{
	public function getDatabaseConnection(){
		$db_connection = new mysqli(config::$host, config::$user, config::$pass, config::$dbName);
        // change character set to utf8 and check it
        if (!$db_connection->set_charset("utf8")) {
			$this->setMessage('danger',"Es besteht keine Datenbankverbindung");
            // $this->setMessage('danger',$db_connection->error);
        }
		 return $db_connection;
	}
	public function queryDatabase(String $sql){
		 $db_connection = $this->getDatabaseConnection();
			if (!$db_connection->connect_errno) {
				$ret = $db_connection->query($sql)->fetch_all();
			}
			mysqli_close($db_connection);
		return $ret;
	}
	public function insertQuery(String $sql){
		$db_connection = $this->getDatabaseConnection();
			if (!$db_connection->connect_errno) {
				$ret = $db_connection->query($sql);
			}
		$count = mysqli_insert_id($db_connection);
		mysqli_close($db_connection);
		return $count;
	}
	public function lightQuery(String $sql){
		 $db_connection = $this->getDatabaseConnection();
			if (!$db_connection->connect_errno) {
				$ret = $db_connection->query($sql);
			}
			mysqli_close($db_connection);
		return $ret;
	}
	public function multipleQuery(String $sql){
		$db_connection = $this->getDatabaseConnection();	
		$ret = array();
		if (!$db_connection->multi_query($sql)) {
			$this->setMessage('danger',"Es gab einen Fehler bei der Datenbankabfrage: " . $db_connection->error . " " .  $db_connection->errno  );
		}
		do {
			if ($res = $db_connection->store_result()) {
				$ret =($res->fetch_all(MYSQLI_ASSOC));
				$res->free();
			}
		} while ($db_connection->more_results() && $db_connection->next_result());
		return $ret;
		
	}
	
	public function escape(String $string){
		$db_connection = $this->getDatabaseConnection();
		$ret = $db_connection->real_escape_string(strip_tags($string, ENT_QUOTES));
		mysqli_close($db_connection);
		return $ret;
	}
}