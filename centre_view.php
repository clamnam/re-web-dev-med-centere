<?php

require_once "include/database_connection.php";

try {
    $params = array(
        'id' => $_GET['id']
    );

    $sql = "SELECT * FROM medical_centre WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $success = $stmt->execute($params);

    if (!$success) {
        throw new Exception("Failed to retrieve patient with id:" . $centre['centre_id']);
    } else {
        $centre = $stmt->fetch();
    }
} catch (Exception $e) {
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
            <a href="centre_view_all.php" class="nav-item">Centres</a>
            <a href="patient_view_all.php" class="nav-item">Patients</a>
            <a href="contact_us.php" class="nav-item">Contact</a>
            <a href="about_us.php" class="nav-item">About</a>
        </div>
    </nav>

    <main class="main">
        <h1 class="mt-1 mb-1"><?= $centre['title'] ?? ''; ?></h1>

        <table class="table">
            <tbody>
                <tr>
                    <th>Address</th>
                    <td><?= $centre['address'] ?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><?= $centre['phone'] ?></td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td>
                        <a href="<?= $centre['website_url'] ?>" target="_blank">
                            <?= $centre['website_url'] ?>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td><?= $centre['type'] ?></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>
                        <?= $centre['description'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Rating</th>
                    <td>
                        <?php
                        for ($i = 0; $i < $centre['rating']; $i++) {
                            echo '<img class="inline h-1" src="images/star_full.png" alt="Star rating">';
                        } ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

    <footer class="footer">
        <p>&copy; 2022, all rights reserved.</p>
    </footer>
</body>

</html>