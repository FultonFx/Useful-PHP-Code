<?php

//#1 Prepared "SELECT" statement

//Connetion must be established prior to preparing the statement

//Created template
$sql = "SELECT * FROM /*TableName*/ WHERE /*ColumnName*/ ?;"

//Create a prepared querry
$stmt = mysqli_stmt_init($conn);

//Prepare the statement and check for failure before succession
if(!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement unsuccesful";
} else {
//Bind params to the pre-defined placeholder marked with "?"
    mysqli_stmt_bind_param($stmt, "s", /*The Piece Of Information*/);

//Run the parameters securly
    mysqli_stmt_execute($stmt);
}

//We can then use the data to carry out certain tasks such as populate a table. Here is an example we can use inside a while loop...
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['NAME OF COLUMN HERE'];
    }

?>