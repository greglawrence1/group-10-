<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="main.css"/>
        <title>Register Trader</title>
    </head>
<body>
<?php
    session_start();
?>
<form method="post" action="traderSignDetails.php">
        <h1>Trader Registration Here</h1>
    <label for="firstName">Firstname: </label>
    <input type="text" name="txtFirstName" value="">
    <?php if(isset($_SESSION['FirstNameError']))
            { 
                echo $_SESSION['FirstNameError'];      
            }
    ?>
    <br>
    <br>
    <label for="surname">Surname: </label>
    <input type="text" name="txtSurname" value="">
    <?php if(isset($_SESSION['SurNameError']))
            { 
                echo $_SESSION['SurNameError'];      
            }
    ?>
    <br>
    <br>
    <label for="email">Email: </label>
    <input type="text" name="txtEmail" value="">
    <?php if(isset($_SESSION['EmptyEmailError']))
            { 
                echo $_SESSION['EmptyEmailError'];      
            }
            if(isset($_SESSION['WrongEmail']))
            { 
                echo $_SESSION['WrongEmail'];      
            }   
    ?>
    <br>
    <br>   
    <label for="name">Username: </label>
    <input type="text" name="txtName" value="">
    <?php if(isset($_SESSION['UserNameError']))
            { 
                echo $_SESSION['UserNameError'];      
            }
    ?>
    <br>
    <br>
    <label for="age">Profession: </label>
            <select name="age" id="age">
                <option value="">Please Select</option>
                <option value="paint">Painter</option>
                <option value="photo">Photographer</option>
                <option value="scult">Sculpturer</option>
                <option value="graphic">Graphic Designer</option>
                <option value="other">Other</option>
            </select>
    <?php if(isset($_SESSION['AgeError']))
            { 
                echo $_SESSION['AgeError'];      
            }
    ?>
    <br>
    <br>
    <label for="password">Password: </label>
    <input type="password" name="txtPassword" value="">
    <?php if(isset($_SESSION['PasswordError']))
            { 
                echo $_SESSION['PasswordError'];      
            }
            if(isset($_SESSION['PasswordLengthError']))
            { 
                echo $_SESSION['PasswordLengthError'];      
            }
            if(isset($_SESSION['PasswordCapitalError']))
            { 
                echo $_SESSION['PasswordCapitalError'];      
            }
            if(isset($_SESSION['PasswordNumberError']))
            { 
                echo $_SESSION['PasswordNumberError'];      
            }
    ?>
    <br>
    <br>
    <label for="pass">Re-type Password: </label>
    <input type="password" name="txtPass" value="">
    <?php if(isset($_SESSION['RetypeError']))
            { 
                echo $_SESSION['RetypeError'];      
            }
            if(isset($_SESSION['PasswordMatchFail']))
            { 
                echo $_SESSION['PasswordMatchFail'];      
            }
    
    ?>
    <br>
    <br>
    <p>Do you want to hear promotional offers via email?</p>
    <input type="checkbox" id="yes" name="yes" value="yes">
    <label for="yes">Yes</label>
    <input type="checkbox" id="no" name="no" value="no">
    <label for="no">No</label>
    <?php if(isset($_SESSION['CheckError']))
            { 
                echo $_SESSION['CheckError'];      
            }
    ?>
    <br>
    <br>
    <input type="submit" value="Submit" name="subUser"/>
    <br>
    <br>
    <?php if(isset($_SESSION['FullError']))
            { 
                echo $_SESSION['FullError'];      
            }
    ?>
    </form>
</body>
</html>
