<?php
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$email_id = filter_input(INPUT_POST, 'email_id');
$country = filter_input(INPUT_POST, 'country');
if (!empty($firstname)){
if (!empty($lastname)){
if (!empty($email_id)){
if (!empty($country)){
$host = "localhost";
$dfirstname = "root";
$dblastname = "root";
$dbemail_id = "root";
$dbcountry = "root";
$dbname = "donation";
// Create connection
$conn = new mysqli ($host, $dbfirstname, $dblastname,$dbemail_id, $dbcountry, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO feed back table (firstname, lastname, email_id, country)
values ('$firstname','$lastname','$email_id','$country')";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "Password should not be empty";
die();
}
}
else{
echo "Username should not be empty";
die();
}
?>