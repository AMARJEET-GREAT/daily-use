<?php
include 'db.php';

$title = $_POST['title'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO books (title, author, isbn, quantity) 
        VALUES ('$title', '$author', '$isbn', '$quantity')";

if (mysqli_query($conn, $sql)) {
    echo "Book Added Successfully!";
    echo "<br><a href='view_books.php'>View Books</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
