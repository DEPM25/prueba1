<?php
    class Database
    {
        private $server;
        private $dbname;
        private $user;
        private $password;

        public function __construct()
        {
            $this->server = 'localhost';
            $this->dbname = 'prueba';
            $this->user = 'depm';
            $this->password = '1234';
        }

        function connect()
        {
            try {
                $conex = "mysql:host=" . $this->server . ";dbname=" . $this->dbname;
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => FALSE,
                ];

                $pdo = new PDO($conex, $this->user, $this->password, $options);

                return $pdo;
            } catch (PDOException $e) {
                print_r('Error Connection: ' . $e->getMessage());
            }
        }
    }
    
?>