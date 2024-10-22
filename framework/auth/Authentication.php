<?php
class Authentication {
    // Simulate a logged-in user and their role (in a real-world app, this would come from a session or token)
    private $userRole = null;
    private $isAuthenticated = false;
    private $isLoggedIn = false;

    // Method to simulate user login (set authentication status and role)
    public function login($role) {
        $this->isAuthenticated = true;
        $this->isLoggedIn = true;
        $this->userRole = $role;
    }

    // Method to simulate user logout
    public function logout() {
        $this->isAuthenticated = false;
        $this->isLoggedIn = false;
        $this->userRole = null;
    }

    // Check if the user is authenticated
    public function checkAuthentication() {
        return $this->isAuthenticated;
    }

    public function checkLoginStatus() {
        return $this->isLoggedIn;
    }

    // Get the role of the authenticated user
    public function getUserRole() {
        return $this->userRole;
    }

    // Check if the user has permission to access a route
    public function checkPermission($requiredRole) {
        // print_r($requiredRole . $this->userRole . $_SESSION['role'] . " Auth: " . $this->isAuthenticated);
        // If no specific role is required, allow access
        if (($requiredRole === null) || ($requiredRole === '')) {
            return true;
        }

        // Check if the user's role matches the required role
        // return $_SESSION['role'] === $requiredRole;
        return $this->userRole === $requiredRole;
    }
}

?>