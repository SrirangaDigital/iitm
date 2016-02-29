<?php

class data extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

		$this->insertPhotoDetails();
	}

	public function insertPhotoDetails(){
		
		//First list all xml files in Photos folder
		$folderName =  PHY_VOL_URL . "*.json";

		$filesList = glob($folderName);

		if($filesList){
			$this->model->db->createDB(GENERAL_DB_NAME, PHOTOS_DB_SCHEMA);

			$dbh = $this->model->db->connect(GENERAL_DB_NAME);
			
			$this->model->db->dropTable(METADATA_TABLE, $dbh);
			
			$this->model->db->createTable(METADATA_TABLE, $dbh, METADATA_TABLE_SCHEMA);

			foreach($filesList as $jsonFile){

				$details = array();
				//~ echo $jsonFile . "<br />";
				preg_match('/Photos\/(.*)\.json/',$jsonFile,$matches);
				
				$details['id'] = $matches[1];
				$jsonContents = file_get_contents($jsonFile);
				$details['description'] = json_decode($jsonContents);

				if(file_exists(PHY_VOL_URL . $details['id'])){ 

					$subFolderFilesList = glob(PHY_VOL_URL . $details['id'] . "/*.json");
					foreach($subFolderFilesList as $subJsonFile){
						$subDetails = array();
						$subJsonContents = file_get_contents($subJsonFile);

						preg_match('/Photos\/(.*)\/(.*)\.json/',$subJsonFile,$subMatches);
						$subDetails['id'] = $subMatches[2];
						$subDetails['description'] = json_decode($subJsonContents);
						$result = array_merge((array)$details['description'],(array)$subDetails['description']);
						$subDetails['description'] = json_encode($result,JSON_UNESCAPED_UNICODE);
						$this->model->db->insertPhotoData(METADATA_TABLE, $dbh, $subDetails);
					}
				}
				else{
					$details['description'] = json_encode($details['description'],JSON_UNESCAPED_UNICODE);			
					$this->model->db->insertPhotoData(METADATA_TABLE, $dbh, $details);			
				}
			}
		}
		else{
			$this->view('error/blah');			
		}
	}
}

?>
