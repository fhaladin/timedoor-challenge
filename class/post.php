<?php
    require('config/database.php');
    
    class Post 
    {
        private $db;

        public function __construct($database){
            $this->db = $database;
        }

        public function list(){
            $sql = 'SELECT * FROM posts ORDER BY id DESC';
            $query = $this->db->query($sql);
            return $query;
        }

        public function store($post){
            $title = $_POST['title'];
            $body = $_POST['body'];
            
            $titleValidation = $this->validation($title, 'title', 10, 32);
            $bodyValidation = $this->validation($body, 'body', 10, 200);
            
            $store = ($titleValidation['success'] && $bodyValidation['success']) ? true : false ;

            if ($store) {
                $sql = "INSERT INTO posts (title, body) VALUES('$title', '$body')";
                $query = $this->db->query($sql);
            }

            echo $titleValidation['value'] . $bodyValidation['value'];
        }

        public function validation($string, $name, $min, $max){
            $value = '';
            $success = true;

            if ($string === '') {
                $value .= "Your " . $name . " can't be null <br>";
                $success = false;
            }else{
                if (strlen($string) < $min || strlen($string) > $max) {
                    $value .= 'Your ' . $name . ' must be ' . $min . ' to ' . $max . ' characters long <br>';
                    $success = false;
                }
            }

            return array('success' => $success, 'value' => $value);
        }
    }
?>