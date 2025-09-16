<?php
include "config.php";

$sql = "select * from books";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Book Details</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    background: #ecf0f1;
    padding: 0;
    width: 100%;
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
    font-family: Arial, sans-serif;
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
<?php
  include "config.php";

  if(isset($_GET['bookid'])!=null){
    $bookid = $_GET['bookid'];
  }
  else {
    echo "<script>alert('Something Went Wrong');document.location.href='../dashboard.php';</script>";
  }

  $sql = "select * from books where id = '$bookid'";
  $result = $conn->query($sql);

  if($result->num_rows == 0){
        echo "<script>alert('No Record Found');document.location.href='../dashboard.php';</script>"; 
  }
  else {
    while ($row = $result->fetch_assoc()){
      $title = $row["title"];
      $author = $row["author"];
      $cover_image = $row["cover_image"];
      $status = $row["status"];
      $description = $row["description"];
    }
  }

?>

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
    <h2>Update Book Details</h2>
    <form method="post" enctype="multipart/form-data">
        
        <label for="title">Book Title</label>
        <input type="text" id="title" name="title" placeholder="Enter book title" value="<?php echo $title; ?>" required>

        <label for="author">Author</label>
        <input type="text" id="author" name="author" placeholder="Enter author's name" value="<?php echo $author; ?>" required>

        <label for="cover_image">Cover Image</label>
        <input type="file" id="cover_image" name="cover_image" placeholder="">
        <div style="margin-top: -10px; margin-bottom: 10px;">
        <?php
            if(!empty($cover_image)){
                echo "Current File : .$cover_image";
            }
            else {
                echo "No Image Uploaded Yet";
            }
        ?>
        </div>

        <label for="status">Status</label>
        <select id="status" name="status" required>
            <option>Choose Book Status</option>
            <option value="Available" <?php if($status == 'Available') echo 'selected'; ?>>Available</option>
            <option value="Not Available" <?php if($status == 'Not Available') echo 'selected'; ?>>Not Available</option>
        </select>    

        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4" placeholder="Enter a short description"><?php echo $description; ?></textarea>

        <button type="submit" name="b1" value="update">Update</button>
    </form>
</div>


<?php

    if(isset($_POST['b1'])!=null){
      $action = $_POST['b1'];

      if($action == "update"){
            $title = $_POST['title'];
            $author = $_POST['author'];
            $status = $_POST['status'];
            $description = $_POST['description'];

            $cover_image = $_FILES['cover_image']['name'];
            $tmp_name = $_FILES['cover_image']['tmp_name'];
            move_uploaded_file($tmp_name, "cover_image/".$cover_image);

            $sql = "update books set title = '$title' , author = '$author' , cover_image = '$cover_image' , status = '$status' , description = '$description' where id = '$bookid'";

            if($conn->query($sql)==true){
                echo "<script>alert('Book Details Updated Successfully');document.location.href='../dashboard.php';</script>";
            }
            else {
                echo "<script>alert('Something Went Wrong');document.location.href='../dashboard.php';</script>";
            }
      }
    }

?>

</body>
</html>