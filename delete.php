<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taghreedlouz_book";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM book WHERE id=$id ";
    $result = $conn->query($sql);
    if (!$result) {
        header("location:/myLibrary/index.php");
        exit;
    }
    header("location:/myLibrary/index.php");
    $conn->close();
    exit;
}
