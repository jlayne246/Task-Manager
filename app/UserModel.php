<?php
    // require_once "framework/Model.php";
    class UserModel extends Model {
        private $userid;
        private $email;
        private $password; 
        private $username;

        // Create a user from register
        public function registerUser($email, $username, $password) {
            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

            echo $email;
            
            $sql = "INSERT INTO users(email, username, password) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("sss", $email, $username, $passwordHashed);
            return $stmt->execute();
        }

        // Create a user from admin
        public function createUser($email, $username) {
            $passwordHashed = password_hash("temp", PASSWORD_DEFAULT);

            $sql1 = "INSERT INTO users(email, username, password) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql1);
            $stmt->bind_param("sss", $email, $username, $passwordHashed);

            return $stmt->execute();
        }

        // Update a user role
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

        public function getAllEmployees() {
            $sql = "SELECT users.user_id, users.username FROM users INNER JOIN userrole ON users.user_id = userrole.user_id WHERE userrole.role_id = 3;";
            $result = $this->db->query($sql);

            $employees = [];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $employees[] = $row;
                }
            }

            return $employees;
        }

        public function deleteUser($id) {
            // Delete from userrole table
            $sql1 = "DELETE FROM userrole WHERE user_id = ?";
            $stmt1 = $this->db->prepare($sql1);
            $stmt1->bind_param("i", $id);
            $stmt1->execute();
        
            // Delete from users table
            $sql2 = "DELETE FROM users WHERE user_id = ?";
            $stmt2 = $this->db->prepare($sql2);
            $stmt2->bind_param("i", $id);
            $result = $stmt2->execute();
        
            return $result;
        }
    }
?>