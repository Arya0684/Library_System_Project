<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>

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
    <li><a href="">Available Books</a></li>
    <li><a href="">Borrowed Books</a></li>
  </ul>
</nav>

<div class="form-container">
  <h2>Registration</h2>
  <form method="post">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Enter your name" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Enter password" required>

    <label for="role">Role</label>
    <input type="text" id="role" name="role" placeholder="What is your role" required>

    <button type="submit" name="b1" value="register">Register</button>

    <div style="display: flex; justify-content: center; margin-top: 5px;">
        <a style="font-weight: 500; color: #fff;">Already have an account?<a href="login.php" style="font-weight: 500; color: gold; margin-left: 2px;"> Login </a></a>

    </div>
  </form>
</div>

<?php
    include "config.php";

    if(isset($_POST['b1'])!=null){
        $action = $_POST['b1'];

        if($action == "register"){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = $_POST['role'];

            $sql = "insert into user (name , email , password , role) values('$name' , '$email' , '$password' , '$role')";

            if($conn->query($sql)==true){
                echo "<script>alert('User Registered Successfully');document.location.href='registration.php';</script>";
            }
            else {
              echo "<script>alert('Something Went Wrong');document.location.href='registration.php';</script>";
            }
        }
    }
?>

</body>
</html>