<?php
session_start(); // STARTS THE SESSION TO ALLOW USE OF SESSION VARIABLES

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email, password, and name are provided
    if (empty($_POST["Name"]) || empty($_POST["Email"]) || empty($_POST["Password"])) {
        // If any field is empty, alert the user and go back
        echo '<script> alert("Cannot have an Empty Fields");</script>';
        echo '<script>window.history.back();</script>';
        exit();
    }

    $Name = $_POST["Name"];
    $Email = trim($_POST["Email"]); // Trim leading and trailing spaces from email
    $Password = $_POST["Password"];

    try {
        // Connect to the database
        require_once "Connection1.php";

        // Prepare SQL query to fetch user details based on email, password, and name
        $query = "SELECT Name, Email, Password FROM user_account WHERE Email = :Email AND Password = :Password AND Name = :Name";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":Name", $Name);
        $stmt->bindParam(":Email", $Email);
        $stmt->bindParam(":Password", $Password);
        $stmt->execute();

        // Fetch user's details from the database
        $storedData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($storedData && $storedData['Name'] === $Name && $storedData['Email'] === $Email && $storedData['Password'] === $Password) {
            // EMAIL, PASSWORD, AND NAME MATCH, SET THE SESSION VARIABLE
            $_SESSION['userName'] = $Name; // STORE USER'S NAME IN THE SESSION

            // Redirect to the main page
            header("Location: http://127.0.0.1/CasaHermanasBackend/index.php");
            exit();
        } else {
            // Incorrect input, alert the user and go back
            echo '<script> alert("Incorrect Input or Input does not Exist");</script>';
            echo '<script>window.history.back();</script>';
            exit();
        }
    } catch (PDOException $e) {
        // Error handling
        die("Query Failed: " . $e->getMessage());
    }
} else {
    // Redirect if accessed directly
    header("Location: login-signup.php");
    exit();
}

