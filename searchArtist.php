<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="searchstyle.css">
    <title>Search</title>    
</head>
<body>
    <div class="container">
        <form method="POST" action="search.php">
                <p>
                <?php
                    if (isset($_SESSION['search'])){
                        echo 'Results for: ' .$_SESSION['search'] .'</br></br>';
                        }
                        ?>
                <label for= "search">Search: </label>
                <input class= "formclass" type="text" name="search" value="<?php
                    if (isset($_SESSION['search'])){
                        echo $_SESSION['search'];
                        }
                    ?>">
                </p>
                <p>
                <label for="sort">Sort by: </label>
                <select name="sort" id="sort" class="slide">                  
                    <option selected="true" disabled="true" >Sort: </option>
                    <option value="mosttotalsales">Sales: High to Low</option>
                    <option value="leasttotalsales">Sales: Low to High</option>
                    <option value="Ascalphabet">Alphabet: A to Z</option>
                    <option value="Descalphabet">Alphabet: Z to A</option>
                </select>
                </p>
                <button style="border:none; background-color: transparent; padding-right: 30px;" type="submit" value= "Submit" name="submit">
                    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                    <lord-icon
                        src="https://cdn.lordicon.com/xfftupfv.json"
                        trigger="hover"
                        style="width:32px;height:32px">
                    </lord-icon></button>
                    <button style="border:none; background-color: transparent; padding-left: 30px;" type="reset" value="Clear">
                    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                    <lord-icon
                        src="https://cdn.lordicon.com/nhfyhmlt.json"
                        trigger="hover"
                        style="width:32px;height:32px">
                    </lord-icon></button>
            
        </form> 
    </div>
    
</body>
</html>
