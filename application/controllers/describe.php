<?php

class describe extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

		$this->photo();
	}

	public function photo($albumID = DEFAULT_ALBUM, $id = '') {

		$data['albumDetails'] = $this->model->getAlbumDetails($albumID);
		$data['photoDetails'] = $this->model->getPhotoDetails($albumID, $id);

		($data) ? $this->view('describe/photo', $data) : $this->view('error/index');
	}
}

?>