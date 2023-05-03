<?php
session_start();
include 'connection.php';
?>

<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="searchstyle.css">
</head>
<body>

<?php
include 'index.php';
include 'searchArtist.php';
if (isset($_POST['submit'])){
    $q = "SELECT * FROM loginArtist";

    //sorting
    if (isset($_POST['sort'])){
        $sort = $_POST['sort'];
        $_SESSION['sort']= $sort;
        if($sort=='mosttotalsales'){
            $sortquery = " ORDER BY TotalSales ASC";
        }
        else if($sort=='leasttotalsales'){
            $sortquery = " ORDER BY TotalSales DESC";
        }
        else if($sort=='Ascalphabet'){
            $sortquery = " ORDER BY artistProfession ASC";
        }
        else if($sort=='Descalphabet'){
            $sortquery = " ORDER BY artistProfession DESC";
        }
    }
    else{
        $sortquery = "";
    }

    //search  by name   
    if (isset($_POST['search'])){
        $search = $_POST['search'];
        $_SESSION['search']= $search;
        $wherequery = " WHERE artistFirstName like '%$search%' OR artistSurname like '%$search%' OR username like '%$search%'";
        
    }
    $query= $q .$sortquery .$wherequery;
}
else{
    $query = 'SELECT * FROM Artist';
}

$result = mysqli_query($connection, $query);
$_SESSION['search']= $search;
    while($row = mysqli_fetch_assoc($result)){
        echo 'Name: ' .$row['artistFirstName'] .' ' .$row['artistSurname']
        .'<br />' .$row['artistUsername']
        .'<br />' .'Work Type: ' .$row['artistProfession']
        .'<br />' .'Total Sales: ' .$row['TotalSales'].'<br /><br /><br />';
    }
?>

</body>
</html>
