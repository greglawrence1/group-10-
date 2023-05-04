<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payment.css">
    <title>Document</title>
</head>
<body>
    <?php
    include 'index.php';
    ?>
    <div id="page-container">
        <div id="content-wrap">

        
            <div class="paymentbox">
                <h3><b>Payment Information</b></h3></br>
                <form method="post" action="paymentprocess.php">
                    <label class="align" for="amount">Amount: £</label>
                    <input type="number" name="amount" value="<?php
                        if (isset($_SESSION['amount'])){
                            echo $_SESSION['amount'];
                        }              
                        ?>"/><span>
                            <?php
                            if(isset($_SESSION['errors']['amount'])){
                                echo "&emsp;" .$_SESSION['errors']['amount'];
                            }
                            ?>
                        </span>
                    <br/><br/>
                    <label class="align" for="txtPass">Password: </label>
                    <input type="password" name="txtPass" value="<?php
                        if (isset($_SESSION['txtPass'])){
                            echo $_SESSION['txtPass'];
                        }else              
                        ?>"/><span>
                            <?php
                            if(isset($_SESSION['errors']['txtPass'])){
                                echo "&emsp;" .$_SESSION['errors']['txtPass'];
                            }
                            ?>
                        </span>
                    <br/><br/>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form> 
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>
</html>