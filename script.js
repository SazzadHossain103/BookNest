document.addEventListener("DOMContentLoaded", () => {
  const checkboxes = document.querySelectorAll("input[type='checkbox']");
  const sortSelect = document.getElementById("sort");
  const productList = document.getElementById("product-list");

  const fetchData = () => {
    // Collect selected filters
    const selectedCategories = Array.from(document.querySelectorAll("input[name='category']:checked"))
      .map((checkbox) => checkbox.value)
      .join(",");
    const selectedAuthors = Array.from(document.querySelectorAll("input[name='author']:checked"))
      .map((checkbox) => checkbox.value)
      .join(",");
    const sort = sortSelect.value;

    // Fetch data from the server
    fetch(`fetch_books.php?category=${selectedCategories}&author=${selectedAuthors}&sort=${sort}`)
      .then((response) => response.json())
      .then((data) => {
        // Render products
        productList.innerHTML = data
          .map(
            (book) => `
            <div class="card" >
              <div class="card-img pt-3 ps-2 pe-2 d-flex justify-content-center ">
                <img src=${book.image} class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">${book.title}</h5>
                <p class="card-text ">${book.author}</p>
                <p class="price">TK. ${book.price}</p>
                <a href="#" class="btn btn-primary w-100">Buy Now</a>
              </div>  
            </div>
              `
          )
          .join("");
      });
  };

  // Attach event listeners
  checkboxes.forEach((checkbox) => checkbox.addEventListener("change", fetchData));
  sortSelect.addEventListener("change", fetchData);

  // Initial fetch
  fetchData();
});
