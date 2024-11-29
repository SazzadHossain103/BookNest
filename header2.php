<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BookNest</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="style.css">
  <style>
    .search-input {
      width: 400px;
    }

    .search-container{
      position: absolute;
      width: 100%;
      display: flex;
      justify-content: center;
    }
    .search-content {
      /* position: absolute; */
      margin-top: 10px;
      border: 1px solid #ccc;
      background-color: #fff;
      max-height: 500px;
      width: 700px;
      overflow-y: auto;
      display: none;
      z-index: 100;
      /* Initially hidden */
    }
    .search-content .search-item{
      display: flex;
      /* width: 500px; */
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="logo">
        <a href="index.php">BookNest</a>
      </div>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Category</a></li>
        <li><a href="#">Favorite</a></li>
        <li><a href="#">Prechest</a></li>
      </ul>
      <div class="auth-buttons">
        <button class="login-btn"><a href="login.php">Log In</a></button>
        <button class="signup-btn"><a href="signup.php">Sign Up</a></button>
      </div>
    </nav>

    <!-- Sub-navbar for Search -->
  </header>
  <div class="sub-navbar">
    <form action="#" method="POST" class="search-form" onsubmit="return false" ;>
      <input type="text" id="searchTerm" name="searchTerm" placeholder="Search for books..." class="search-input" onkeyup="performSearch()" />
      <button type="submit" class="search-btn">Search</button>
    </form>
    <div class="search-container">
      <div id="search-results" class="search-content"></div>
    </div>
  </div>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
  <script>
    function performSearch(searchTerm = null) {
      const inputField = document.getElementById("searchTerm");
      const resultsContainer = document.getElementById("search-results");

      // Use the provided searchTerm (from button click) or get it from the input field
      const term = searchTerm !== null ? searchTerm : inputField.value.trim();

      if (term === "") {
        resultsContainer.style.display = "none"; // Hide results if input is empty
        resultsContainer.innerHTML = "";
        return;
      }

      // AJAX request to perform the search
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "search3.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          resultsContainer.innerHTML = xhr.responseText;
          resultsContainer.style.display = "block"; // Show results
        }
      };
      xhr.send("searchTerm=" + encodeURIComponent(term));
    }

    // Hide the search results when clicking outside
    document.addEventListener("click", function(event) {
      const resultsContainer = document.getElementById("search-results");
      const searchInput = document.getElementById("searchTerm");

      // Check if the click is outside the search input or results container
      if (
        resultsContainer.style.display === "block" &&
        !resultsContainer.contains(event.target) &&
        event.target !== searchInput
      ) {
        resultsContainer.style.display = "none"; // Hide results
      }
    });

    // Handle form submission to make the "Search" button work
    document.querySelector(".search-form").addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent the default form submission
      const searchTerm = document.getElementById("searchTerm").value.trim();
      performSearch(searchTerm);
    });
  </script>
</body>

</html>