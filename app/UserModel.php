<?php
    // require_once "framework/Model.php";
    class UserModel extends Model {
        // Create a user
        public function registerUser($email, $username, $password) {
            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

            echo $email;
            
            $sql = "INSERT INTO users(email, username, password) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("sss", $email, $username, $passwordHashed);
            return $stmt->execute();
        }

        public function loginUser($email, $password) {
            $sql = "SELECT user_id, password FROM users WHERE email = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            //echo json_encode($stmt->get_result());

            $stmt->bind_result($userid, $passwordHash);
            if ($stmt->fetch()) {
                if (password_verify($password, $passwordHash)) {
                    return $userid;
                }
            }

            return false;
        }
    }
?>