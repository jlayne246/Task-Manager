<?php
    class CredValidator {
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

        public function passwordStrength($password) {
            if ($this->passwordEntropy($password) > 15) {
                return true;
            }

            return false;
        }
        public function validatePassword($password) {}
    }
?>