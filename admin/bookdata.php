<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Details Page </title>

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
    max-width: 500px;
    margin: 40px auto;
    margin-top: 30px;
    background: #fff;
    padding: 30px;
    padding-top: 10px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.form-container h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #2c3e50;
}

.form-container label {
    display: block;
    margin-bottom: 6px;
    color: #34495e;
    font-weight: 600;
}

.form-container input,
.form-container select,
.form-container textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 18px;
    margin-left: -5px;
    border: 1px solid #bdc3c7;
    border-radius: 6px;
    background: #f9f9f9;
    font-size: 15px;
    transition: border-color 0.3s ease;
}

.form-container input:focus,
.form-container select:focus,
.form-container textarea:focus {
    outline: none;
    border-color: #1abc9c;
    background: #fff;
}

.form-container button {
    width: 100%;
    padding: 14px;
    background: #1abc9c;
    border: none;
    color: #fff;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.form-container button:hover {
    background: #16a085;
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
    <li><a href="userlist.php">User List</a></li>
    <li><a href="bookdata.php">Add Book</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</nav>
<div class="form-container">
    <h2>Add New Book</h2>
    <form action="bookdata.php" method="post" enctype="multipart/form-data">
        
        <label for="title">Book Title</label>
        <input type="text" id="title" name="title" placeholder="Enter book title" required>

        <label for="author">Author</label>
        <input type="text" id="author" name="author" placeholder="Enter author's name" required>

        <label for="cover_image">Cover Image</label>
        <input type="file" id="cover_image" name="cover_image" placeholder="" required>

        <label for="status">Status</label>
        <select id="status" name="status" required>
            <option>Choose Book Status</option>
            <option value="Available">Available</option>
            <option value="Not Available">Not Available</option>
        </select>    

        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4" placeholder="Enter a short description"></textarea>

        <button type="submit" name="b1" value="save">Add Book</button>
    </form>
</div>

<?php
    include "config.php";

    if(isset($_POST['b1'])!=null){
        $action = $_POST['b1'];

        if($action == "save"){
            $title = $_POST['title'];
            $author = $_POST['author'];
            $status = $_POST['status'];
            $description = $_POST['description'];

            $cover_image = $_FILES['cover_image']['name'];
            $tmp_name = $_FILES['cover_image']['tmp_name'];
            move_uploaded_file($tmp_name, "cover_image/".$cover_image);

            $sql = "insert into books (title , author , cover_image , status , description) values('$title' , '$author' , '$cover_image' , '$status' , '$description')";

            if($conn->query($sql)==true){
                echo "<script>alert('Book Added Successfully');document.location.href='bookdata.php';</script>";
            }
            else {
                echo "<script>alert('Something Went Wrong');document.location.href='bookdata.php';</script>";
            }
        }
    }
?>

</body>
</html>