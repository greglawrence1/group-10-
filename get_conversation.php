<?php
$host = "localhost";
$port = "3306";
$username = "root";
$password = "";
$dbname = "group_project";

$conn = mysqli_connect($host, $username, $password, $dbname, $port);

if (!$conn) {
    echo "SQL Connection Unsuccesful";
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT Sender, contents, SendTime, ReadBool FROM `messages` WHERE (Sender = '{$_GET["username"]}' AND Recipient = '{$_GET["msgsender"]}') OR (Sender = '{$_GET["msgsender"]}' and Recipient = '{$_GET["username"]}') ORDER BY SendTime DESC";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)){
    echo "
    <div class=\"message\">
        <h4>{$row['Sender']}</h4> <br>
        <p>{$row['contents']}</p> <br>
        <p>{$row['SendTime']}</p>
        <p>{$row['ReadBool']}</p>
      </div>
    ";
}
?>
