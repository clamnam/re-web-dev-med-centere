<?php
require_once "include/database_connection.php";
require_once "./include/patient_validate.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "process request!!";

        echo"<pre\$_POST = ";
        print_r($_POST);
        echo"</pre>";

    [$patient, $errors] = patient_validate($_POST);

    if (empty($errors)) {
        echo "<pre>\$patient = ";
        print_r($patient);
        echo "</pre>";

        echo "<pre>\$errors = ";
        print_r($errors);
        echo "</pre>";

        try {
            $centre = intval($patient['centre']);
            $preferences = implode(',',$patient['preferences']);

            $params = array(
                'name' => $_POST['name'],
                'address' => $_POST['address'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'dob' => $_POST['dob'],
                'centre' => $centre,
                'insurance' => $_POST['insurance'],
                'preferences' => $preferences 
            );
            $params["id"] = $_POST['id'];
            $sql = "UPDATE patient SET
                            name = :name,
                            address = :address,
                            phone = :phone,
                            email = :email,
                            dob = :dob,
                            centre = :centre,
                            insurance = :insurance,
                            preferences = :preferences
                            WHERE id = :id";
                            
                            $stmt = $connection->prepare($sql);
                            $stmt->execute($params);
        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        header("Location: patient_view_all.php");
    
} else {
        session_start();
        $_SESSION["data"] = $patient;
        $_SESSION["errors"] = $errors;
        header("location:patient_update_form.php");
    }
} else {
    http_response_code(405);
}
