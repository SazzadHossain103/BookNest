<?php
// Database connection
include("dbConnect.php");


// Fetch books from database
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<div class="book-item w-100">';
            echo '<div class="row w-100">';
                echo '<div class="col-2">';
                    echo '<img src="' . $row['image'] . '"  width="100px">';
                echo '</div>';
                echo '<div class="col">';
                    echo '<h3>' . $row['title'] . '</h3>';
                    echo '<p>Author: ' . $row['author'] . '</p>';
                    echo '<p>Price: ' . $row['price'] . '</p>';
                echo '</div>';
                echo '<div class="col">';
                    echo '<form action="delete_book.php" method="POST">';
                    echo '<input type="hidden" name="book_id" value="' . $row['book_id'] . '">';
                    echo '<button type="submit" class="dlt-btn" >Delete</button>';
                    echo '<a href="edit.php?id=' . $row['book_id'] . '" class="edit-btn" >Edit</a>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';
            // echo '<h3>' . $row['title'] . '</h3>';
            // echo '<p>Author: ' . $row['author'] . '</p>';
            // echo '<form action="delete_book.php" method="POST">';
            //     echo '<input type="hidden" name="book_id" value="' . $row['book_id'] . '">';
            //     echo '<button type="submit" class="dlt-btn" >Delete</button>';
            //     echo '<a href="edit.php?id=' . $row['book_id'] . '" class="edit-btn" >Edit</a>';
            // echo '</form>';
        echo '</div>';
    }
} else {
    echo "0 results";
}
$conn->close();
