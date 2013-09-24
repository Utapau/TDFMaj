<?php
    /*
     * Connection class, used to connect to a oracle DB without using oci_functions 
     */
    class Connection
    {
        // Connection to the db
        private $connection;
        // Id used to connect
        private $id;
        // Password used to connect
        private $password;
        // Instance used to connect
        private $instance;
        // Current statement
        private $statement;
        // Connected or not
        private $connected;
        // Possible error
        private $error;

        // Constructor
        public function Connection($id, $password, $instance)
        {
            $this->id = $id;
            $this->password = $password;
            $this->instance = $instance;
        }

        // Connect to the db
        public function connect()
        {
            $this->connection = oci_connect($this->id, $this->password, $this->instance);

            if (!$this->connection) {
                $this->error = oci_error();
                $this->connected = false;
            }
            else
                $this->connected = true;
        }

        // To know if connection was done or not
        public function connected()
        {
            return $this->connected;
        }

        // Close the connection
        public function close()
        {
            oci_close($this->connection);
        }

        // Parse the given request
        public function parse($request)
        {
            $this->statement = oci_parse($this->connection, $request);
        }

        private function free()
        {
            oci_free_statement($this->statement);
        }

        // Execute the given request
        public function execute($request)
        {
            if($this->statement)
                $this->free();

            $this->parse($request);

            $res = oci_execute($this->statement);

            if(!$res)
            {
                $this->error = oci_error();
                echo $this->error['message'];
            }
        }

        public function fetch($param)
        {
            if($this->statement)
                return oci_fetch_array($this->statement, $param);
            else
                return false;
        }
    }

    function connect($id, $password, $instance)
    {
        $conn = new Connection($id, $password, $instance);

        $conn->connect();

        if($conn->connected())
        {
            return $conn;
        }
        else
        {
            display("Connection not established :'(");
            return false;
        }
    }

    function login()
    {
        if(isset($_COOKIE['logged']))
        {
            display("There is cookies !");

            $id = getCookie('id');
            $password = getCookie('password');
            $instance = getCookie('instance');

            return connect($id, $password, $instance);
        }
        else if(isset($_SESSION['id']))
        {
            display("There's no cookies :(");

            $id = $_SESSION['id'];
            $password = $_SESSION['password'];
            $instance= $_SESSION['instance'];

            return connect($id, $password, $instance);
        }
        else
            return false;
    }

    function logout()
    {
        deleteCookie('logged');
        deleteCookie('id');
        deleteCookie('password');
        deleteCookie('instance');

        session_unset();

        header("Location:index.php");
    }

    function connectMeFaggot()
    {
        if(isset($_COOKIE['logged']))
        {
            display("Oh yeah there is cookies. I love cookies");

            $_SESSION['logged'] = true;
            $_SESSION['id'] = $_COOKIE['id'];
            $_SESSION['password'] = $_COOKIE['password'];
            $_SESSION['instance'] = $_COOKIE['instance'];

            return true;
        }
        else if(isset($_POST['id']))
        {
            display("Oh, you posted infos. Then i'm gonna check this");

            $id = $_POST['id'];
            $password = $_POST['password'];
            $instance = $_POST['instance'];
            $remember = $_POST['remember'];

            $conn = new Connection($id, $password, $instance);

            $conn->connect();

            if($conn->connected())
            {
                display("Ok, connection is good, let's go!");

                $_SESSION['logged'] = true;
                $_SESSION['id'] = $id;
                $_SESSION['password'] = $password;
                $_SESSION['instance'] = $instance;

                if($remember)
                {
                    display("Imma gonna put some cookies just for you");

                    setcookie('logged', true);
                    setcookie('id', $id);
                    setcookie('password', $password);
                    setcookie('instance', $instance);
                }

                return true;
            }
            else
            {
                display("Connection failed :'( :'( :'(");
                return false;
            }
        }
        else
        {
            display("Nothing filled, noob");
            return false;
        }
    }
?>