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



$name = "";
$author = "";
$quantity = "";
$details = "";
$category = "";
$price = "";

$error_msg = "";
$success_msg = "";


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $name = $_POST['name'];
    $author = $_POST['author'];
    $quantity = $_POST['quantity'];
    $details = $_POST['details'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    do {
        if (empty($name) || empty($author) || empty($quantity) || empty($details) || empty($category) || empty($price)) {
            $error_msg = "All fild required";
            break;
        }

        $sql = "INSERT INTO book (name , author , quantity , details , category , price)
        VALUES ('$name' , '$author' , '$quantity', '$details' , '$category' , '$price' )";
        $result = $conn->query($sql);

        if (!$result) {
            $error_msg = "Error when add new book";
            break;
        }

        // add new record
        $name = "";
        $author = "";
        $quantity = "";
        $details = "";
        $category = "";
        $price = "";
        $success_msg = "Added Successfuly";
        //redirect
        header("location: /myLibrary/index.php");
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
    <title>Insert New BooK</title>
    <link rel="stylesheet" href="/myLibrary/mainCss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>


    <div class="createDiv">


        <div class="contener">
            <div class="app">
                <h2 class="header">Insert the data</h2>

                <div class="col-lg-7 mt-4 mt-lg-0 aos-init aos-animate" data-aos="fade-left">

                    <form method="POST" class="form">

                        <?php

                        if (!empty($error_msg)) {
                            echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:">
                        <use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>Insert Failed</div></div>';
                        }

                        ?>

                        <div class="row">
                            <div class="form-group mt-3" id="input">
                                <div id="results_contact" class="alert alert-danger d-none">

                                </div>
                                <div id="success_contact" class="alert alert-success d-none">

                                </div>
                            </div>


                            <div class="form-group mt-3" id="input">

                                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" id="name" placeholder="Enter Book Name" required="">
                            </div>

                            <div class="form-group mt-3" id="input">

                                <input type="text" class="form-control" name="author" value="<?php echo $author; ?>" id="author" placeholder="Enter the author" required="">
                            </div>

                            <div class="col-md-6 form-group mt-3" id="input">

                                <input type="number" name="quantity" value="<?php echo $quantity; ?>" class="form-control" id="quantity" placeholder="Available Quantity" required="">
                            </div>


                            <div class="col-md-6 form-group mt-3" id="input">

                                <input type="number" name="price" value="<?php echo $price; ?>" class="form-control" id="Price" placeholder="Price" required="">
                            </div>


                            <div class="form-group mt-3" id="input">

                                <input type="text" class="form-control" name="category" value="<?php echo $category; ?>" id="category" placeholder="Category" required="">
                            </div>



                            <div class="form-group mt-3" id="input">
                                <textarea class="form-control" name="details" value="<?php echo $details; ?>" id="details" placeholder="Details" rows="3"><?php echo $details; ?></textarea>
                            </div>


                            <div class="btnn">

                                <input class="btn btn-success" id="sty" type="submit" value="Insert">
                                <a class="btn btn-primary" id="sty" href="./index.php">Cancel</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>