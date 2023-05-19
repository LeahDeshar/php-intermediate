<?php
session_start();
$username = $_SESSION['username'];
// Check if the user is logged in
if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'user') {
    // User is not logged in or not authorized, redirect to login page
    header("Location: Authentication.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>About Page</title>
    <style>
        *
        {
            margin: 0;
            padding: 0;
        }
        body
        {
            background-color: #fff;
        }
        header{
            width: 80%;
            margin: auto;
        }
        nav
        {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }
        a
        {
            text-decoration: none;
            color: black;
            margin-inline: 10px;
            transition: .4s;
        }
        a:hover
        {
            
            color: red;
        }
        .nameTag
        {
            border: 1px solid red;
            display: inline;
            font-size: 12px;
            padding: 10px 5px;
            margin-right: 20px;
        }
        .logo{
            color: red;
        }
        .bgMain{
            background-color: #025464;

        }
        .main{
            height: 100vh;
            width: 80%;
            margin: 30px auto 0;
        }
        .mainTopic
        {
            font-size: 15rem;
            color: #F8F1F1;
        }
        p
        {
            width: 50%;
            color: #000;
            margin-top: 30px;
        }
        .active
        {
            color: #025464;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h3>TASK</h3>
            </div>
            <div>
            <h4 class="nameTag"><a href="user.php"><?php echo "Welcome, $username! ";?></a></h4>
                <a href="userAbout.php" class="active">About</a>
                <a href="logout.php">Logout</a>
            </div>
        </nav>

    </header>
    <section class="main">
        <h2>ABOUT PAGE</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae odio, natus eius maiores vel itaque! Aut tenetur praesentium dignissimos temporibus!</p>
    </section>