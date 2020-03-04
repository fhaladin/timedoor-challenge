<?php
    class Database
    {
        protected $db;

        public function __construct(){
            $this->db = mysqli_connect(DATABASE_HOSTNAME, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);

            if (mysqli_connect_errno()){
                echo 'Failed to connect database : ' . mysqli_connect_error();
            }

            date_default_timezone_set("Asia/Bangkok");
        }

        function show(){
            $sql = "SELECT * FROM $this->table ORDER BY id DESC";
            $query = $this->db->query($sql);

            while ($fetch_query = mysqli_fetch_object($query)) { 
                $data[] = $fetch_query;
            }

            return $data;
        }
        
        function store($data){
            $columns = implode(', ', array_keys($data));
            $values = "'" . implode("', '", array_values($data)) . "'";

            $sql = "INSERT INTO $this->table ($columns) VALUES($values)";
            $query = $this->db->query($sql);

            return $query;
        }
    }
?>