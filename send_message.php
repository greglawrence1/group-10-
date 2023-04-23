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


$username = mysqli_real_escape_string($conn, $_POST['username']);
$recipient = mysqli_real_escape_string($conn, $_POST['recipient']);
$contents = mysqli_real_escape_string($conn, $_POST['message_cont']);


$sqlA = "SELECT @max_id := MAX(Message_ID) FROM messages;";
$result = mysqli_query($conn, $sqlA);
$row = mysqli_fetch_array($result);
$max_id = $row['@max_id := MAX(Message_ID)'];

$sqlB = "INSERT INTO messages (Message_ID, Sender, Recipient, SendTime, ReadBool, Contents) 
        VALUES ($max_id + 1, '{$username}' , '{$recipient}', Now(), 0, '{$contents}') ";
if ($conn->query($sqlB) === TRUE) {
  echo "Message sent successfully";
} else {
  echo "Error: " . $sqlB . "<br>" . mysqli_error($conn);
}


$conn->close();


?>
