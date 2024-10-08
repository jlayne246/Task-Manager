<?php
    class TaskModel extends Model {
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
    }
?>