<?php
    class Validator {
        // Private Helper Functions
        private function passwordEntropy($password) {
            $bytes = strlen($password);
            $count = 0;

            for ($i = 0; $i < $bytes; $i++) {
                if ($i == 1) {
                    $count += 4;
                }

                if (($i >= 2) && ($i <= 7)) {
                    $count += 2;
                }

                if (($i >= 8) && ($i <= 12)) {
                    $count += 1.5;
                }

                if ($i >= 13) {
                    $count += 1;
                }
            }

            if ((preg_match('/[A-Z]/', $password)) && (preg_match('/[a-z]/', $password)) && (preg_match('/[^a-zA-Z0-9]/', $password))) {
                $count += rand(1,6);
            }

            return $count;
        }

        private function passwordStrength($password) {
            if ($this->passwordEntropy($password) > 15) {
                return true;
            }

            return false;
        }

        private function checkExistingUser($email) {
            $userModel = new UserModel();

            if ($userModel->findUser($email)) {
                return true;
            }

            return false;
        }

        private function validEmail($email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return false;
            }

            return true;
        }

        // Public Validation Functions
        public function validateUser($email, $password) {
            $errors = [];
            $value = true;

            if ($this->checkExistingUser($email)) {
                $errors[] = 'Account already exists.';
                $value = false;
            }

            if (!($this->validEmail($email))) {
                $errors[] = 'Invalid email format.';
                $value = false;
            }

            if (!($this->passwordStrength($password))) {
                $errors[] = 'Password too weak. Must be at least 8 characters, mixed case, and contain numbers and special characters.';
                $value = false;
            }

            return ['value' => $value, 'errors' => $errors];
        }

        public function validateLogin($email, $password) {
            $errors = [];
            $value = true;

            if (!($this->validEmail($email))) {
                $errors[] = 'Invalid email format.';
                $value = false;
            }

            return ['value' => $value, 'errors' => $errors];
        }

        public function validateTask($title, $date) {
            $errors = [];
            $value = true;

            $today = new DateTime();
            $input_date = new DateTime($date);

            if (strlen($title) > 20) {
                $errors[] = 'Title is too long. Make it shorter than 20 characters.';
                $value = false;
            }

            if ($input_date < $today){
                $errors[] = 'Date is in the past.';
                $value = false;
            }

            return ['value' => $value, 'errors' => $errors];
        }
    }
?>