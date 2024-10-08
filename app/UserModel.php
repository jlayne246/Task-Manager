<?php
    // require_once "framework/Model.php";
    class UserModel extends Model {
        private $userid;
        private $email;
        private $password; 
        private $username;

        // Create a user
        public function registerUser($email, $username, $password) {
            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

            echo $email;
            
            $sql = "INSERT INTO users(email, username, password) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("sss", $email, $username, $passwordHashed);
            return $stmt->execute();
        }

        // Create a user
        public function updateUser($userid, $role) {
            $positions = new UserRoleModel();
            $roles = $positions->returnRolesArray();

            $roleid = array_search($role, $roles);

            print($roleid);

            $sql = "UPDATE userrole SET role_id = ? WHERE user_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("ii", $roleid, $userid);
            return $stmt->execute();
        }

        // Find user based on email and password
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

        public function getAllUsers() {
            $sql = "SELECT users.user_id, users.username, userrole.role_id FROM users INNER JOIN userrole ON users.user_id = userrole.user_id;";
            $result = $this->db->query($sql);

            $users = [];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $users[] = $row;
                }
            }

            return $users;
        }
    }
?>