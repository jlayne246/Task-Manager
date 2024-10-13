<?php
    class CommentModel extends Model {
        public function createComment($userid, $taskid, $comment) {
            $sql = "INSERT INTO comments (user_id, task_id, comment) VALUES (?, ?, ?);";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("iis", $userid, $taskid, $comment);
            return $stmt->execute();
        }

        public function getComments($userid) {
            $sql = "SELECT * FROM comments WHERE user_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("i", $userid);
            $stmt->execute();

            $result = $stmt->get_result();

            $comments = [];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $task = $row['task_id'];
            
                    // Group by 'category_id'
                    if (!isset($comments[$task])) {
                        $comments[$task] = [];
                    }
                    
                    $comments[$task][] = $row;
                }
            }

            return $comments;
        }

        public function getCommentsByTask($task_id) {
            $sql = "SELECT * FROM comments WHERE task_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("i", $task_id);
            $stmt->execute();

            $result = $stmt->get_result();

            $comments = [];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $task = $row['task_id'];
            
                    // Group by 'category_id'
                    if (!isset($comments[$task])) {
                        $comments[$task] = [];
                    }
                    
                    $comments[$task][] = $row;
                }
            }

            return $comments;
        }
    }
?>