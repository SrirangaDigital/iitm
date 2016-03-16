<?php

class mail extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {
		
		$this->send();
	}

	public function send() {
		
		$data = $this->model->getPostData();
		var_dump($data);
		// ($data) ? $this->postman($data) : $this->redirect('page/flat/About_IASc/Feedback_form/');
	}

	public function postman($data) {

		$mail = new PHPMailer();

		$mail->isMail();
		$mail->setFrom($data['email'], "Anonymous");
		$mail->addReplyTo($data['email'], "Anonymous");
		$mail->addAddress(SERVICE_EMAIL, SERVICE_NAME);
		$mail->Subject = FB_SUBJECT_PREFIX . $data['subject'];
		$mail->Body = $data['message'];

		if($mail->send()) {

			$this->view('page/prompt', array('msg' => FB_SUCCESS_MSG));
		}
		else {

			$this->view('error/prompt', array('msg' => FB_FAILURE_MSG));
		}
	}
}

?>