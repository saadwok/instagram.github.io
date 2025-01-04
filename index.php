<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'login') {
        // Process login
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Debug output (replace with actual login logic)
        echo json_encode([
            "status" => "success",
            "message" => "Login successful!",
            "email" => htmlspecialchars($email),
        ]);
        exit;
    } elseif (isset($_POST['action']) && $_POST['action'] == 'change_password') {
        // Process password change
        $new_password = $_POST['new_password'];
        $retype_password = $_POST['retype_password'];

        if ($new_password === $retype_password) {
            echo json_encode([
                "status" => "success",
                "message" => "Password changed successfully!",
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Passwords do not match!",
            ]);
        }
        exit;
    }
}
?>
