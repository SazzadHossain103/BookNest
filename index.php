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

    .card-img {
      height: 270px;
    }

    .price {
      font-weight: bold;
    }
    .btn{
      height: 40px;
    }
    .catergory, .author, .sort{
      background-color: white;
      margin-bottom: 20px;
      padding: 10px;
    }
  </style>
</head>

<body>
  <?php include 'header2.php'; ?>
  <div class="container">
    <div class="row w-100">
      <div class="col-3 p-3 sidebar ">
        <h3>Filter</h3>
        <div class="catergory">
          <h4>Category</h4>
          <input type="checkbox" name="category" value="English"> English <br>
          <input type="checkbox" name="category" value="Bangla"> Bangla <br>
          <input type="checkbox" name="category" value="Math"> Math <br>
          <input type="checkbox" name="category" value="History"> History <br>
          <input type="checkbox" name="category" value="Science"> Science <br>
        </div>
        <div class="author">
          <h4>Author</h4>
          <input type="checkbox" name="author" value="Munzerin"> Munzerin <br>
          <input type="checkbox" name="author" value="Ramim"> Ramim <br>
        </div>
        <div class="sort">
          <h3>Sort</h3>
          <select id="sort">
            <option value="">Select</option>
            <option value="price-low-to-high">Price: Low to High</option>
            <option value="price-high-to-low">Price: High to Low</option>
          </select>
        </div>
      </div>
      <div class="col-9 p-3">
        <div class="row gap-3" id="product-list">
          <?php // include 'displayBook2.php'; ?>
          <!-- <div class="card" >
            <div class="card-img pt-3 ps-2 pe-2 d-flex justify-content-center ">
              <img src="images/book1.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">English Therapy</h5>
              <p class="card-text ">Siful Islam</p>
              <p class="price">TK. 300</p>
              <a href="#" class="btn btn-primary w-100">Buy Now</a>
            </div>
          </div> -->

        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>

</html>