<?php
// Database connection
include("dbConnect.php");


// Fetch books from database
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card" >';
          echo '<div class="card-img pt-3 ps-2 pe-2 d-flex justify-content-center ">';
              echo '<img src="' . $row['image'] . '"  class="card-img-top">';
          echo '</div>';
          echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['title'] . '</h5>';
            echo '<p class="card-text ">Author: ' . $row['author'] . '</p>';
            echo '<p class="price">Price: ' . $row['price'] . '</p>';
            echo '<a href="#" class="btn btn-primary w-100">Buy Now</a>';
          echo '</div>';
        echo '</div>';
    }
} else {
    echo "0 results";
}
$conn->close();
