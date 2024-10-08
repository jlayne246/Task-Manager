<?php
    class UserRoleModel extends Model {
        private $userid;
        private $roleid;
        private $roles = [];
        // private $model = new Model();

        public function assignRole($email, $role) {
            $this->getRoles();
            // print(array_search($role, $this->roles));

            $userRole = array_search($role, $this->roles);
            $userid = $this->retrieveUserID($email);

            $sql = "INSERT INTO userrole(user_id, role_id) VALUES (?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("ii", $userid, $userRole);
            return $stmt->execute();
        }

        public function retrieveUserID($email) {
            $sql = "SELECT user_id FROM users WHERE email = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $stmt->bind_result($userid);
            $stmt->fetch();
            // print($userid . " | " . $email);
            return $userid;
        }

        public function retrieveUserRole($userid) {
            $this->getRoles();

            $sql = "SELECT role_id FROM userrole WHERE user_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("i", $userid);
            $stmt->execute();

            $stmt->bind_result($userRoleID);
            $stmt->fetch();
            $role = $this->roles[$userRoleID];
            // echo $role;
            return $role;
        }

        public function getRoles() {
            $sql = "SELECT role, role_id FROM roles";
            $stmt = $this->db->query($sql);

            //echo json_encode($stmt->get_result());

            if ($stmt->num_rows > 0) {
                while ($row = $stmt->fetch_assoc()) {
                    $key = $row['role_id'];
                    $value = $row['role'];
                    $this->roles[$key] = $value;
                }
            } else {
                echo "No records found.";
            }
        }

        public function returnRolesArray() {
            $this->getRoles();
            return $this->roles;
        }
    }
?>