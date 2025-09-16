<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>

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

.nav-right li.login {
  transform: translateX(-200px);
}

.nav-right li a {
    color: #ecf0f1;
    text-decoration: none;
    font-size: 18px;
    cursor: pointer;
    transition: color 0.3s ease;
}

.nav-right li a:hover {
    color: #1abc9c;
}

.dropdown-content {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #34495e;
    min-width: 145px;
    border-radius: 6px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    overflow: hidden;
    z-index: 99;
    margin-left: -82px;
}

.dropdown-content a {
    color: #ecf0f1;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    transition: background 0.3s ease;
}

.dropdown-content a:hover {
    color: white;
    background-color: #2c3e50;
}

.nav-right li {
    position: relative;
}

.nav-right li:hover .dropdown-content {
    display: block;
}

.library-description {
    max-width: 900px;
    margin: 60px auto;
    padding: 30px;
    background-color: #34495e;
    color: #ecf0f1;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.6);
}

.library-description h1 {
    color: #1abc9c;
    font-size: 32px;
    margin-bottom: 20px;
}

.library-description p {
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 15px;
}

.library-description hr{
    border: none;
    height: 2px;
    background: linear-gradient(to right , #ff6a00 , #ee0979);
}

</style>

</head>
<body>
    <nav class="navbar">
        <div class="nav-left">
            <a href="" class="brand">Library Store</a>
        </div>
        <ul class="nav-right">
            <li><a href="">Home</a></li>
            <li><a href="">Available Books</a></li>
            <li><a>Login</a>
                <div class="dropdown-content">
                    <a href="user/login.php">Member Login</a>
                    <a href="admin/login.php">Admin Login</a>
                </div>
            </li>
        </ul>
    </nav>

    <section class="library-description">
        <div class="content">
            <h1>Welcome to Our Library Store</h1>
            <hr>
            <p>
                Our Library Management System is designed to make borrowing and returning books 
                simple, fast, and efficient. Members can browse the available books online, 
                check their status in real-time, and borrow or return with just a few clicks. 
                Admins can easily manage book records, track transactions, and maintain an 
                up-to-date collection.
            </p>
            <p>
                Whether you are a passionate reader or a busy student, our system helps you 
                save time and stay organized—bringing the library to your fingertips.
            </p>
            <p>
                Our goal is to create a seamless experience for both readers and administrators. 
                From tracking borrowed books to monitoring return dates, every feature is built 
                to ensure accuracy and convenience. With a user-friendly interface and secure 
                login options for members and admins, managing your library has never been easier.
            </p>
        </div>
    </section>

</body>
</html>