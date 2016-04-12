<?php
session_start();
define('DB_SERVER', 'localhost:8889');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'CS147HW3');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);



$sql = "CREATE DATABASE CS174HW3";
if ($db->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $db->error;
}

// create tables

$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

if ($db->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $db->error;
}

$sql = "CREATE TABLE images (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
imagename VARCHAR(30) NOT NULL,
user VARCHAR(30) NOT NULL,
raiting int(6) NOT NULL,
reg_date TIMESTAMP
)";

if ($db->query($sql) === TRUE) {
    echo "Table images created successfully";
} else {
    echo "Error creating table: " . $db->error;
}

$sql = "CREATE TABLE userimages (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
imagename VARCHAR(30) NOT NULL,
user VARCHAR(30) NOT NULL,
date TIMESTAMP NOT NULL,
caption	varchar(40)
)";

if ($db->query($sql) === TRUE) {
    echo "Table images created successfully";
} else {
    echo "Error creating table: " . $db->error;
}


$db->close();

?>