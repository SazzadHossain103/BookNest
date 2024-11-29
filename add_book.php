<?php
// Database connection
include("dbConnect.php");


// Add book to database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $filename = $_FILES["fileup"]["name"];
    $tempname = $_FILES["fileup"]["tmp_name"];
    $folder = "images/".$filename;
    move_uploaded_file($tempname, $folder);
    // if(move_uploaded_file($tempname, $folder);)

    $sql = "INSERT INTO books (title, author, price, category, image) VALUES ('$title', '$author', '$price','$category', '$folder')";

    if ($conn->query($sql) === TRUE) {
        // header("Location: admin.php");
        echo "Book added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
