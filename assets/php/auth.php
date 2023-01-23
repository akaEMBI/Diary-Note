<?php 
    require_once 'config.php';

    class Auth extends Database{

        //Register New User
        public function register($name, $email, $password){
            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :pass)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['name'=>$name, 'email'=>$email, 'pass'=>$password]);
            return true;
        }

        //Check if user already registered
        public function user_exist($email){
            $sql = "SELECT email FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        //Login Existing User
        public function login($email){
            $sql = "SELECT email, password FROM users WHERE email = :email AND deleted != 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        //Current User In Session
        public function currentUser($email){
            $sql = "SELECT * FROM users WHERE email = :email AND deleted != 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        //Forgot Password
        public function forgot_password($token,$email){
            $sql = "UPDATE users SET token = :token, token_expire = DATE_ADD(NOW(),INTERVAL 10 MINUTE) WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['token'=>$token,'email'=>$email]);

            return true;
        }

        //Add New Note
        public function add_new_note($uid, $title, $note){
            $sql = "INSERT INTO notes (uid, title, note) VALUE (:uid, :title, :note)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['uid'=>$uid, 'title'=>$title, 'note'=>$note]);
            return true;
        }

        //Fetch All Note Of An User
        public function get_notes($uid){
            $sql = "SELECT * FROM notes WHERE uid = :uid";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['uid'=>$uid]);

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>