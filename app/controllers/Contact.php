<?php
class Contact extends Controller {
    public function index() {

        $this->view("mail/feedback");
    }

    public function newFeedback() {
        $data = [];

        $feedback = $this->model('Feedback');
        $feedback->setData($_POST['name'], $_POST['email'], $_POST['text']);

        $isValid = $feedback->validFeedbackForm();
        if($isValid == "Все добре") {
            $feedback->sendMail();
        } else {
            $data['message'] = $isValid;
        }

        $this->view('mail/feedback', $data);
    }
}
