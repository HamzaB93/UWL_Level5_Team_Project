<?php
require_once "includes/db.php";
require_once "includes/basket_session.php";

$basket_number = trolleyNumber();
?>
<!---------------------------- START OF TEMPLATE FOR EVERY PAGE  ------------------------------>

<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Vista</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <style>

            /* --------------- Header --------------------- */

            #HeaderDiv {
                background: linear-gradient(#08CF08, #08CF08); /* For browsers that do not support gradients */
                background-repeat: no-repeat;
            }



            .HeaderClass{
                background-color: transparent;
                text-align: left;
                margin-left: 5px;
                margin-bottom: 10px;
                margin-right: 800px;
            }

            #LogoID{
                float:left;
            }
            #SloganID{
                float:left;
                margin-left: 20px;
                margin-top: 16px;
                color: white;
            }

            /* --------------- Nav Bar -------------------- */

            .navbar{
                color: white !important;
                background: black;
                border: transparent;
                font-size: 10px;
                margin-bottom: 50px;

            }

            .navbar li a, .navbar .navbar-brand { 
                color: white !important;
                background-color: black !important;
                font-size: 20px;
            }

            #nav li a:hover, #nav2 li a:hover{
                background-color: white!important;
                color: black !important;
            }

            /* --------------- Carousel -------------------- */

            .carousel-inner > .item > img {
                margin: auto;
                width:1300px;
                height:500px
            }

            .carousel{
                margin: 0 auto;
                margin-bottom: 50px;
                width:800px;
                height:500px;

            }

            #carousel_links_white{
                color: white;
            }

            #carousel_links_black{
                color: black;
            }

            /* --------------- Product Section -------------------- */

            .row-centre{
                float:none;
                margin: 0 auto;
                margin-top: 20px;
                margin-bottom: 20px;
            }

            #columnDivs{
                margin-left: auto;
                margin-right: auto;
                width: 190px;

            }

            #ProductLinks{
                color: black;
                text-align: center;

            }



            /* --------------- Footer -------------------- */

            .FooterClass{
                background-color: transparent;
                margin: auto;
                margin-top: 40px;
                width: 100%;
            }
        </style>

    </head>
    <!---------------------------- HEADER  ------------------------------>

    <!-- Sets the header division  -->
    <div id="HeaderDiv">
        <body>
            <header class="HeaderClass">
                <div class="container">
                    <div id="LogoID">
                        <a href="index.php">
                            <img src="Logo.png" alt="Logo" width="80" height="110" margin-right="10" >
                        </a>
                    </div>
                    <div id="SloganID">
                        <h1> More for less </h1>
                    </div>


                </div>

                <!---------------------------- NAVBAR  ------------------------------>
            </header>
            <!-- First Nav Bar-->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul id="nav" class="nav navbar-nav">
                        <li><a href="Products.php?id=1000">Fresh Food</a></li>
                        <li><a href="Products.php?id=1012">Toiletries</a></li>
                        <li><a href="Products.php?id=1021">Electronics</a></li>
                    </ul>
                    <ul id="nav2" class="nav navbar-nav navbar-right">
                        <li><a href="basket.php">View Trolley <?= $basket_number; ?> </a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Sign In</a></li>
                                <li><a href="#">Sign Up</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">More</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
    </div>

    <!---------------------------- END OF TEMPLATE FOR EVERY PAGE  ------------------------------>


    <?php
    require_once "includes/db.php";

    if (isset($_SESSION['id'])) {
        echo $_SESSION['name'];
        print "<br /><a href='marketing.php?action=logout'>Logout</a>";
    }
    
    $customerId = $_SESSION['id'];

    $action = null;
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }

    if ($action == "logout") {
        unset($_SESSION['id']);
        unset($_SESSION['name']);
    }

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

    <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
        <form method="post">
            <td>
                <table width="100%" border="0" cellpadding="5" cellspacing="2" bgcolor="#FFFFFF">
                    <tr>
                        <td colspan="3"><strong>Customer Login </strong></td>
                    </tr>
                    <tr>
                        <td width="78">Username</td>
                        <td width="6">:</td>
                        <td width="294"><input name="username" type="text" id="myusername"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input name="password" type="password" id="mypassword"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="submit" value="Login"></td>
                    </tr>
                </table>
            </td>
        </form>
    </tr>
</table>
