<?php
// <!-- Not real index page! Only purpose is to ensure the right index page (inside of framework) is invoked! -->

// Define the subdirectory to redirect to
$subdirectory = "framework/"; 

// Perform the redirection
header("Location: " . $subdirectory);

// Ensure that the script stops after the redirect
exit();
?>
