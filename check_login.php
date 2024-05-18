<?php
session_start();
if (!isset($_SESSION['userName'])) {
    echo '<script>alert("Please log in first before browsing the page."); window.location.href = "newlogin-signup.php";</script>';
    exit();
}

