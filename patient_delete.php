<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "Process request";
    require_once "include/database_connection.php";
    try {
        $params = array(
            'id' => $_POST['id']
        );
        $stmt = $connection->prepare("DELETE FROM patient WHERE id = :id");
        $stmt->execute($params);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $connection = null;
    header("Location: patient_view_all.php");
    echo "<pre>\$_POST = ";
    print_r($_POST);
    echo "</pre>";
} else {
    http_response_code(405);
}
