<?php
    class Model {
        protected $db;

        public function __construct() {
            $this->db = new mysqli(getenv("DB_HOST"), getenv("DB_USER"), getenv("DB_PASS"), getenv("DB_NAME"));

            if ($this->db->connect_error) {
                die("Connection failed: " . $this->db->connect_error);
            }
        }
    }
?>