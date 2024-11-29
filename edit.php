<?php

// Database connection
include("dbConnect.php");

$id = $_GET['id'];

// Fetch books from database
$sql = "SELECT * FROM books where book_id={$id}";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Library</title>
    <!--Bootstap Latest compiled and minified CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="styles.css">  -->
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .card {
            width: 14rem;
        }

        .price {
            font-weight: bold;
        }

        .input {
            /* width: calc(100% - 10px); */
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 2px solid #349437;
            border-radius: 5px;

        }

        .button {
            padding: 8px 20px;
            border-radius: 8px !important;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .button:hover {
            background-color: #349437;
        }

        .book-item {
            margin-bottom: 10px;
            padding: 12px;
            background-color: white;
            display: flex;
            flex-direction: column;
            border-radius: 5px;
        }

        .book-item h3 {
            color: green;
        }

        .dlt-btn {
            background-color: #f44336;
            float: inline-end;
            padding: 8px 20px;
            border-radius: 8px !important;
            color: white;
            border: none;
        }

        .dlt-btn:hover {
            background-color: #d32f2f;
        }

        .edit-btn {
            margin-right: 10px;
            text-decoration: none;
            padding: 8px 20px;
            border-radius: 8px !important;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            float: inline-end;
        }

        .edit-btn:hover {
            background-color: #349437;
        }
    </style>
</head>

<body>

    <div class="container w-50">
        <h1 class="hdline text-center ">Book Edit</h1>
        <form action="#" method="POST" class="mb-3" enctype="multipart/form-data">
            <input class="input" type="text" name="title" value="<?php echo $row['title']  ?>" placeholder="Enter book title" required>
            <input class="input" type="text" name="author" value="<?php echo $row['author']  ?>" placeholder="Enter author" required>
            <input class="input" type="text" name="category" value="<?php echo $row['category']  ?>" placeholder="Enter category" required>
            <input class="input" type="text" name="price" value="<?php echo $row['price']  ?>" placeholder="Enter price" required>
            <button class="button" type="submit">Edit Book</button>
        </form>
    </div>

    <!--Bootstap Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
// Database connection
include("dbConnect.php");
// Edit book to database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $sql2 = "UPDATE books SET  title='$title', author='$author', category='$category', price='$price' WHERE book_id=$id";
    $res = mysqli_query($conn, $sql2);
    if ($res) {
        header("Location: admin.php");
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
}

$conn->close();
?>