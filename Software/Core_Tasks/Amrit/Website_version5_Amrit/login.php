<?php
require_once "includes/db.php";

echo $_SESSION['id'] . "<br />";
echo $_SESSION['name'] . "<br />";

$username = $password = $submit = null;

if (isset($_POST['username'])) {
    $username = $_POST['username'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
if (isset($_POST['submit'])) {
    $submit = $_POST['submit'];
}

if ($submit) {
    if ($username && $password) {

        $sql = $conn->prepare("SELECT * FROM customer WHERE Username = '$username'");
        $sql->execute();
        $result = $sql->fetchObject();

        if ($result != false) {
            if ($password == $result->Password) {
                echo "login success";
                $_SESSION['id'] = $result->Customer_ID;
                $_SESSION['name'] = $result->Customer_Name;
            } else {
                echo "incorrect information provided.";
            }
        } else {
            echo "incorrect information provided.";
        }
    } else {
        echo "all fields required.";
    }
}
?>

<html>
    <body>
        <form method="POST">
            <input type="text" name="username" />
            <input type="password" name="password" />
            <input type="submit" name="submit" />
        </form>
    </body>
</html>
