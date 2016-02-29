<?php

class listing extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

		$this->albums();
	}

	public function albums() {

		$data = $this->model->listAlbums();
		($data) ? $this->view('listing/albums', $data) : $this->view('error/index');
	}
}

?>