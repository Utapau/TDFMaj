<?php
    class Session
    {
        private $name;
        private $open;

        public function Session($name)
        {
            $this->name = $name;
            $this->open = false;
        }

        public function open()
        {
            if(!$this->isOpen())
            {
                session_name($this->name);
                session_start();
                $this->open = true;
            }
            else
            {
                // Print error
            }
        }

        public function close()
        {
            if($this->isOpen())
            {
                session_write_close();
                $this->open = false;
            }
            else
            {
                // Print error
            }
        }

        public function regenerate()
        {
            session_regenerate_id(true);
        }

        public function destroy()
        {
            if($this->isOpen())
            {
                session_destroy();

                $this->open = false;
            }
            else
            {
                // Print error
            }
        }

        public function isOpen()
        {
            return $this->open;
        }

        public function name()
        {
            return $this->name;
        }

        public function isEmpty($index = '')
        {
            if($index == '')
                return empty($_SESSION);
            else
                return isset($_SESSION[$index]);
        }

        public function saveVar($index, $var)
        {
            if($this->isOpen())
            {
                $_SESSION[$index] = $var;

                return $_SESSION[$index];
            }
            else
            {
                // Print error
            }
        }

        public function getVar($index)
        {
            if($this->isOpen() && $this->isEmpty($index))
            {
                return $_SESSION[$index];
            }
            else
            {
                // Print error
            }
        }

        public function display()
        {
            if($this->isOpen() && !$this->isEmpty())
            {
                foreach($_SESSION as $key => $value)
                {
                    echo $key . ' : ' . $value . '<br>';
                }
            }
            else
            {
                // Print error
            }
        }
    }
?>