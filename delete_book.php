<?php
// Database connection
include("dbConnect.php");


// Delete book from database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];

    $sql = "DELETE FROM books WHERE book_id=$book_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
