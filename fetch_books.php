<?php
include("dbConnect.php");

// Get filters and sorting options from the request
$category = isset($_GET['category']) ? $_GET['category'] : '';
$author = isset($_GET['author']) ? $_GET['author'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';

// Build the SQL query
$sql = "SELECT * FROM books WHERE 1=1";

// Add category filter
if (!empty($category)) {
    $categories = implode("','", explode(',', $category));
    $sql .= " AND category IN ('$categories')";
}

// Add author filter
if (!empty($author)) {
    $authors = implode("','", explode(',', $author));
    $sql .= " AND author IN ('$authors')";
}

// Add sorting
if ($sort === "price-low-to-high") {
    $sql .= " ORDER BY price ASC";
} elseif ($sort === "price-high-to-low") {
    $sql .= " ORDER BY price DESC";
} elseif ($sort === "discount-high-to-low") {
    $sql .= " ORDER BY discount DESC";
}

// Execute the query
$result = $conn->query($sql);

// Fetch data and return as JSON
$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

// Close connection
$conn->close();
?>
