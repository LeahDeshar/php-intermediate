<?php
session_start();
interface Authenticatable {
    public function authenticate($username, $password);
    public function getUserType();
}

class User implements Authenticatable {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function authenticate($username, $password) {
        // Retrieve the user information from the database based on the provided username
        $dbUsername = ""; // Database username field
        $dbPassword = ""; // Database password field

        $db = new PDO("mysql:host=localhost;dbname=authPHP", "root", "password");

        $query = "SELECT username, password FROM users WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->execute(array(":username" => $username));
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result && $result['username'] === $username && $result['password'] === $password) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserType() {
        return "user";
    }
}

class Admin implements Authenticatable {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function authenticate($username, $password) {
        // Retrieve the admin information from the database based on the provided username
        $dbUsername = ""; // Database username field
        $dbPassword = ""; // Database password field

        $db = new PDO("mysql:host=localhost;dbname=authPHP", "root", "password");

        $query = "SELECT username, password FROM admins WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->execute(array(":username" => $username));
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result && $result['username'] === $username && $result['password'] === $password) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserType() {
        return "admin";
    }
}

function login(Authenticatable $user, $username, $password) {
    if ($user->authenticate($username, $password)) {
        if ($user->getUserType() == 'user') {
            
            $_SESSION['username'] =$username;
           $_SESSION['user_type'] = $user->getUserType();
            header("Location: user.php");
        } else {
            $_SESSION['username'] =$username;
           $_SESSION['user_type'] = $user->getUserType();
            header("Location: admin.php");
        }
        exit();
    } else {
        echo "Login failed!" . PHP_EOL;
    }
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the username and password
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['user_type'];

    
    // Create user and admin instances
    if ($userType === 'user') {
        $user = new User($username, $password);
        login($user, $username, $password);
    } elseif ($userType === 'admin') {
        $admin = new Admin($username, $password);
        login($admin, $username, $password);
    } else {
        echo "Invalid user type!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<style>
    body
    {
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        height: 80vh;
    }
    section{
        background-color: #025464;
        width: 50%;
        height: 50vh;
       margin: auto;
        border-radius: 20px;
    }
    form 
    {
        width: 80%;
        margin: auto;
    }
    input 
    {
        border: none;
        display: block;
        width: 100%;
        border-radius: 12px;
        padding: 10px;
        margin-top: 6px;
    }
    input[type='submit'] {
    width: 50%;
    margin: 30px auto 0;
    
    }
    h1
    {
        text-align: center;
    }
</style>
<body>
    <section>
    <h1>Login Page</h1>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="user_type">User Type:</label>
        <select id="user_type" name="user_type">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select><br>

        <input type="submit" value="Login">
    </form>

    </section>
   
</body>
</html>
