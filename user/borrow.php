<?php

session_start();
$userid = $_SESSION['user_id'];

include "config.php";

$title = "";
$author = "";
$bookid = "";

if(isset($_GET['bookid'])){
    $bookid = $_GET['bookid'];

$sql = "select * from books where id = '$bookid'";
$result = $conn->query($sql);

if($result->num_rows == 0){
    echo "<script>alert('No Book Found');document.location.href='borrow.php';</script>";
    exit;
}
else {
    while($row = $result->fetch_assoc()){
        $title = $row['title'];
        $author = $row['author'];
        
}   
}
}

    if(isset($_POST['b1'])!=null){
        $action = $_POST['b1'];

        if($action == "borrow"){
            $bookid = $_POST['book_id'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $borrow_date = $_POST['borrow_date'];

            $sql = "insert into transaction (user_id , book_id , title , author , borrow_date)
                values ('$userid' , '$bookid' , '$title' , '$author' , '$borrow_date')";

                if($conn->query($sql) == true){

            $updatestatus = "update books set status = 'Not Available' where id = '$bookid'";
            $conn->query($updatestatus);

            echo "<script>alert('Book Borrowed Successfully');
                  document.location.href='availablebook.php';</script>";
            exit;
        }
        else {
            echo "<script>alert('Something Went Wrong');
                  document.location.href='availablebook.php';</script>";
            exit;
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Borrow Book</title>

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

<div class="form-container">
  <h2>Book Borrow Detail</h2>
  <form method="post">
    <label for="title">Book Title</label>
    <input type="text" id="title" name="title" placeholder="Enter book title" value="<?php echo $title ?>" required>

    <label for="author">Author</label>
    <input type="text" id="author" name="author" placeholder="Enter author's name" value="<?php echo $author ?>" required>

    <label for="borrow_date">Name</label>
    <input type="date" id="borrow_date" name="borrow_date" placeholder="dd/mm/yyyy" required>

    <input type="hidden" name="book_id" value="<?php echo $bookid ?>">

    <button type="submit" name="b1" value="borrow">Borrow A Book</button>

    </form>
</div>

<!-- <?php

    if(isset($_POST['b1'])!=null){
        $action = $_POST['b1'];

        if($action == "borrow"){
            $title = $_POST['title'];
            $author = $_POST['author'];
            $borrow_date = $_POST['borrow_date'];

            

        }


    }
?> -->

</body>
</html>