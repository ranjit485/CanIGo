<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "canigo";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

// Perform database operations here...

$sql_data_display = "SELECT StudentID, FirstName, LastName, Department, Username FROM Students"; 

$result_data = $conn->query($sql_data_display); 

if ($result_data->num_rows > 0) {  
    // echo"
    //     <thead>
    //     <tr>
    //     <th>StudentID</th> 
    //     <th>Name</th> 
    //     <th>Department</th> 
    //     <th>Class</th>                 
    //     <th>Mobail No</th> 
    //     <th>Parent Mo</th> 
    //     <th>Username</th> 
    //     <th>Password</th> 
    //     <th>Action</th>
    //     </tr>
    // </thead>
    // <tfoot>
    //     <tr>
    //     <th>StudentID</th> 
    //     <th>Name</th> 
    //     <th>Department</th> 
    //     <th>Class</th>                 
    //     <th>Mobail No</th> 
    //     <th>Parent Mo</th> 
    //     <th>Username</th> 
    //     <th>Password</th> 
    //     <th>Action</th>
    //     </tr>
    // </tfoot>                      
    // <tbody>
    // ";  

    // output data of each row  
    while($row = $result_data->fetch_assoc()) {  
        echo "<tr> 
                <td>
                    " . $row["StudentID"]. "
                </td> 
                <td>
                    " . $row["FirstName"]. " 
                </td> 
                <td>
                    " . $row["LastName"]. "
                </td> 
                <td>
                    " . $row["Department"]. "
                </td> 
                <td>
                    " . $row["Username"]. "
                </td> 
            </tr>";  
    }  
    // echo "</table>";  
} else {  
    echo "error or no results";  
}  
$conn->close();  
?>  