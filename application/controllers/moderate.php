<?php


class moderate extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

	}

	public function listItems() {

		if(isset($_SESSION['login']) && ($_SESSION['email'] == ADMIN_EMAIL)){		
	
			$data = $this->model->listPhotos();
			$this->view('moderate/listItems', $data);
		}
		else
		{
			$this->redirect('user/login');
		}
	}	

	public function verifydetails($id,$moderationid){

			$data = $this->model->getModifedDetails($id,$moderationid);
			$data["original"] = $this->model->getJsonFor($id);
			($data) ? $this->view('moderate/showDifference', $data) : $this->view('error/index');
	}

	public function discard($id,$moderationid){

		$dbh = $this->model->db->connect(DB_NAME);
		$data = array();
		$data["id"] = $id;
		$this->model->db->deleteDataFromModeration($id,$moderationid,$dbh);
		$message = $this->model->bindVariablesToString(MDR_DISCARD_MSG,$data);
		//do we need to send an email to a person who modified the details?
		//decision has to be taken
		($data) ? $this->view('moderate/discard', $message) : $this->view('error/index');
	}

}

?>