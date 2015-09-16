<?php include "db.php"; ?>
<?php

function createRows() {
global $connection;
if(isset($_POST['submit'])) {
$username = $_POST['username'];
$password = $_POST['password'];    
    
$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);

    $query = "INSERT INTO users(username,password) ";
    $query .= "VALUES  ('$username', '$password')";
    
    $result = mysqli_query($connection, $query);
    
    if(!$result) {
        
        die('Query FAILED' . mysqli_error());
    } else {
        
        echo "Record Created";
    }
}
    
}

function readRows() {
    global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Query FAILED' . mysqli_error());
    }
    
    while($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }
}


function showAllData() {
    global $connection;
$query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Query FAILED' . mysqli_error());
    }

while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    echo "<option value='$id'>$id</option>";
    
    }
    
}

function UpdateTable() {
global $connection;
if(isset($_POST['submit'])) {
$username = $_POST['username'];
$password = $_POST['password'];
$id = $_POST['id'];
    
$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);
$id = mysqli_real_escape_string($connection, $id);
    
$query = "UPDATE user SET ";
$query .= "username = '$username', ";
$query .= "password = '$password' ";
$query .= "WHERE id = $id ";
    
$result = mysqli_query($connection, $query);
if(!$result) {
    die("Query Failed" .mysqli_error($connection));
    
}else {
        
        echo "Record Updated";
    }
}
}


function deleteRows() {
global $connection;
if(isset($_POST['submit'])) {
$username = $_POST['username'];
$password = $_POST['password'];
$id = $_POST['id'];
    
$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);
$id = mysqli_real_escape_string($connection, $id);
    
$query = "DELETE FROM users ";
$query .= "WHERE id = $id ";
    
$result = mysqli_query($connection, $query);
if(!$result) {
    die("Query Failed" .mysqli_error($connection));
    
}else {
        
        echo "Record Deleted";
    }
}
}

?>