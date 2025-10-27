<?php 
//Sesuaikan dengan setting MySQL 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "penduduk"; 

// Create connection  
$conn = new mysqli($servername, $username, $password, $dbname); 

// Check connection 
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 
$sql = "SELECT * FROM penduduk"; 
$result = $conn->query($sql); 

echo "<a href='index.html'>Input</a>";

if ($result->num_rows > 0) { 
    echo "<table border='1px'><tr> 
        <th>No</th>
        <th>Kecamatan</th> 
        <th>Luas (km2)</th> 
        <th>Jumlah Penduduk</th>
        <th>Longtitude</th>
        <th>Latitude</th></tr>"; 

    // output data of each row 
    while($row = $result->fetch_assoc()) { 
        echo "<tr><td>".
            $row["id"]."</td><td>". 
            $row["kecamatan"]."</td><td>". 
            $row["luas"]."</td><td>". 
            $row["jumlah_penduduk"]."</td><td>".
            $row["longtitude"]."</td><td>".
            $row["latitude"]."</td></tr>"; 
    } 

echo "</table>"; 
} else { 
    echo "0 results"; 
} 
    $conn->close();