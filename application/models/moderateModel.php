<?php


class moderateModel extends Model {

	public function __construct() {

		parent::__construct();
	}

	public function listPhotos() {

		$dbh = $this->db->connect(DB_NAME);
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE_L5);

		$sth->execute();
		$data = array();
		
		while($result = $sth->fetch(PDO::FETCH_OBJ)) {

			array_push($data, $result);
		}

		$dbh = null;
		return $data;
	}

	public function getModifedDetails($id,$moderationid){

		$dbh = $this->db->connect(DB_NAME);
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE_L5  . ' WHERE id = :id and moderationid = :moderationid');

		$sth->bindParam(':id', $id);
		$sth->bindParam(':moderationid', $moderationid);

		$sth->execute();
		$data = array();
		
		while($result = $sth->fetch(PDO::FETCH_OBJ)) {

			array_push($data, $result);
		}

		$dbh = null;
		return $data;
	}

	public function getJsonFor($id){

		if(preg_match('/__/', $id)){
			
			list($albumID,$photoID) = preg_split('/__/',$id);
			$file = PHY_PHOTO_URL . $albumID . "/" . $photoID . ".json";
			$photoDetails = file_get_contents($file);
			$data = json_decode($photoDetails, true);
			$data["albumID"] = $albumID;
		}
		else{

			$file = PHY_PHOTO_URL . $id . ".json";
			$albumDetails = file_get_contents($file);
			$data = json_decode($albumDetails, true);			
		}

		return $data;
	}
}

?>
