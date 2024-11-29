<?php
include("dbConnect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $sql = "UPDATE books SET title='$title', author='$author', category='$category', price='$price' WHERE book_id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Book updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
