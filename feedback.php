<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['firstname']) && isset($_POST['lastname']) &&
        isset($_POST['emailid']) && isset($_POST['country']) &&
         {
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['last name'];
        $gender = $_POST['emailid'];
        $country = $_POST['country'];
        $host = "localhost";
        $dbfirstname = "root";
        $dblastname = "";
        
        $conn = new mysqli($host, $dbfirstname, $dblastname);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO register(firstname, lastname, emailid, country) values(?, ?, ?, ?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $emailid);
            $stmt->execute();
            $stmt->bind_result($resultEmailid);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssii",$firstname, $lastname, $emailid, $country);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>