<?php
    class TaskModel extends Model {
        public function createTask($title, $description, $employee, $manager, $duedate) {
            $sql = "INSERT INTO tasks (title, description, status, assigned_to, created_by, due_date) VALUES (?, ?, \"Pending\", ?, ?, ?);";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("ssiis", $title, $description, $employee, $manager, $duedate);
            return $stmt->execute();

        }

        public function getAllTasks() {
            $sql = "SELECT title, description, status, assigned_to, created_by, due_date FROM tasks";
            $result = $this->db->query($sql);

            $tasks = [];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $tasks[] = $row;
                }
            }

            return $tasks;
        }

        public function getStatuses() {
            $query = "SHOW COLUMNS FROM tasks LIKE 'status'";
            $result = $this->db->query($query);

            // Fetch result as an associative array
            if ($row = $result->fetch_assoc()) {
                // Get the column type (ENUM definition)
                $enum_values = $row['Type']; // Example: enum('active','inactive','suspended')

                // Parse the ENUM values
                $enum_values = str_replace("enum('", "", $enum_values);
                $enum_values = str_replace("')", "", $enum_values);
                $enum_array = explode("','", $enum_values);
                
                // Output the array
                return $enum_array;
            }

            return [];
        }

        public function getTasksByEmployee($emp_id) {
            $sql = "SELECT task_id, title, description, status, assigned_to, created_by, due_date FROM tasks WHERE assigned_to = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("i", $emp_id);
            $stmt->execute();

            $result = $stmt->get_result();

            $tasks = [];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $tasks[] = $row;
                }
            }

            return $tasks;
        }

        public function updateTask($userID, $task_id, $status) {
            $sql = "UPDATE tasks SET status = ? WHERE task_id = ? AND assigned_to = ?;";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("sii", $status, $task_id, $userID);
            return $stmt->execute();
        }

        public function countTasks() {
            $sql = "SELECT COUNT(*) as total FROM tasks";
            $result = $this->db->query($sql);

            $row = $result->fetch_assoc();

            return $row["total"];
        }

        public function countTasksByStatus($status) {
            $sql = "SELECT COUNT(*) as total FROM tasks WHERE status = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("s", $status);
            $stmt->execute();

            $result = $stmt->get_result();

            $row = $result->fetch_assoc();

            return $row["total"];
        }
    }
?>