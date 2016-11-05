<?php

class data extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

		$this->insertPhotoDetails();
	}

	public function insertDetails(){

		$this->model->db->createDB(DB_NAME, DB_SCHEMA);
		$dbh = $this->model->db->connect(DB_NAME);

		$this->model->db->dropTable(METADATA_TABLE_L1, $dbh);
		$this->model->db->createTable(METADATA_TABLE_L1, $dbh, METADATA_TABLE_L1_SCHEMA);

		$this->model->db->dropTable(METADATA_TABLE_L2, $dbh);
		$this->model->db->createTable(METADATA_TABLE_L2, $dbh, METADATA_TABLE_L2_SCHEMA);

		$this->model->db->createTable(METADATA_TABLE_L3, $dbh, METADATA_TABLE_L3_SCHEMA);
		$this->model->db->createTable(METADATA_TABLE_L4, $dbh, METADATA_TABLE_L4_SCHEMA);
		
		//List albums
		$albums = $this->model->listFiles(PHY_PHOTO_URL, 'json');
		if($albums) {

			$this->model->insertAlbums($albums, $dbh);

			foreach ($albums as $album) {
			
				// List photos
				$photos = $this->model->listFiles(str_replace('.json', '/', $album), 'json');
			
				if($photos) {

					$this->model->insertPhotos($photos, $dbh);
				}
				else{

					echo 'Album ' . $album . ' does not have any photos' . "\n";
				}
			}
		}
		else{

			echo 'No albums to insert';
		}

		$dbh = null;
	}

	public function insertModifiedJson($type=''){

		$formdata = $this->model->getPostData();

		$description = array();
		$data = array();
		
		foreach($formdata as $value){

			$description[$value[0]] = $value[1];
		}

		if($type == 'photo'){

			$data['id'] = $description['albumID'] . "__" . $description['id'];
			unset($description['albumID']);
		}
		else{

			$data['id'] = $description['albumID'];			
		}
		$data['type'] = $type;
		$data['description'] = json_encode($description,true);
		$data['timestamp'] = date("Y-m-d H:i:s",time());
		$data['email'] = $_SESSION['email'];

		$dbh = $this->model->db->connect(DB_NAME);
		$this->model->db->createTable(METADATA_TABLE_L5, $dbh, METADATA_TABLE_L5_SCHEMA);
		$this->model->db->insertData(METADATA_TABLE_L5, $dbh, $data);

		$isSent = $this->model->sendLetterToPostman($_SESSION['name'], $_SESSION['email'], ADMIN_NAME, ADMIN_EMAIL, JSN_UPDATE_SUB, JSN_UPDATE_MSG, JSN_UPDATE_SUCCESS_MSG, JSN_UPDATE_ERROR_MSG);

		if ($isSent) {
	
			$this->view('data/updatecompleted', JSN_UPDATE_SUCCESS_MSG, '');
		}
		else{

			$this->view('error/blah');
		}


	}

	public function updateJson($albumID,$moderationid) {
		
		$data = $this->model->getPostData();
		$fileContents = array();
		$_SESSION['statusMsg'] = array();

		foreach($data as $value){

			$fileContents[$value[0]] = $value[1];
		}

		$photoID = $fileContents['id'];

		$path = PHY_PHOTO_URL . $albumID . "/" . $fileContents['id'] . ".json";

		// $photoUrl = BASE_URL . 'describe/photo/' . $albumID . "/" . $albumID . "__" . $fileContents['id'];

		$fileContents = json_encode($fileContents,JSON_UNESCAPED_UNICODE);

		if(file_put_contents($path,$fileContents))
		{
			array_push($_SESSION['statusMsg'],"Modified data written to Json " . $albumID . "/" . $photoID . ".json" . " file");
			// echo "Photo data is updated<br />";
			$this->updatePhotoDetails($photoID,$albumID,$moderationid,$fileContents);

			// echo "Database is updated";
			// echo '<p><a href="'. $photoUrl .'">Click here to see the updated photo details</a></p>';
			// $this->updateRepo();
		}
		else
		{
			$this->view('data/writeerror', JSN_WRITE_ERROR, '');
		}
		
	}

	private function updatePhotoDetails($photoID,$albumID,$moderationid,$photoJsonData){

			$dbh = $this->model->db->connect(DB_NAME);
			$albumDescription = $this->model->getAlbumDetails($albumID);
			$albumDescription = $albumDescription->description;
			$photoDescription = $photoJsonData;

			$combinedDescription = json_encode(array_merge(json_decode($photoDescription, true), json_decode($albumDescription, true)));

			$photoID = $albumID . "__" . $photoID;

			$this->model->db->updatePhotoDescription($photoID,$albumID,$combinedDescription,$dbh);

			array_push($_SESSION['statusMsg'],"Photo data is updated in the database");

			$this->model->db->deleteDataFromModeration($photoID,$moderationid,$dbh);

			array_push($_SESSION['statusMsg'],"Photo data is deleted from Moderation table");

			//mail has to be sent to a person who has done changes to this JSON
			//saying changes has been accepted and he can see it.
			//array_push($_SESSION['statusMsg'],"Mail has been sent to contributor");

			//Updating a repository
			//array_push($_SESSION['statusMsg'],"Changes have been updated in github");

			$this->view('data/taskCompleted', $_SESSION['statusMsg'], '');
	}

	public function updateAlbumJson($albumID,$moderationid) {
		
		$data = $this->model->getPostData();

		$fileContents = array();
		$_SESSION['statusMsg'] = array();

		foreach($data as $value){

			$fileContents[$value[0]] = $value[1];
		}

		$albumID = $fileContents['albumID'];

		$path = PHY_PHOTO_URL . $albumID . ".json";

		// $albumUrl = BASE_URL . 'listing/photos/' . $fileContents['albumID'];

		$fileContents = json_encode($fileContents,JSON_UNESCAPED_UNICODE);


		if(file_put_contents($path,$fileContents))
		{

			array_push($_SESSION['statusMsg'],"Modified data written to Json " . $albumID . ".json" . " file");
			$this->updateAlbumDetails($albumID,$moderationid,$fileContents);
			// $this->updateRepo();
		}
		else
		{
			$this->view('data/writeerror', JSN_WRITE_ERROR, '');
		}

	}

	private function updateAlbumDetails($albumID,$moderationid,$albumJsonData){

			$dbh = $this->model->db->connect(DB_NAME);
			$albumDescription = $albumJsonData;

			$this->model->db->updateAlbumDescription($albumID,$albumDescription,$dbh);

			array_push($_SESSION['statusMsg'],"Album data is updated in the database");

			//for each photo in albumID, update  description for each photo present in
			//that album.

			$this->model->updateDetailsForEachPhoto($albumID,$albumDescription,$dbh);

			array_push($_SESSION['statusMsg'],"Description for each photo in an Album is updated");


			$this->model->db->deleteDataFromModeration($albumID,$moderationid,$dbh);

			array_push($_SESSION['statusMsg'],"Album data is deleted from Moderation table");

			//mail has to be sent to a person who has done changes to this JSON
			//saying changes has been accepted and he can see it.
			//array_push($_SESSION['statusMsg'],"Mail has been sent to contributor");

			//Updating a repository
			//array_push($_SESSION['statusMsg'],"Changes have been updated in github");

			$this->view('data/taskCompleted', $_SESSION['statusMsg'], '');
	}

	private function updateRepo(){

		$statusMsg = array();

		$repo = Git::open(PHY_BASE_URL . '.git');

		// Before all operations, a git pull is done to sync local and remote repos.
		$repo->run('pull ' . GIT_REMOTE . ' master');
		array_push($statusMsg, 'Repo synced with remote');

		$files = $this->model->getChangesFromGit($repo);
		array_push($statusMsg, 'Files to be updated listed');

		$user['email'] = $_SESSION['email'];
		$user['password'] = $_SESSION['password'];
		$split = explode('@', $_SESSION['email']);
		$user['name'] = $split[0];

		if($files['A']){ 
				$this->model->gitProcess($repo, $files['A'], 'add', GIT_ADD_MSG, $user);
				array_push($statusMsg, ' Addition of JSON for Albums and Photos are completed');
		}	
		if($files['M']){ 
				$this->model->gitProcess($repo, $files['M'], 'add', GIT_MOD_MSG, $user);
				array_push($statusMsg, ' Modification of JSON for Albums and Photos are completed');
		}		
		if($files['D']){ 
				$this->model->gitProcess($repo, $files['D'], 'rm', GIT_DEL_MSG, $user);
				array_push($statusMsg, ' Deleted of JSON for Albums / Photos are completed');
		}	
		
		$repo->run('push ' . GIT_REMOTE . ' master');
		
		array_push($statusMsg, 'Local changes pushed to remote');

		$this->view('data/taskCompleted', $statusMsg, '');
	}

	public function sumne($albumID){

		$this->model->updateDetailsForEachPhoto($albumID,$albumDescription,$dbh);
	}

}

?>
