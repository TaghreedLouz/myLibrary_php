<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>


    <h1 style="margin-top: 50px;">BOOKS</h1>


    <?php
    include("./config.php");

    $sql = "SELECT id , name ,details , category ,  price FROM book";

    $result = $conn->query($sql);

    // if result error
    if ($result->num_rows > 0) {
        echo '<table class="table" style="background-color: #e1e1e1; margin-top: 50px; padding: 100px;" >
              <thead style="background-color: #cdb098;  padding: 100px;">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Details</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>';


        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td >" . $row["name"] .  "</td><td>" . $row["details"]
                . "</td><td>" . $row["category"] .  "</td><td>" . $row["price"] . "</td>" . "<td><div>
                <a class='btn btn-success' href='./update.php?id=$row[id]' role='button'>Update</a>
                <a class='btn btn-primary' href='./details.php?id=$row[id]' role='button'>Details</a>
                <a class='btn btn-danger' href='./delete.php?id=$row[id]' role='button'>Delete</a>
            </div>" . "</td></tr/>";
        }








        echo "</table>";
    } else {

        echo "0 results";
    }

    $conn->close();

    ?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>

    <body>


        <div class="tableContener">

            <a class="btn btn-Secondary" style=" background-color: rgb(146, 122, 97); margin-top: 10px;" href="./create.php" role="button">Insert New Book</a>

        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>

    </html>