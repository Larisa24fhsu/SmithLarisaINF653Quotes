<?php
    class Database {
        private $host = 'localhost';
        private $port = '5432';
        private $db_name = 'quotesdb';
        private $username = 'postgres';
        private $password = 'abc';
        private $conn;

        public function connect(){
            $this->conn = null;
            $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->db_name}";
            
            try{
                //Connect to MySQL
                $this->conn = new PDO($dsn, $this->username, $this->password);
                
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch(PDOException $e){
                echo 'Connection Error: '.$e->getMessage();
            }

            return $this->conn;

        }
    }