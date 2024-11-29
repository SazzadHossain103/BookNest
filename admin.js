document.addEventListener("DOMContentLoaded", () => {
    const fetchBooks = () => {
        fetch("fetch_books.php")
            .then((response) => response.json())
            .then((data) => {
                const booksContainer = document.getElementById("books");
                booksContainer.innerHTML = data
                    .map(
                        (book) => `
                    <div class="book-item">
                        <div>
                            <h3>${book.title}</h3>
                            <p>Author: ${book.author}</p>
                            <p>Price: ${book.price} BDT</p>
                        </div>
                        <div>
                            <button onclick="editBook(${book.id})">Edit</button>
                            <button onclick="deleteBook(${book.id})">Delete</button>
                        </div>
                    </div>
                `
                    )
                    .join("");
            });
    };

    document.getElementById("addBookForm").addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);

        fetch("add_book.php", {
            method: "POST",
            body: formData,
        }).then(() => {
            fetchBooks();
            e.target.reset();
        });
    });

    window.editBook = (id) => {
        // Populate and show popup
        fetch(`fetch_books.php?book_id=${id}`)
            .then((response) => response.json())
            .then((books) => {
                // const book = books.find((b) => b.id == id);
                const form = document.getElementById("editBookForm");
                form.id.value = books.book_id;
                form.title.value = books.title;
                form.author.value = books.author;
                form.category.value = books.category;
                form.price.value = books.price;

                document.getElementById("editPopup").style.display = "block";
            });
    };

    document.getElementById("editBookForm").addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);

        fetch("edit_book.php", {
            method: "POST",
            body: formData,
        }).then(() => {
            fetchBooks();
            document.getElementById("editPopup").style.display = "none";
        });
    });

    window.deleteBook = (id) => {
        fetch("delete_book.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `id=${id}`,
        }).then(() => fetchBooks());
    };

    fetchBooks();
});
