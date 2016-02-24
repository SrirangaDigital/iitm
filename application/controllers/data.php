<?php

class data extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

		$this->insertMetadata();
	}

	public function insertMetadata($journal = DEFAULT_JOURNAL) {

		$metaData = $this->model->getMetadaData($journal);

		if ($metaData) {

			$this->model->db->createDB($journal, PHOTOS_DB_SCHEMA);

			$dbh = $this->model->db->connect($journal);
			
			$this->model->db->dropTable(METADATA_TABLE, $dbh);

			$this->model->db->createTable(METADATA_TABLE, $dbh, METADATA_TABLE_SCHEMA);

			$this->model->db->insertData(METADATA_TABLE, $dbh, $metaData);
		}
		else{

			$this->view('error/blah');
		}
	}
	
	public function insertFulltext($journal = DEFAULT_JOURNAL) {
		
		$this->model->db->createDB($journal, PHOTOS_DB_SCHEMA);
			
		$dbh = $this->model->db->connect($journal);

		$this->model->db->dropTable(FULLTEXT_TABLE, $dbh);

		$this->model->db->createTable(FULLTEXT_TABLE, $dbh, FULLTEXT_TABLE_SCHEMA);
		
		$this->model->getFulltextAndInsert($journal, $dbh);
		// Create Fulltext index
		$this->model->db->executeQuery($dbh, FULLTEXT_INDEX_SCHEMA);
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
				$handle = fopen($jsonFile, "r");
				//~ echo $jsonFile . "<br />";
				preg_match('/Photos\/(.*)\.json/',$jsonFile,$matches);
				$details['id'] = $matches[1];
				$jsonContents = fread($handle, filesize($jsonFile));
				$details['description'] = $jsonContents;
				$this->model->db->insertPhotoData(METADATA_TABLE, $dbh, $details);			
				fclose($handle);						
			}
		}
		else{
			$this->view('error/blah');			
		}
		 
	}

	public function insertDetails($type = 'fellow') {

		// Fellow Details are fetched from CSV ('|' separated)

		$method = ($type == 'fellow') ? 'getFellowDetailsfromCSV' : 'getAssociateDetails';
		$details = $this->model->$method();

		if ($details) {

			$this->model->db->createDB(GENERAL_DB_NAME, PHOTOS_DB_SCHEMA);

			$dbh = $this->model->db->connect(GENERAL_DB_NAME);
			
			$this->model->db->dropTable(constant(strtoupper($type) . '_TABLE'), $dbh);
			
			$this->model->db->createTable(constant(strtoupper($type) . '_TABLE'), $dbh, constant(strtoupper($type) . '_TABLE_SCHEMA'));

			$this->model->db->insertData(constant(strtoupper($type) . '_TABLE'), $dbh, $details);
		}
		else{

			$this->view('error/blah');
		}
	}

	public function updateMetaData($path) {

		$metaDataFromXML = $this->model->getMetadaDataFromXML($path);


		if($metaDataFromXML) {

			$journal = (string) $metaDataFromXML['journal'];

			$dbh = $this->model->db->connect($journal);

			if(preg_match('/forthcoming/', $path)) {

				$table = 'FORTHCOMING_TABLE';
				// $this->model->db->dropTable(constant($table), $dbh);
				// $this->model->db->createTable(constant($table), $dbh, constant($table . '_SCHEMA'));
			}
			else{

				$table = 'METADATA_TABLE';
			}

			$this->model->db->updateData(constant($table), $dbh, $metaDataFromXML);
		}	
		else {
			
			$this->view('error/blah');			
		}
	}

	public function updateAll() {

		$repo = Git::open('/var/www/html/ias/.git');

		$lines = preg_split("/\n/", (string) $repo->status());
		$files = array();

		foreach ($lines as $line) {
			
			if(preg_match('/modified.*?Volumes.*?\.xml/', $line)) {

				$path = preg_replace('/.*modified:   public\/Volumes\/(.*)\.xml/', "$1", $line);
				$this->updateMetaData($path);
				echo 'Updated: ' . $line . "\n";
			}
			elseif(preg_match('/.*?Volumes.*?\.xml/', $line)) {

				$path = preg_replace('/.*?Volumes\/(.*)\.xml/', "$1", $line);
				$this->updateMetaData($path);
				echo 'Inserted: ' . $line . "\n";	
			}
		}
	}

	public function insertForthcoming($journal = DEFAULT_JOURNAL) {

		$forthcomingPath = PHY_VOL_URL . $journal . '/forthcoming';

		$dbh = $this->model->db->connect($journal);
		$this->model->db->dropTable(FORTHCOMING_TABLE, $dbh);
		$this->model->db->createTable(FORTHCOMING_TABLE, $dbh, FORTHCOMING_TABLE_SCHEMA);
	

		foreach(glob($forthcomingPath.'/*.xml') as $file) {

			$path = str_replace(PHY_VOL_URL, '', $file);
			$path = str_replace('.xml', '', $path);
	
			$metaDataFromXML = $this->model->getMetadaDataFromXML($path);
		 
		    if($metaDataFromXML) {

				$dbh = $this->model->db->connect($journal);
				$this->model->db->updateData(FORTHCOMING_TABLE, $dbh, $metaDataFromXML);
			}	
			else {
				
				$this->view('error/blah');
			}
		}
	}
}

?>
