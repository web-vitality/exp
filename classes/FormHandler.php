<?php

require_once '_bootstrap.php';

class FormHandler{

    private Post $post_model;
    private User $users_model;

    public function __construct() {
        $this->users_model = new User();
        $this->post_model = new Post();

        $this->formHandler($_POST);
    }

    private function formHandler(array $form_data){

        $name = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
        $name = trim($name);
        $email = filter_input(INPUT_POST, 'userEmail', FILTER_VALIDATE_EMAIL);
        $email = trim($email);
        
        $user_id = $this->users_model->create($name, $email);
        
        $title = filter_input(INPUT_POST, 'postTitle', FILTER_SANITIZE_STRING);
        $title = trim($title);
        $body = filter_input(INPUT_POST, 'postBody', FILTER_SANITIZE_STRING);
        $body = trim($body);

        $this->post_model->create($user_id, $title, $body);

        header('Location:/');
    }

}
