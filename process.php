<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $age = intval($_POST['age']);
    $bio = trim($_POST['bio']);
    $file = $_FILES['file'];

    // Validate inputs
    if (strlen($username) < 3 || strlen($bio) < 10) {
        die("Validation failed: Username or bio too short.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Validation failed: Invalid email format.");
    }

    if ($file['size'] > 1048576) { // 1MB
        die("Validation failed: File size exceeds 1MB.");
    }

    if (mime_content_type($file['tmp_name']) !== 'text/plain') {
        die("Validation failed: Invalid file type.");
    }

    // Read file content
    $fileContent = file_get_contents($file['tmp_name']);
    $fileLines = explode(PHP_EOL, $fileContent);

    // Get user agent
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    // Save data to session
    session_start();
    $_SESSION['data'] = compact('username', 'email', 'age', 'bio', 'fileLines', 'userAgent');

    // Redirect to result page
    header('Location: result.php');
    exit;
}
?>
