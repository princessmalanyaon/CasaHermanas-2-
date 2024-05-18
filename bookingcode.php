<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $checkin_date_time = $_POST["checkin"];
    $checkout_date_time = $_POST["checkout"];
    $adults = intval($_POST["adults"]);
    $children = intval($_POST["children"]);
    $selected_room = intval($_POST["room"]);
    $special_request = htmlspecialchars($_POST["message"]);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Convert and validate dates
    try {
        $checkinDateTime = new DateTime($checkin_date_time);
        $checkoutDateTime = new DateTime($checkout_date_time);
        $checkin_date_time = $checkinDateTime->format('Y-m-d H:i:s');
        $checkout_date_time = $checkoutDateTime->format('Y-m-d H:i:s');
    } catch (Exception $e) {
        die("Invalid date format: " . $e->getMessage());
    }

    // Database connection
    require_once "Connection1.php";

    try {
        // Insert the booking data into the database
        $query = "INSERT INTO booking (name, email, checkin_date_time, checkout_date_time, adults, children, selected_room, special_request) VALUES (:name, :email, :checkin_date_time, :checkout_date_time, :adults, :children, :selected_room, :special_request)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":checkin_date_time", $checkin_date_time);
        $stmt->bindParam(":checkout_date_time", $checkout_date_time);
        $stmt->bindParam(":adults", $adults);
        $stmt->bindParam(":children", $children);
        $stmt->bindParam(":selected_room", $selected_room);
        $stmt->bindParam(":special_request", $special_request);
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
    header("Location: booking.html"); // Redirect back to the form if not accessed via POST
    exit();
}