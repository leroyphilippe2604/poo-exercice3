<?php
    class user {
        private $id, $email, $password;
        public  $username, $connected;

        public function newUser($pdo, $email, $password, $username, $connected){
            $username = filter_var($username, FILTER_SANITIZE_STRING);
            $password = filter_var($password, FILTER_SANITIZE_STRING);

            if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            } else{
                echo "Veuillez rentre une adresse e-mail valide";
            }

            if (filter_var($connected, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)){
                $connected = filter_var($connected, FILTER_SANITIZE_STRING);
            } else {
                echo "Ceci n est pas un boolean";
            }

            $sql = $pdo->prepare("INSERT INTO people (username, password, email, connected) VALUES (?,?,?,?)");
            $sql-> execute(array($username, $password, $email, $connected));
            $sql-> closerCursor();
        }
    }
?>