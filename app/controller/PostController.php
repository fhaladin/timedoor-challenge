<?php
    class PostController
    {
        private $post_model;
        private $rules;

        public function __construct(){
            $_SESSION['error_message'] = '';

            $this->post_model = new PostModel;
            $this->rules = array(
                'title' => array('min' => 10, 'max' => 32),
                'body'  => array('min' => 10, 'max' => 200)
            );
        }

        public function show(){
            return $this->post_model->show();
        }

        public function store(){         
            if ($this->validation($this->rules)) {
                $this->post_model->store(array(
                    'title' => $_POST['title'],
                    'body'  => $_POST['body']
                ));
            }

            return header('index.php');
        }

        public function validation($rules){
            foreach ($rules as $name => $rule) {
                if (empty($_POST[$name])) {
                    $_SESSION['error_message'] .= 'Your ' . $name . " can't be null <br>";
                } else {
                    if (strlen($_POST[$name]) < $rule['min'] || strlen($_POST[$name]) > $rule['max']) {
                        $_SESSION['error_message'] .= 'Your ' . $name . ' must be ' . $rule['min'] . ' to ' . $rule['max'] . ' characters long <br>';
                    }
                }
            }

            return (empty($_SESSION['error_message'])) ? true : false ;
        }

    }
?>