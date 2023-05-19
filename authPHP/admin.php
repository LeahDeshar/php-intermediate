<?php
session_start();
$username = $_SESSION['username'];
// Check if the user is logged in
if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'admin') {
    // User is not logged in or not authorized, redirect to login page
    header("Location: Authentication.php");
    exit();
}

// echo "<h3>Welcome back admin</h3>";
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Page</title>
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
            font-size: 13rem;
            color: #F8F1F1;
        }
        p
        {
            width: 50%;
            color: #fff;
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
            <h4 class="nameTag"><?php echo "Welcome, $username! ";?></h4>
                <a href="adminAbout.php">About</a>
                <a href="logout.php">Logout</a>
            </div>
        </nav>

    </header>
    <section class="bgMain">
        <div class="main">
    
            <h1 class="mainTopic">Admin Page</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla posuere ligula eu magna porttitor, eget consequat ante vulputate. Vivamus ac lacus nec justo vehicula blandit eget eget elit. Mauris at iaculis mauris, sed dictum nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pharetra volutpat massa, a vulputate erat sagittis eu. Mauris aliquet ipsum sit amet urna pulvinar iaculis ut suscipit est. Phasellus lectus urna, placerat eget bibendum et, sodales eu dui. Phasellus convallis turpis lorem, ac bibendum massa ultrices vitae. Donec placerat sagittis rhoncus. Fusce suscipit mauris ut fringilla vehicula. Etiam sed fringilla sem.</p>
        </div>

    </section>

</body>
</html>