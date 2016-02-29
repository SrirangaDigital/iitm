<?php

class listingModel extends Model {

	public function __construct() {

		parent::__construct();
	}

	public function listAlbums() {

		$dbh = $this->db->connect(GENERAL_DB_NAME);
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT id FROM ' . METADATA_TABLE . ' order by id');
		
		$sth->execute();
		$data = array();
		
		// Extract only the album id which is attached to each image name
		while($result = $sth->fetch(PDO::FETCH_OBJ)) {

			array_push($data, preg_replace("/_.*/", "", $result->id));
		}

		$data = array_values(array_unique($data));
		$dbh = null;
		return $data;
	}
}

?>