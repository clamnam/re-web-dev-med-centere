<?php

require_once "include/database_connection.php";

try{
    $sql = 'SELECT * FROM medical_centre';

    $stmt = $connection->prepare($sql);
    $success = $stmt->execute();
    if(!$success){
        throw new Exception("Failed to retrieve centres");
    }else{
        $centres = $stmt->fetchAll();
    }
}
catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}

$connection = null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/main.css">
    <title>ABC HealthCare</title>
</head>
<body class="container flex flex-column">
    <header class="header"></header>

    <nav>
        <div class="nav">
            <a href="index.php" class="nav-item">Home</a>
            <a href="centre_view_all.php" class="nav-item active">Centres</a>
            <a href="patient_view_all.php" class="nav-item">Patients</a>
            <a href="contact_us.php" class="nav-item">Contact</a>
            <a href="about_us.php" class="nav-item">About</a>
        </div>
    </nav>

    <main class="main">
        <h1 class="mt-1 mb-1">List of medical centres</h1>
            
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // 
                foreach($centres as $centre){
                    echo "<tr>";
                    echo "<td><a href='centre_view.php?id=".$centre['id']."'>".$centre['title']."</a></td>";
                    echo "<td>".$centre['address']."</td>";
                    echo "<td>".$centre['phone']."</td>";
                    echo "<td>".$centre['type']."</td>";
                    echo "</tr>";

                }
                ?>
            </tbody>
        </table>
    </main>

    <footer class="footer">
        <p>&copy; 2022, all rights reserved.</p>
    </footer>
</body>
</html>