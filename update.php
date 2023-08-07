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
$details = "";
$category = "";
$price = "";

$error_msg = "";
$success_msg = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {

    if (!isset($_GET['id'])) {
        header("location: /myLibrary/index.php");
        // exit this file
        exit;
    }
    $id = $_GET["id"];

    //read from database
    $sql = "SELECT name,details,category,price FROM book WHERE id = $id ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:/myLibrary");
        exit;
    }

    $name = $row['name'];
    $details = $row['details'];
    $category = $row['category'];
    $price = $row['price'];
} else {
    $id = $_GET["id"];
    $name = $_POST['name'];
    $details = $_POST['details'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    do {
        if (empty($name) || empty($details) || empty($category) || empty($price)) {
            $error_msg = "All fild required";
            break;
        }

        //update
        $sql = "UPDATE  book " . "SET name ='$name' , details='$details' , category='$category' , price='$price' WHERE id ='$id' ";
        $result = $conn->query($sql);

        if (!$result) {
            $error_msg = "Error when update book";
            break;
        }
        $success_msg = "Updated Successfuly";
        header("location:/myLibrary/index.php");
        //exit this file
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
    <title>Update BooK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="Updatebackground" style="background-color: rgb(226, 226, 226);">


    <form method="post">

        <input type="hidden" value="<?php echo $id ?>" />
        <?php

        if (!empty($error_msg)) {
            echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:">
            <use xlink:href="#exclamation-triangle-fill" /></svg><div> update Failed</div></div>';
        }

        ?>



        <div class="row" id="contenerRow" style=" margin: 100px; width: 700px;">

            <h1 class="TitelUPDATE" style="margin-top: 30px; color: rgb(144, 117, 81); ">UPDATE</h1>
            <div class="form-group mt-3">
                <div id="results_contact" class="alert alert-danger d-none">

                </div>
                <div id="success_contact" class="alert alert-success d-none">

                </div>
            </div>

            <div class="form-group mt-3"><input type="text" name="name" value="<?php echo $name ?>" class="form-control" id="exampleFormControlInput1" placeholder="Enter Book Name"></div>


            <div class="form-group mt-3"><input type="number" name="price" value="<?php echo $price; ?>" class="form-control" id="exampleFormControlInput1" placeholder="Price"></div>


            <div class="form-group mt-3"><input type="text" class="form-control" name="category" value="<?php echo $category; ?>" id="exampleFormControlInput1" placeholder="Category"></div>


            <div class="form-group mt-3"> <textarea class="form-control" name="details" value="<?php echo $details; ?>" id="exampleFormControlTextarea1" placeholder="Details" rows="3"><?php echo $details; ?></textarea></div>

        </div>

        <?php

        if (!empty($success_msg)) {
            echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                    <div>update successfully</div> </div>';
        }

        ?>

        <div class="btnDiv" style="border: 2px; margin: 100px;">

            <input class="btn btn-success" href="./index.php" type="submit" value="Update">
            <a class="btn btn-primary" href="./index.php">Chance</a>

        </div>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>