<?php
/*
1. Create Database
 Create database
*/
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
 echo "Database created successfully";
} else {
 echo "Error creating database: " . $conn->error;
}
mysqli_error() returns the last error description for the most recent function call.


#2. Insert Data
$sql = "INSERT INTO users (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if (mysqli_query($conn, $sql)) {
 echo "New record created successfully";
} else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


#3. Get ID of Last Inserted Record
#If you perform an INSERT or UPDATE on a table with an AUTO_INCREMENT field, you can get the ID of the last inserted or updated record immediately.

$sql = "INSERT INTO users (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if (mysqli_query($conn, $sql)) {
 $last_id = mysqli_insert_id($conn);
 echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


#4. Select Data
#First, you make an SQL query that selects the id, firstname and lastname columns from the users table. The next line of code runs the query and puts the resulting data into a variable called $result.

#Then, the function num_rows() checks if there are more than zero rows returned. If there are more than zero rows returned, the function fetch_assoc() puts all the results into an associative array that you can loop through. The while() loop loops through the result set and outputs the data from the id, firstname and lastname columns.

$sql = "SELECT id, firstname, lastname FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
 echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
 }
} else {
 echo "0 results";
}


#5. Delete Data
#The WHERE clause specifies which record or records that should be deleted. If you omit the WHERE clause, all records will be deleted.

// sql to delete a record
$sql = "DELETE FROM users WHERE id=3";

if (mysqli_query($conn, $sql)) {
 echo "Record deleted successfully";
} else {
 echo "Error deleting record: " . mysqli_error($conn);
}


#6. Update Data
#The WHERE clause specifies which record or records that should be updated. If you omit the WHERE clause, all records will be updated.

$sql = "UPDATE users SET lastname='Doe' WHERE id=2";

if (mysqli_query($conn, $sql)) {
 echo "Record updated successfully";
} else {
 echo "Error updating record: " . mysqli_error($conn);
}