<?php
    include "config.php";

    $sql = "select * from books where status = 'Available' ORDER BY id ASC";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Available Books</title>

<style>
body, ul {
    margin: 0;
    padding: 0;
}

.navbar {
    background-color: #2c3e50;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
}

.brand {
    color: #fff;
    text-decoration: none;
    font-size: 26px;
    font-weight: bold;
}

.nav-right {
    list-style: none;
    display: flex;
    gap: 25px;
}

.nav-right li a {
    color: #ecf0f1;
    text-decoration: none;
    font-size: 18px;
    transition: color 0.3s ease;
}

.nav-right li a:hover {
    color: #1abc9c;
}

.form-container {
    max-width: 400px;
    margin: 60px auto;
    padding: 25px;
    background-color: #34495e;
    border-radius: 8px;
    color: #ecf0f1;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
}

.form-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #fff;
}

.form-container label {
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
}

.form-container input {
    width: 100%;
    padding: 10px;
    margin-bottom: 18px;
    border: 1px solid #2c3e50;
    border-radius: 4px;
    background-color: #2c3e50;
    color: #ecf0f1;
}

.form-container input:focus {
    border-color: #1abc9c;
    outline: none;
}

.form-container button {
    width: 100%;
    padding: 12px;
    background-color: #1abc9c;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-container button:hover {
    background-color: #16a085;
}

h2 {
    text-align: center;
    margin: 25px 0;
    color: #2c3e50;
}

.table-container {
    width: 95%;
    margin: auto;
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid grey;
    font-size: 18px;
    font-weight: 200;
}

th {
    background-color: #2c3e50;
    color: white;
}

tr:hover {
    background-color: #f1f1f1;
}

td {
    max-width: 200px;
}

img {
    width: 90px;
    height: 90px;
    object-fit: center  ;
    border-radius: 6px;
    border: 1px solid #2c3e50;
}

button {
    height: 40px;
    width: 90px;
    font-size: 16px;
    color: whitesmoke;
    background-color: green;
    border: 1px solid black;
    border-radius: 10px;
}

.status-available {
    color: green;
    font-weight: bold;
}
.status-not-available {
    color: red;
    font-weight: bold;
}

}

</style>

</head>
<body>

<nav class="navbar">
  <div class="nav-left">
    <a href="" class="brand">Library Store</a>
  </div>
  <ul class="nav-right">
    <li><a href="../index.php">Home</a></li>
    <li><a href="availablebook.php">Available Books</a></li>
    <li><a href="borrowedbook.php">Borrowed Books</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</nav>

<h2>Available Books</h2>

<div class="table-container">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Cover Image</th>
            <th>Title</th>
            <th>Author</th>
            <th>Status</th>
            <th>Description</th>
            <th>Borrow A Book</th>
        </tr>

<?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $statusClass = ($row['status'] === 'Available') ? 'status-available' : 'status-not-available';

            $imgPath = "../admin/cover_image/" . $row['cover_image'];

            echo "<tr>
                <td>{$row['id']}</td>
                <td><img src='$imgPath' alt='Cover'></td>
                <td>{$row['title']}</td>
                <td>{$row['author']}</td>
                <td class='$statusClass'>{$row['status']}</td>
                <td>{$row['description']}</td>
                <td><a href='borrow.php?bookid=$row[id]'><button>Borrow</button><a></td>
            </tr>";

        }
    }
        else {
            echo "<tr><td colspan = '6'>No Books Found</td></tr>";
        }

        if(isset($_GET['bookid'])!=null){
        $bookid = $_GET['bookid'];
        $sql = "delete from books where id = '$bookid'";

        if($conn->query($sql)==true){
            echo "<script>alert('Book Deleted Successfully');document.location.href='dashboard.php';</script>";
        }
        else {
            echo "<script>alert('Something Went Wrong');document.location.href='dashboard.php';</script>";
        }
    }
?>
    </table>

</body>
</html>