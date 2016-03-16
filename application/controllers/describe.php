<?php

class describe extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

		$this->photo();
	}

	public function photo($albumID = DEFAULT_ALBUM, $id = '') {

		$data = $this->model->getPhotoDetails($albumID, $id);

		($data) ? $this->view('describe/photo', $data) : $this->view('error/index');
	}

	public function nextPhoto($albumID=DEFAULT_ALBUM,$id = ''){
		$data = $this->model->getNextPhoto($albumID,$id);
		($data) ? $this->view('describe/photo', $data) : $this->view('error/index');		
	}	

	public function prevPhoto($albumID=DEFAULT_ALBUM,$id = ''){
		$data = $this->model->getPrevPhoto($albumID,$id);
		($data) ? $this->view('describe/photo', $data) : $this->view('error/index');		
	}

}

?>