<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM books");
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Books</title>
</head>
<body>

<h2>Library Books</h2>
<a href="add_book.html">Add New Book</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['title']; ?></td>
        <td><?= $row['author']; ?></td>
        <td><?= $row['isbn']; ?></td>
        <td><?= $row['quantity']; ?></td>
        <td>
            <a href="delete.php?id=<?= $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>

</table>

</body>
</html>
