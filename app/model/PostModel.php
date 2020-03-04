<?php
    class PostModel extends Database
    {
        protected $table;

        public function __construct(){
            Parent::__construct();
            $this->table = 'posts';
        }
    }
?>