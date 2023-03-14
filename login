<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="main.css"/>
        <title>Login</title>
    </head>
<body>
<?php
    session_start();
?>
    <div class="form">
    <form method="post" action="loginDetails.php">
    <h1>Customer Login Here</h1>
        
    <label for="name">Username: </label>
    <input type="text" name="txtName" value="">
    <?php if(isset($_SESSION['usererror']))
            { 
                echo $_SESSION['usererror'];      
            }
    ?>
    <br>
    <br>
    <label for="password">Password: </label>
    <input type="password" name="txtPassword" value="">
    <?php if(isset($_SESSION['passCustomerError'])){ 
        echo $_SESSION['passCustomerError'];
    }
    ?>
    <br>
    <br>
    <input type="submit" value="Submit" name="subUser"/>
    <?php
        if(isset($_SESSION['loginCustomerError'])){
            echo $_SESSION['loginCustomerError'];
        }
    ?>
    <br>
    <br>
    <p>Not already a User? Register <a href="registerCustomers.php"><i>here</i></a></p>
    </form>
    </div>

    <div class="form">
    <form method="post" action="traderDetails.php">
    <h1>Trader Login Here</h1>
        
    <label for="name">Username: </label>
    <input type="text" name="txtName" value="">
    <?php if(isset($_SESSION['tradererror']))
            { 
                echo $_SESSION['tradererror'];      
            }
    ?>
    <br>
    <br>
    <label for="password">Password: </label>
    <input type="password" name="txtPassword" value="">
    <?php if(isset($_SESSION['passTraderError'])){ 
        echo $_SESSION['passTraderError'];
    }
    ?>
    <br>
    <br>
    <input type="submit" value="Submit" name="subTrader"/>
    <?php
        if(isset($_SESSION['loginTraderError'])){
            echo $_SESSION['loginTraderError'];
        }
    ?>
    <br>
    <br>
    <p>Not already a Trader? Register <a href="registerTraders.php"><i>here</i></a></p>
    </form>

</div>
</body>
</html>

<?php
    include 'connection.php';
    session_start();

    $error = array();

    if(isset($_POST['subUser'])){
        if(empty($_POST['txtName'])){
            $_SESSION['usererror'] = "Please enter a Username";
            $error['usererror'] = "Please enter a Username";
            header("location:login.php");
        }else{
            unset($_SESSION['usererror']);
            $name = $_POST['txtName'];
        }
    }

    if(isset($_POST['subUser'])){
        if(empty($_POST['txtPassword'])){
            $_SESSION['passCustomerError'] = "Please enter a Password";
            $error['passCustomerError'] = "Please enter a Password";
            header("location:login.php");
        }else{
            unset($_SESSION['passCustomerError']);
            $password = $_POST['txtPassword'];
        }
    }

    if(empty($error)){
        $query = "SELECT * FROM `loginCustomer` WHERE userName='$name' AND userPassword='$password'";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) > 0){
            unset($_SESSION['loginCustomerError']);
            header("location:loginsuccess.php");
        }else{
            $_SESSION['loginCustomerError'] = "Wrong Username or Password";
            $error['loginCustomerError'] = "Wrong Username or Password";
            header("location:login.php");
        }
    }

?>

<?php
    include 'connection.php';
    session_start();

    $error = array();

    if(isset($_POST['subTrader'])){
        if(empty($_POST['txtName'])){
            $_SESSION['tradererror'] = "Please enter a Username";
            $error['tradererror'] = "Please enter a Username";
            header("location:login.php");
        }else{
            unset($_SESSION['tradererror']);
            $name = $_POST['txtName'];
        }
    }

    if(isset($_POST['subTrader'])){
        if(empty($_POST['txtPassword'])){
            $_SESSION['passTraderError'] = "Please enter a Password";
            $error['passTraderError'] = "Please enter a Password";
            header("location:login.php");
        }else{
            unset($_SESSION['passTraderError']);
            $password = $_POST['txtPassword'];
        }
    }

    if(empty($error)){
        $query = "SELECT * FROM `loginArtist` WHERE artistUsername='$name' AND artistPassword='$password'";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) > 0){
            unset($_SESSION['loginTraderError']);
            header("location:loginSuccessTrader.php");
        }else{
            $_SESSION['loginTraderError'] = "Wrong Username or Password";
            $error['loginTraderError'] = "Wrong Username or Password";
            header("location:login.php");
        }
    }

?>
