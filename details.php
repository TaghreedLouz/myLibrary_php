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
$name = "";
$author = "";
$quantity = "";
$details = "";
$category = "";
$price = "";

$error_msg = "";
$success_msg = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {

    if (!isset($_GET['id'])) {

        header("location: /myLibrary/index.php");
        exit;
    }

    $id = $_GET["id"];
    //read from database
    $sql = "SELECT name,author,quantity,details,category,price FROM book WHERE id = $id ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /myLibrary/index.php");
        exit;
    }

    $name = $row['name'];
    $author = $row['author'];
    $quantity = $row['quantity'];
    $details = $row['details'];
    $category = $row['category'];
    $price = $row['price'];
} else {
    $id = $_GET["id"];
    $name = $_POST['name'];
    $author =  $_POST['author'];
    $quantity =  $_POST['quantity'];
    $details =  $_POST['details'];
    $category = $_POST['category'];
    $price =  $_POST['price'];


    do {
        if (empty($name) || empty($author) || empty($quantity) || empty($details) || empty($category) || empty($price)) {

            $error_msg = "all feild requierd ";
            break;
        }

        //Update
        $sql = "UPDATE  books " . "SET name ='$name' , author='$author' , quantity='$quantity' , details='$details', category='$category' , price='$price'   WHERE id ='$id' ";
        $result = $conn->query($sql);

        if (!$result) {
            $error_msg = "failed update ";
            break;
        }


        $success_msg = "updated successfuly";
        header("location:/myLibrary/index.php");
        $conn->close();
        exit;
    } while (false);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="bodycss" id="bodycss" style="background-color: rgb(226, 226, 226);">

    <div class="appDiv" style=" margin-left: 350px;">

        <h1 class="DETAILSTitel" style="margin-top: 30px; color: rgb(144, 117, 81); margin-left: 300px;">DETAILS</h1>



        <div class="card" id="cardDetails" style="width: 50rem;">
            <img src="https://media.istockphoto.com/id/1203194312/photo/magic-book-open.jpg?s=612x612&w=0&k=20&c=ddOo_i_GXrpm6cLJu5gb-fAFoH_NjI9ac_-7TC2prjk=" width="10px" height="350px" class="card-img-top" alt="non">

            <div class="card-body" style="margin-left: 50px; margin-right: 50px;">



                <div class="mb-3 row">
                    <label class="col-md-6 form-group mt-3" id="nameLabel" style=" font-weight: bold;">Book Name :</label>
                    <div class="col-md-6 form-group mt-3">
                        <input style="color: rgb(105, 79, 57);" type="text" readonly class="form-control-plaintext" id="name" value="<?php echo $name; ?>">
                    </div>
                </div>


                <div class="mb-3 row">
                    <label class="col-md-6 form-group mt-3" id="authorLabel" style=" font-weight: bold;">Author :</label>
                    <div class="col-md-6 form-group mt-3">
                        <input style="color: rgb(105, 79, 57);" type="text" readonly class="form-control-plaintext" id="author" value="<?php echo $author; ?>">
                    </div>
                </div>



                <div class="mb-3 row">
                    <label class="col-md-6 form-group mt-3" id="quantityLabel" style=" font-weight: bold;">Quantity :</label>
                    <div class="col-md-6 form-group mt-3">
                        <input style="color: rgb(105, 79, 57);" type="text" readonly class="form-control-plaintext" id="quantity" value="<?php echo $quantity; ?>">
                    </div>
                </div>



                <div class="mb-3 row">
                    <label class="col-md-6 form-group mt-3" id="detailsLabel" style=" font-weight: bold;">Details :</label>
                    <div class="col-md-6 form-group mt-3">
                        <input style="color: rgb(105, 79, 57);" type="text" readonly class="form-control-plaintext" id="details" value="<?php echo $details; ?>">
                    </div>
                </div>



                <div class="mb-3 row">
                    <label class="col-md-6 form-group mt-3" id="categoryLabel" style=" font-weight: bold;">Category :</label>
                    <div class="col-md-6 form-group mt-3">
                        <input style="color: rgb(105, 79, 57);" type="text" readonly class="form-control-plaintext" id="category" value="<?php echo $category; ?>">
                    </div>
                </div>



                <div class="mb-3 row">
                    <label class="col-md-6 form-group mt-3" id="priceLabel" style=" font-weight: bold;">Price :</label>
                    <div class="col-md-6 form-group mt-3">
                        <input style="color: rgb(105, 79, 57);" type="text" readonly class="form-control-plaintext" id="price" value="<?php echo $price; ?>">
                    </div>
                </div>



                <a href="http://localhost/myLibrary/index.php" class="btn btn-secondary">back</a>
            </div>
        </div>


    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>