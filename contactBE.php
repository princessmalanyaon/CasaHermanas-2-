<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Database connection
    require_once "Connection1.php"; // Ensure this file contains your database connection script

    try {
        // Insert the contact data into the database
        $query = "INSERT INTO contact (name, email, subject, message) VALUES (:name, :email, :subject, :message)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":subject", $subject);
        $stmt->bindParam(":message", $message);
        $stmt->execute();

        // Redirect back to index.php after successful submission
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $conn = null;
    }
} else {
    header("Location: contact.html"); // Redirect back to the form if not accessed via POST
    exit();
}

