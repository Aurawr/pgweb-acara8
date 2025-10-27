<?php
    $kecamatan = $_POST['kecamatan'];
    $luas = $_POST['luas'];
    $jumlah_pddk = $_POST['jumlah_penduduk'];
    $latitude = $_POST['latitude'];
    $longtitude = $_POST['longtitude'];

    // Sesuaikan dengan setting MySQL
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
    $sql = "INSERT INTO penduduk2 (kecamatan, luas, jumlah_pdd, latitude, longtitude)
    VALUES ($kecamatan, $luas, $jumlah_pddk, $latitude, $longtitude)";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully<br><br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "SELECT * FROM penduduk2"; 
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) { 
        echo "<table border='1px'><tr> 
            <th>Kecamatan</th> 
            <th>Luas(km2)</th> 
            <th>Jumlah Penduduk</th>
            <th>Longtitude</th>
            <th>Latitude</th></tr>"; 

    // output data of each row 
    while($row = $result->fetch_assoc()) { 
        echo "<tr><td>". 
            $row["kecamatan"]."</td><td>". 
            $row["luas"]."</td><td>". 
            $row["jumlah_pdd"]."</td><td>".
            $row["longtitude"]."</td><td>".
            $row["latitude"]."</td></tr>"; 
    } 

    echo "</table>"; 
        } else { 
            echo "0 results"; 
        } 
    $conn->close();

// header("Location: index2.html");
// exit;
?>
