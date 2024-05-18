<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
$Name = $_POST["Name"];
$Email = $_POST["Email"];
$Password = $_POST["Password"];
$Address = $_POST["Address"];
$Barangay = $_POST["Barangay"];
$City = $_POST["City"];
$Province = $_POST["Province"];

    // Check if any of the form fields are empty
    if(empty($Name) || empty($Email) || empty($Password) || empty($Address) || empty($Barangay) || empty($City) || empty($Province)) {
        echo '<script>alert("Fill all fields");</script>';
        echo '<script>window.history.back();</script>';
        exit(); // Stop further execution of the code
    }

try{
    //Links to Connection.php
    require_once "Connection1.php";
    $query = "INSERT INTO user_account(Name, Email, Password, Address, Barangay, City, Province) values
    (:Name, :Email, :Password, :Address, :Barangay, :City, :Province);";

    $stmt = $conn->prepare($query);

    $option = [
        'cost' => 12
    ];

    $stmt->bindParam(":Name", $Name);
    $stmt->bindParam(":Email", $Email);
    $stmt->bindParam(":Password", $Password);
    $stmt->bindParam(":Address", $Address);
    $stmt->bindParam(":Barangay", $Barangay);
    $stmt->bindParam(":City", $City);
    $stmt->bindParam(":Province", $Province);
    $stmt->execute();

    $conn = null;
    $stmt = null;
    header("Location: http://127.0.0.1/CasaHermanasBackend/newlogin-signup.php");
    die();
}

catch(PDOException $e){
    die("Query Failed: " . $e->getMessage());
}

}else{
    header("Location: .../newlogin-signup.php");
}