<?php
class Link extends Controller {
    public function create() {
        $data = [];
        $link = $this->model('Library');

        $isValid = $link->validLinkForm();
        if($isValid == "Все добре") {
            $link->addLink();
        }
        else {
            $data['message'] = $isValid;
        }

        $this->view('library/links', $data);
    }

    public function delete($id) {
        $link = $this->model('Library');
        $link->deleteLink($id);
        $this->view('library/links');
    }
}
