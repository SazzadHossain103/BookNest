<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BookNest</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
  <?php include 'header.php'; ?>
  <div class="container">
    <div class="row w-100">
      <div class="col-4 p-3">
        <form action="add_book.php" method="POST" class="mb-3" enctype="multipart/form-data">
          <h2>Add New Book</h2>
          <input class="input" type="text" name="title" placeholder="Enter book title" required>
          <input class="input" type="text" name="author" placeholder="Enter author" required>
          <input class="input" type="text" name="category" placeholder="Enter category" required>
          <input class="input" type="number" name="price" placeholder="Enter price" required>
          <input class="input" type="file" name="fileup" required>
          <button class="button" type="submit">Add Book</button>
        </form>
      </div>
      <div class="col-8 p-3">
        <?php include 'display_books.php'; ?>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>