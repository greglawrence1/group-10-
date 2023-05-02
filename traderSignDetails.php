<?php
    include 'connection.php';
    session_start();

    $error = array();

    if(isset($_POST['subUser'])){
        if(empty($_POST['txtFirstName'])){
            $error['FirstNameError'] = "Please enter a name";
            $_SESSION['FirstNameError'] = "Please enter a name";
        }else{
            unset($_SESSION['FirstNameError']);
            $firstName = $_POST['txtFirstName'];
        }
    }

    if(isset($_POST['subUser'])){
        if(empty($_POST['txtSurname'])){
            $error['SurNameError'] = "Please enter a name";
            $_SESSION['SurNameError'] = "Please enter a name";
        }else{
            unset($_SESSION['SurNameError']);
            $surname = $_POST['txtSurname'];
        }
    }

    if(isset($_POST['subUser'])){
        if(empty($_POST['txtEmail'])){
            $error['EmptyEmailError'] = "Please enter a email";
            $_SESSION['EmptyEmailError'] = "Please enter a email";
        }else{
            unset($_SESSION['EmptyEmailError']);
            if(filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL)){
                $email = $_POST['txtEmail'];
                unset($_SESSION['WrongEmail']);
            }else{
                $error['WrongEmail'] = "Please enter a valid email";
                $_SESSION['WrongEmail'] = "Please enter a valid email";
            }
        }      
    }

    if(isset($_POST['subUser'])){
        if(empty($_POST['txtName'])){
            $error['UserNameError'] = "Please enter a Username";
            $_SESSION['UserNameError'] = "Please enter a Username";
        }else{
            unset($_SESSION['UserNameError']);
            $username = $_POST['txtName'];
        }
    }

    if(isset($_POST['subUser'])){
        if($_POST['age'] == ""){
            $error['AgeError'] = "Please enter a profession";
            $_SESSION['AgeError'] = "Please enter a profession";
        }else{
            unset($_SESSION['AgeError']);
            $profession = $_POST['age'];
        }
    }

    if(isset($_POST['subUser'])){
        if(empty($_POST['txtPassword'])){
            $error['PasswordError'] = "Please enter a password";
            $_SESSION['PasswordError'] = "Please enter a password";
        }else{
            unset($_SESSION['PasswordError']);
            if(strlen($_POST['txtPassword']) < 8 || strlen($_POST['txtPassword' > 16])){
                $error['PasswordLengthError'] = "Password must be between 8 and 16 characters";
                $_SESSION['PasswordLengthError'] = "Password must be between 8 and 16 characters";            
            }else{
                unset($_SESSION['PasswordLengthError']);
                if(!(preg_match('/[A-Z]/', $_POST['txtPassword']))){
                    $error['PasswordCapitalError'] = "Password must contain a Capital";
                    $_SESSION['PasswordCapitalError'] = "Password must contain a Capital";
            }else{
                unset($_SESSION['PasswordCapitalError']);
                if(!(preg_match('/[0-9]/', $_POST['txtPassword']))){
                    $error['PasswordNumberError'] = "Password must contain a number";
                    $_SESSION['PasswordNumberError'] = "Password must contain a number";
            }else{
                unset($_SESSION['PasswordNumberError']);
                        $pass = $_POST['txtPassword'];
                        $password = password_hash($pass, PASSWORD_DEFAULT);
            }
        }
    }
    }
}

    if(isset($_POST['subUser'])){
        if(empty($_POST['txtPass'])){
            $error['RetypeError'] = "Please retype your password";
            $_SESSION['RetypeError'] = "Please retype your password";
        }else{
            unset($_SESSION['RetypeError']);
            $retype = $_POST['txtPass'];
            if($retype == $pass){
                $completePass = $_POST['txtPass'];
                unset($_SESSION['PasswordMatchFail']);
            }else{
                $error['PasswordMatchFail'] = "Passwords don't Match";
                $_SESSION['PasswordMatchFail'] = "Passwords don't Match";
            }
        }
    }

    if(isset($_POST['subUser'])){
       if(isset($_POST['yes']) && empty($_POST['no'])){
            unset($_SESSION['CheckError']);
            $consent = $_POST['yes'];
       }elseif(isset($_POST['no']) && empty($_POST['yes'])){
            $consent = $_POST['no'];
        }elseif(isset($_POST['yes']) && isset($_POST['no'])){
            $error['CheckError'] = "Please Tick one choice";
            $_SESSION['CheckError'] = "Please Tick one choice";
        }
    }

    if(empty($error)){
        unset($_SESSION['FullError']);
        trim($password);
        trim($email);
        $query = "INSERT INTO loginArtist
        (artistUsername, artistEmail, artistPassword, artistProfession, artistFirstName, artistSurname, artistConsent)
        VALUES
        ('$username', '$email', '$password', '$profession', '$firstName', '$surname', '$consent')";

        mysqli_query($connection, $query);
        header("location:registerTraders.php");
        echo "Successfully Registered";
    }else{
        $error['FullError'] = "There were Errors";
        $_SESSION['FullError'] = "There were Errors";
        header("location:registerTraders.php");
    }
?>
