<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .book-details {
            display: flex;
        }
        .book-cover {
            flex: 1;
            text-align: center;
        }
        .book-cover img {
            max-width: 200px;
            border-radius: 5px;
        }
        .book-info {
            flex: 2;
            margin-left: 20px;
        }
        .book-info h1 {
            font-size: 24px;
            margin: 0;
        }
        .book-info p {
            margin: 10px 0;
        }
        .price {
            color: green;
            font-size: 18px;
            font-weight: bold;
        }
        .stock {
            color: red;
            font-size: 14px;
        }
        .actions button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 15px;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .actions button:hover {
            background-color: #0056b3;
        }
        .related-products {
            margin-top: 30px;
        }
        .related-products h2 {
            font-size: 20px;
            margin-bottom: 15px;
        }
        .related-product {
            display: flex;
            margin-bottom: 10px;
        }
        .related-product img {
            width: 50px;
            height: 70px;
            border-radius: 5px;
        }
        .related-product-info {
            margin-left: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="book-details">
        <div class="book-cover">
            <img src="images/book1.jpg" alt="Book Cover">
        </div>
        <div class="book-info">
            <h1>Easy English</h1>
            <p><strong>Author:</strong> Jamal Uddin Jamy</p>
            <p><strong>Category:</strong> English Grammar and Language Learning</p>
            <p><strong>Price:</strong> <span class="price">TK 264</span> <del>TK 300</del></p>
            <p class="stock"><strong>Stock:</strong> Only 9 copies left!</p>
            <div class="actions">
                <button>Add to Cart</button>
                <!-- <button>Want to Read</button> -->
            </div>
        </div>
    </div>

    <div class="related-products">
        <h2>Related Products</h2>
        <div class="related-product">
            <img src="related1.jpg" alt="Related Product">
            <div class="related-product-info">
                <p><strong>Common Mistakes in English</strong></p>
                <p>TK 83</p>
            </div>
        </div>
        <div class="related-product">
            <img src="related2.jpg" alt="Related Product">
            <div class="related-product-info">
                <p><strong>Kids Spoken English</strong></p>
                <p>TK 300</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
